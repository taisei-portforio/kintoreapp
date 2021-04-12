<?php
try {
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

     $stmt = $pdo->prepare('DELETE FROM user WHERE id = :id');
     $stmt->execute(array(':id' => $_POST["id"]));

     echo "完了しました！";
} catch(Exception $e) {
    echo 'エラーが発生しました。:' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>筋トレ完了！</title>
</head>
<body>
    <p>
        <a href="main.php">マイページへ戻る</a>
    </p>
</body>
</html>