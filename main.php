<!--  -->

<!-- ログイン後の構成を作る
氏名の表示など。
-->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>
    <link rel="stylesheet" href="css/mypage.css">
</head>
<body>
    <!-- 
        マイページに何を書くか。
        ・ログアウトbutton
        ・今日はこれをやりましょう！
        ・今日の内容を大きく表示、カレンダーは別ページで。グーグルカレンダに飛ばすとか
        ・ルーティンをデータベースに保存
        ・新規入力ボタン
        ・削除ボタン
        ・やりました（完了）ボタン
        ・共有ボタン
        ・上にbootstrapでブログみたいに複数ボタンを表示させ、行きたいようにさせる。→時間ないしむり。
        内容は？
        →日付、内容と回数、→終わったら「登録が完了しました。」と表示させる。
     -->
    <?php
        session_start();

         //DB情報
        $user = 'vpsuser';//データベースユーザ名
        $password = "hogeunk!";//データベースパスワード
        $dbName = "techbase";//データベース名
        $host = "tk2-403-42962.vs.sakura.ne.jp";//ホスト

        //エラーメッセージの初期化
        $errors = array();

     //DB接続
     $dsn = "mysql:host=".$host.";dbname=".$dbName.";charser=utf8";
     $pdo = new PDO($dsn, $user, $password);
     $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    try {
        // 時刻を知る→関数に入れる→SQLからその時刻を読み取る→それを反映させる。
        //DB確認
        $sql = "SELECT * FROM form WHERE date = CURDATE()";
        $statement = $pdo->query($sql);

        $row_count = $statement->rowCount();

        while($row = $statement->fetch()) {
            $rows[] = $row;
        }

        $pdo = null;

    }catch(PDOException $e) {
        print('Error:'.$e->getMessage());
        die();
    }
    ?>

    <form action="logout.php" method="post" id="logout">
        <input type="button" id="logout_button" value="Logout" onclick="location.href='./logout.php'">
    </form>
    <div class="container">
        <h2>今日の内容</h2>
        <p>件数:<?php echo $row_count; ?></p>
        <table border="1">
            <tr><td>内容</td><td>回数</td></tr>

            <?php 
            foreach ($rows as $row) {
                ?>
            <tr>
                <td><?php echo $row['naiyou'] ?></td>
                <td><?php echo htmlspecialchars($row['kaisu']) ?></td>
                <td><a href="delete.php"><?php $row['id'] ?>完了</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
<!-- 内容と完了ボタンをここに追加 -->
<!-- 「完了」とすることでSQLテーブルから削除する -->
    </div>
    <div class="container">
        <h3>新規登録フォーム</h3>
        <form action="confirm.php" method="post">
           <div>
            <label for="date">日付</label>
            <input type="date" id="date" name="date">
           </div>
           <div>
            <label for="naiyou">内容</label>
            <input id="naiyou" type="text" name="naiyou" placeholder="筋トレの内容">
           </div>
           <div>
                <input type="radio" name="kaisu" value="10回" id="10" checked><label for="10">10回</label>
                <input type="radio" name="kaisu" value="20回" id="20"><label for="20">20回</label>
                <input type="radio" name="kaisu" value="25回" id="25"><label for="25">25回</label>
                <input type="radio" name="kaisu" value="30回" id="30"><label for="30">30回</label>
           </div>
           <div>
            <input type="submit" name="submit" value="書き込む" id="submit_button">
            <!-- できれば削除ボタンも -->
           </div>
        </form>
    </div>
    <div class="container">
        <!-- 共有ボタンをここに作る。ツイッターのアイコンやgoogleのアイコンを表示させクリックさせ、外部リンクに飛ばす形で。 -->
    </div>
</body>
</html>