<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <header>
        <div id = "head">
        <a href="/top"><img src="{{ asset('images/atlas.png') }}"></a>
        <details>
            <summary>{{ Auth::user()->username}}さん</summary>
            <div id="side-bar1">
            <ul class="side-bar1">
                <li><a href="/top">ホーム</a></li>
                <li><a href="/profile">プロフィール編集</a></li>
                <li><a href="/logout">ログアウト</a></li>
            </ul>
            </div>
        </details>
        </div>
    </header>

    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username}}さんの</p><br>
                <div class="loginfollowsuu">
                    <h21>フォロー数</h21>
                    <h22>{{ Auth::user()->follows()->count() }}名</h22>
                    <p><a href="/follow-list" class="btn btn-primary">フォローリスト</a></p>
                </div>
                <div class="loginfollower">
                    <p>フォロワー数
                    {{ Auth::user()->followUsers()->count() }}名</p>
                    <p><a href="/follower-list" class="btn btn-primary">フォロワーリスト</a>
                </div>
                <div class="loginsearchbutton">
                    <a href="/search" class="btn btn-primary">ユーザー検索</a>
                </div>
            </div>
        </div>
    </div>



    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
