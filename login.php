<?php
    session_start();
    //DB情報
    $mail = $_POST['mail'];
    $user = 'vpsuser';//データベースユーザ名
    $password = "hogeunk!";//データベースパスワード
    $dbName = "techbase";//データベース名
    $host = "tk2-403-42962.vs.sakura.ne.jp";//ホスト

    $dsn = "mysql:host=".$host.";dbname=".$dbName.";charset=utf8";

    try {
        $pdo = new PDO ($dsn, $user, $password);
    } catch (PDOException $e) {
        $msg = $e->getMessage();
    }

    $sql = "SELECT * FROM user WHERE mail = :mail";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':mail', $mail);
    $stmt->execute();
    $member = $stmt->fetch();

    $pass = $_POST['pass'];

    //指定したハッシュがパスワードにマッチしているか
    if(password_verify($pass, $member['password'])) {
        //DB情報をセッションに保存
        $_SESSION['id'] = $member['id'];
        $_SESSION['name'] = $member['name'];
        $msg = 'ログインしました。';
        $link = '<a href="main.php" class="modoru">ホーム</a>';
    } else {
        $msg = 'メールアドレスまたはパスワードが違います';
        $link = '<a href="index.php" class="modoru">戻る</a>';
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="css/kakunin.css">
</head>
<body>
    <div class="container">
        <h2><?php echo $msg; ?></h2>
        <span><?php echo $link; ?></span>
    </div>
</body>
</html>