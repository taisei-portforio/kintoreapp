<html>
<body>
こんにちは。<br>
今の時間は、<k?= date('r') ?>です。<br>
<?php phpinfo(); ?>
</body>
</html>

<table>
                <tr><th>日付</th>
                <td><input type="date" size="50" maxlength="50" required></td></tr>
                <tr><th>内容</th>
                <td><input type="text" placeholder="筋トレの内容" size="50" maxlength="50" required></td></tr>
                <tr><th>回数</th>
                <input type="radio" name="kaisu" value="10回" id="10" checked><label for="10">10回</label>
                <input type="radio" name="kaisu" value="20回" id="20" checked><label for="20">20回</label>
                <input type="radio" name="kaisu" value="25回" id="25" checked><label for="25">25回</label>
                <input type="radio" name="kaisu" value="30回" id="30" checked><label for="30">30回</label>
                </tr>
            </table>