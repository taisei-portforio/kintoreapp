<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>仮会員登録画面</title>
    <link rel="stylesheet" href="css/kari.css">
</head>
<body>
<?php
   session_start();
    //クロスサイトリクエストフォージェリ（CSRF）対策
    $_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
    $token = $_SESSION['token'];

    //クリックジャッキング対策
    header('X-FRAME-OPTIONS: SAMEORIGIN');

    //DB情報
    $user = 'root';//データベースユーザ名
    $password = 'Oceans14!';//データベースパスワード
    $dbName = "techbase";//データベース名
    $host = "tk2-403-42962.vs.sakura.ne.jp ";//ホスト

    //エラーメッセージの初期化
    $errors = array();
    
    //DB接続
    $dsn = "mysql:host={$host};dbname={$dbName};charser=utf8";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //送信ボタンクリックした時
    if (isset($_POST['submit'])) {
        //メールアドレスが空欄の時
        if (empty($_POST['mail'])) {
            $errors['mail'] = 'メールアドレスが未入力です。';
        }else{
            //postされたデータを変数に入力
            $mail = isset($_POST['mail']) ? $_POST['mail'] : null;

            //メールアドレスの構文チェック
            if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mail)) {
                $errors['mail_check'] = "正しいメールアドレスを入力してください。";
            }
            //DB確認
            $sql = "SELECT id FROM user WHERE mail=:mail";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':mail', $mail, PDO::PARAM_STR);
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);

            //userテーブルに既に登録されている場合は、エラーを表示させる
            if (isset($result["id"])) {
                $errors['user_check'] = "このメールアドレスはすでに利用されております。";
            }
        }

        //エラーが0個の時、pre_userに入れる。
        if (count($errors) === 0) {
            $urltoken = hash('sha256', uniqid(rand(), 1));
            $url = "http://160.16.135.216/hontouroku.php?urltoken=".$urltoken;
            //このタイミングでDBに登録
            try {
                $sql = "INSERT INTO pre_user (urltoken, mail, date, flag) VALUES (:urltoken, :mail, now(), '0')";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(':urltoken', $urltoken, PDO::PARAM_STR);
                $stm->bindValue(':mail', $mail, PDO::PARAM_STR);
                $stm->execute();
                $pdo = null;
                $message = "入力されたメールアドレスにメールを送信しました。メールに記載されたURLからご登録ください。";
            } catch (PDOException $e) {
                print('Error:'.$e->getMessage());
                die();
            }
            //メール送信処理、送信するメールの内容。
            $mailTo = $mail;
                $body = <<< EOM
                登録あざす！
                下記のURLからご登録ください！
                {$url}
        EOM;

            mb_language('ja');
            mb_internal_encoding('UTF-8');

            //Fromヘッダを作成
            $header = 'From: ' . mb_encode_mimeheader($companyname). '<' . $companymail. '>';

            if (mb_send_mail($mailTo, $registation_subject, $body, $header, '-f'. $companymail)) {
                $_SESSION = array();
                if (isset($_COOKIE["PHPSESSID"])) {
                    setcookie("PHPSESSID", '', time() - 1800, '/');
                }
                session_destroy();
                $message = "入力されたメールアドレスにメールを送信しました。メールに記載されたURLからご登録ください。";
            }
        }
    }
   

?>
<h1>Sign Up!!</h1>
<?php if (isset($_POST['submit']) && count($errors) === 0): ?>
    <!-- 登録完了画面 -->
    <p><?=$message?></p>
    <p>↓TEST用(後ほど削除)：このURLが記載されたメールが届きます。</p>
    <a href="<?=$url?>"><?=$url?></a>
<?php else: ?>
<!-- 登録画面 -->
    <?php if(count($errors) > 0): ?>
        <?php
        foreach($errors as $value) {
            echo "<p class='error'>".$value."</p>";
        }
        ?>
    <?php endif; ?>
    <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
        <p>メールアドレス：<input type="text" name="mail" size="50" value="<?php if( !empty($_POST['mail']) ){ echo $_POST['mail']; } ?>"></p>
        <input type="hidden" name="token" value="<?=$token?>">
        <input type="submit" name="submit" value="送信">
    </form>
    <?php endif; ?>
</body>
</html>








