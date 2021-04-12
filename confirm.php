<?php
// セッションの開始

session_start();

$date = htmlspecialchars($_POST['date'], ENT_QUOTES, 'UTF-8');
$naiyou = htmlspecialchars($_POST['naiyou'], ENT_QUOTES, 'UTF-8');
$kaisu = $_POST['kaisu'];

// 入力値をセッション変数に格納
$_SESSION['date'] = $date;
$_SESSION['naiyou'] = $naiyou;
$_SESSION['kaisu'] = $kaisu;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録確認</title>
    <link rel="stylesheet" href="css/confirm.css">
</head>
<body>
    <div class="container">
        <h1>登録確認</h1>
        <form action="submit.php" method="post">
            <table>
                <tr><th>日付：</th><td><?php echo $date; ?></td></tr>
                <tr><th>内容：</th><td><?php echo $naiyou; ?></td></tr>
                <tr><th>回数：</th><td><?php echo $kaisu; ?></td></tr>
            </table>
            <input id="submit_button" type="submit" value="登録する">
        </form>
    </div>
</body>
</html>
