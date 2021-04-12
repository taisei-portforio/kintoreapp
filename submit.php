<?php
    //セッションの開始
    session_start();
    $date = htmlspecialchars($_SESSION['date'], ENT_QUOTES, 'UTF-8');
    $naiyou = htmlspecialchars($_SESSION['naiyou'], ENT_QUOTES, 'UTF-8');
    $kaisu = $_SESSION['kaisu'];
    
    // 接続設定
     //DB情報
     $user = 'vpsuser';//データベースユーザ名
     $password = "hogeunk!";//データベースパスワード
     $dbName = "techbase";//データベース名
     $host = "tk2-403-42962.vs.sakura.ne.jp";//ホスト

    //DB接続
    $dsn = "mysql:host=".$host.";dbname=".$dbName.";charser=utf8";
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //データの追加
    $sql = 'INSERT INTO form(date,naiyou,kaisu)
    VALUES("'.$date.'","'.$naiyou.'","'.$kaisu.'")';
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録完了</title>
    <link rel="stylesheet" href="css/submit.css">
</head>
<body>
    <div class="container">
        <p>登録完了！！</p>
        <p><a href="main.php">戻る</a></p>
    </div>
</body>
</html>