<?php
session_start();
//CSRF対策
$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
$token = $_SESSION['token'];
//クリックジャッキン
header('X-FRAME-OPTIONS: SAMEORIGIN');

//エラーメッセージ初期化
$errors = array();

//DB情報
$user = 'vpsuser';//データベースユーザ名
$password = "hogeunk!";//データベースパスワード
$dbName = "techbase";//データベース名
$host = "tk2-403-42962.vs.sakura.ne.jp";//ホスト

//DB接続
$dsn = "mysql:host=".$host.";dbname=".$dbName.";charset=utf8";
$pdo = new PDO($dsn, $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(empty($_GET)) {
    header("Location: registration_mail");
    exit();
}else{
    //GETデータを変数に入れる
    $urltoken = isset($_GET["urltoken"]) ? $_GET["urltoken"] : null;
    //メール入力判定
    if ($urltoken == '') {
        $errors['urltoken'] = "トークンがありません。";
    } else {
        try {
            //仮登録から24時間以内のflag0(未登録者)
            $sql = "SELECT mail FROM pre_user WHERE urltoken=(:urltoken) AND flag =0 AND date > now() - interval 24 hour";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':urltoken', $urltoken, PDO::PARAM_STR);
            $stm->execute();
        
            //レコード件数を取得
            $row_count = $stm->rowCount();

            //24時間以内に仮登録され、本登録されていないトークンの場合
            if ($row_count ==1) {
                $mail_array = $stm->fetch();
                $mail = $mail_array["mail"];
                $_SESSION['mail'] = $mail;
            } else {
                $errors['urltoken_timeover'] = "このURLはご利用できません。有効期限が過ぎたかURLが間違っています。もう一度登録をやりなおして下さい。";
            }
            //DB接続切断
            $stm = null;
        } catch (PDOException $e) {
            print('Error:'.$e->getMessage());
            die();
        }
    }
}

//確認する[btn_confirm]を押下した後の処理
if (isset($_POST['btn_confirm'])) {
    if (empty($_POST)) {
        header("Location: registration_mail.php");
        exit();
    } else {
        //POstされたデータを各変数にぶちこむ
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        //セッションに登録
        $_SESSION['name'] = $name;
        $_SESSION['password'] = $password;
        
        //アカウント入力判定
        //パスワード入力判定
        if ($password == ''):
            $errors['password'] = "パスワードが入力されていません。"; else:
            $password_hide = str_repeat('*', strlen($password));
        endif;
       
        if ($name == ''):
            $errors['name'] = "氏名が入力されていません。";
        endif;
    }
}

//登録[btn_submit]を押した後の処理
if(isset($_POST['btn_submit'])){
    //パスワードをハッシュ化
    $password_hash = password_hash($_SESSION['password'], PASSWORD_DEFAULT);

    //ここでDBに登録
    try {
        $sql = "INSERT INTO user (name,password,mail,status,created_at,updated_at) VALUES (:name,:password_hash,:mail,1,now(),now())";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':name', $_SESSION['name'], PDO::PARAM_STR);
        $stm->bindValue(':mail', $_SESSION['mail'], PDO::PARAM_STR);
        $stm->bindValue(':password_hash', $password_hash, PDO::PARAM_STR);
        $stm->execute();

        //登録したのでトークンを無効にする
        $sql = "UPDATE pre_user SET flag=1 WHERE mail=:mail";
        $stm = $pdo->prepare($sql);
        //値を代入
        $stm->bindValue(':mail', $mail, PDO::PARAM_STR);
        $stm->execute();

        //DBの接続切断
        $stm = null;
        $_SESSION = array();

        if (isset($_COOKIE["PHPSESSID"])) {
            setcookie("PHPSESSID", '', time() - 1800, '/');
        }

        //セッションの破棄
        session_destroy();
    
    } catch (PDOException $e) {
        $pdo->rollBack();
		$errors['error'] = "もう一度やりなおして下さい。";
		print('Error:'.$e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>本会員登録画面</title>
    <link rel="stylesheet" href="css/honban.css">
</head>
<body>
    <div class="container">
        <h1>本会員登録画面</h1>
        <!-- page_3 完了画面-->
        <?php if(isset($_POST['btn_submit']) && count($errors) === 0): ?>
        本登録されました。

        <!-- page_2 確認画面-->
        <?php elseif (isset($_POST['btn_confirm']) && count($errors) === 0): ?>
            <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?urltoken=<?php print $urltoken; ?>" method="post">
                <p>メールアドレス：<?=htmlspecialchars($_SESSION['mail'], ENT_QUOTES)?></p>
                <p>パスワード：<?=$password_hide?></p>
                <p>氏名：<?=htmlspecialchars($name, ENT_QUOTES)?></p>
                
                <input type="submit" name="btn_back" value="戻る">
                <input type="hidden" name="token" value="<?=$_POST['token']?>">
                <input type="submit" name="btn_submit" value="登録する">
            </form>

        <?php else: ?>
        <!-- page_1 登録画面 -->
        <?php if(count($errors) > 0): ?>
            <?php
            foreach($errors as $value){
                echo "<p class='error'>".$value."</p>";
            }
            ?>
        <?php endif; ?>
                <?php if(!isset($errors['urltoken_timeover'])): ?>
                    <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?urltoken=<?php print $urltoken; ?>" method="post">
                        <p>メールアドレス：<?=htmlspecialchars($mail, ENT_QUOTES, 'UTF-8')?></p>
                        <p>パスワード：<input type="password" name="password"></p>
                        <p>氏名：<input type="text" name="name" value="<?php if( !empty($_SESSION['name']) ){ echo $_SESSION['name']; } ?>"></p>
                        <input type="hidden" name="token" value="<?=$token?>">
                        <input type="submit" name="btn_confirm" value="確認する">
                    </form>
                <?php endif ?>
        <?php endif; ?>
    </div>
</body>
</html>

