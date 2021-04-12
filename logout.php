<?php
session_start();
$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="css/logout.css">
</head>
<body>
    <div class="container">
    <h2>
        <font size='5'>ログアウトしました</font>
    </h2>
    <p><a href="index.php">ログインページに戻る</a></p>   
    </div>
</body>
</html>