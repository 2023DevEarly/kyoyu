<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="top.css"/>
        <title>トップ</title>
    </head>
    
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <body>

        <div class="back1">
            <?php
                date_default_timezone_set("japan");
                echo date('Y/m/d');
            ?></br>
            <a href="">ログイン</a>
            <div style="text-align:center;">
                <img src="MicrosoftTeams-image (22).png">
            </div>
        </div>

        <div class="search">
            <div class="search1">
                <input type="text" class="text" name="sure">
            </div>
            <div class="search1">
                <button type="button" onclick="location.href=''">検索</button>  
            </div>
        </div>

        <div class="content">
            <div class="home">
                <nav>
                    <p>ホーム</p>
                    <ul>
                        <p>👍グッド数</p>
                        <p>✨新着順</p>
                        <p>🗓年代別</p>
                    </ul>
                </nav>
            </div>
            <div class="main">
                <h1>グッド数</h1>
                <button type="button">(/・ω・)/</button>
            </div>
        </div>
    </body>
</html>
