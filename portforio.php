<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>Welcome to My Portforio Site!</title>
    <script type="text/javascript" src="jquery-3.5.0.min.js"></script>
  </head>
  <body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">
            <a class="navbar-brand" href="#">Taisei's Portforio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
 
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Top</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skills">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#outputs">Outputs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#experiences">Experiences</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="jumbotron jumbotron-fluid" id="top">
        <h4 class="display-4 text-white animation">Welcome to my Portforio Site!</h4>
        <hr class="my-4">
        <p class="text-white lead">Created by "Taisei Kuwahara".</p>
    </div>

    <div class="container main" id="profile">
        <h2><span class="border-bottom border-info">Profile</span></h2>
        <table class="table table-borderless" id="aboutme">
            <tr>
                <td>名前</td>
                <td>桒原大晴（くわはらたいせい）</td>
            </tr>
            <tr>
                <td>学歴</td>
                <td>中央大学法学部政治学科 在学中</td>
            </tr>
            <tr>
                <td>趣味</td>
                <td>読書、プログラミング、音楽ゲーム</td>
            </tr>
        </table>
        <table class="table table-borderless" id="snsaccount">
            <tr>
                <td>Twitter</td>
                <td><a href="https://twitter.com/mjIZ57">@mjIZ57</a></td>
            </tr>
            <tr>
                <td>Facebook</td>
                <td><a href="https://www.facebook.com/taisei.kuwahara.77/">Taisei Kuwahara</a></td>
            </tr>
            <tr>
                <td>Github</td>
                <td><a href="https://github.com/taisei-portforio">桑原大晴（taisei-portforio）</a></td>
            </tr>
            <tr>
                <td>Blog</td>
                <td>作成中…</td>
            </tr>
        </table>
    </div>


    <div class="container content">
        <h2><span class="border-bottom border-info title" id="skills">Skills</span></h2>
        <h3 class="star">★★★ほぼ自由に使いこなせる</h3>
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="https://assets.st-note.com/production/uploads/images/13224939/rectangle_large_type_2_634834daa2f2542d2541b2f790dcd387.jpg?fit=bounds&format=jpeg&quality=45&width=960" alt="html/css">
                <div class="card-body">
                    <h5 class="card-title">HTML/CSS</h5>
                    <p class="card-text">私が初めて勉強したマークアップ言語です。去年の12月から勉強を始めどの製作物にも使っている、一番使いこなしている言語です。</p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="https://iwakurabit.com/wp-content/uploads/2019/01/neofetch.png" alt="command line">
                <div class="card-body">
                    <h5 class="card-title">Command Line</h5>
                    <p class="card-text">僕がエンジニアを目指そうと思ったきっかけとなった言語です。高校生の時にLinuxを通じて勉強して、今でもその知識を使っています。</p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="https://doubleloop.tokyo/wp/wp-content/uploads/2018/01/MIYAKO85_amanogawatentai20140725_TP_V.jpg" alt="bootstrap4">
                <div class="card-body">
                    <h5 class="card-title">Bootstrap4</h5>
                    <p class="card-text">このポートフォリオサイトにも使用したフレームワークです。</p>
                </div>
            </div>
        </div>
        <h3 class="star2">★★リファレンスがあれば使いこなせる</h3>
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="https://web-camp.io/magazine/wp-content/uploads/2019/04/20160410154524.jpg" alt="javascript">
                <div class="card-body">
                    <h5 class="card-title">Javascript(jQuery)</h5>
                    <p class="card-text">動的なWebサイトを作ってみたいと思い、HTML/CSSの勉強と同時に勉強しました。javascriptで簡単なクイズゲームを作成しました。現在はnode.jsなどの豊富なフレームワークについて勉強しています。</p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="https://www.bizlearn.jp/wp/wp-content/uploads/2017/10/Python.png" alt="python">
                <div class="card-body">
                    <h5 class="card-title">Python</h5>
                    <p class="card-text">ある著書を読み「自動化」という言葉に興味を惹かれ、AIや自動化によく使われているpythonを勉強しました。最新のトレンドランキングを更新する簡単な機能を作ってみました。</p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="https://pngimg.com/uploads/mysql/mysql_PNG1.png" alt="sql">
                <div class="card-body">
                    <h5 class="card-title">SQL</h5>
                    <p class="card-text">スクレイピングしたトレンドの情報をSQLに保存し、TwitterAPIにあげてみたいという好奇心から勉強を開始しました（現在独自開発中）。基本情報技術者の勉強でも出てくるので一番勉強できている言語です。</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container content">
        <h2><span class="border-bottom border-info title" id="outputs">Outputs</span></h2>
        <div class="card-deck">
            <div class="card content" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">ポートフォリオサイト</h5>
                    <p class="card-text">私のポートフォリオ（このサイト）です。初めての自作のWebサイトです。</p>
                    <p class="card-text">HTML,CSS,Bootstrap4</p>
                    <button type="button" class="btn btn-primary">link</button>
                    <button type="button" class="btn btn-dark">Github</button>
                </div>
            </div>
            <div class="card content" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">クイズゲーム</h5>
                    <p class="card-text">javascriptで作った、簡単な自分に関するクイズゲームを作りました。</p>
                    <p class="card-text">HTML,CSS,Javascript</p>
                    <button type="button" class="btn btn-primary"><a href="https://website-up.web.app" class="button">link</a></button>
                    <button type="button" class="btn btn-dark"><a href="https://github.com/taisei-portforio/Quizapp" class="button">Github</a></button>
                </div>
            </div>
            <div class="card content" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">最新トレンドの取得機能</h5>
                    <p class="card-text">yahooトレンドからpythonでスクレイピングをして、30秒ごとにトレンドを更新する機能を作りました。</p>
                    <p class="card-text">python3,beautifulsoup4</p>
                    <button type="button" class="btn btn-dark"><a href="https://github.com/taisei-portforio/trend" class="button">Github</a></button>
                </div>
            </div>
        </div>
        <div class="card-deck">
            <div class="card content" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">自作サーバ</h5>
                    <p class="card-text">趣味でやってみたいと思っていた自作サーバを作ってみました。RAID構築、ハイパーバイザを使って本格的な仮想サーバを作ってみました。</p>
                    <p class="card-text">サーバ知識</p>
                    <button type="button" class="btn btn-success">img</button>
                </div>
            </div>
            <div class="card content" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">linebot(おうむ返し)</h5>
                    <p class="card-text">lineAPIで簡単な機能を作ってみました。現在これを基盤にtodoリストの機能作っています。</p>
                    <p class="card-text">javascript,GoogleAppsScript(GAS)</p>
                    <button type="button" class="btn btn-primary"><a href="https://qr-official.line.me/sid/L/875cdprq.png" class="button">link</a></button>
                    <button type="button" class="btn btn-dark"><a href="https://github.com/taisei-portforio/linebot-" class="button">Github</a></button>
                </div>
            </div>
        </div>
    </div>

    <div class="container content">
        <h2><span class="border-bottom border-info title" id="experiences">Experiences</span></h2>
        <div class="card-deck">
            <div class="card content" style="width: 18rem;">
                <div class="card-body">

                    <h5 class="card-title">プログラミング経験</h5>
                    <p class="card-text">今年の2月からプログラミングを本格的に独学で勉強し始めました。プログラミングやCUIの画面で操作することは趣味でもあったので、勉強することは苦ではありませんでした。</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>