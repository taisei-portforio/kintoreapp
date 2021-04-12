<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <form action="portforio.php" method="post" id="port">
        <input type="button" id="port_button" value="Myportforio!" onclick="location.href='./portforio.php'">
    </form>
    <div class="container">
        <h2>ログイン</h2>
        <!-- ここをif文でtextの中身を入力している時していない時でアクションをかえるように設定。 -->
        <!--  issetで条件分岐、正しい時、間違っている時、入力していない時の三分岐を作る。-->
        <form action="login.php" method="post">
            <input type="text" placeholder="メールアドレス" name="mail">
            <input type="password" placeholder="パスワード" name="pass">
            <input type="submit" value="Sign in!" id="login_button">
        </form>
        <h2>新規登録がお済みでない方はこちら</h2>
        <form action="karinokari.php" method="post">
            <input type="submit" onclick="location.href='karinokari.php'" value="Sign up!" id="send_button">
        </form>
    </div>
</body>
</html>



<!-- signup→Sign Up Here!!って形にする。
新規登録はこちら。
このファイルではログインだけを作る。,l, -->

