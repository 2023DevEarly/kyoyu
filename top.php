<?php
    $pdo = new PDO('mysql:host=localhost;dbname   =      自分のデータベースのテーブル名       ;   charset=utf8','root','');
   
    if(isset($_POST['new'])){
        $sql = "SELECT *
        FROM スレッド
        WHERE create_day  
        ORDER BY create_day DESC";
    }elseif(isset($_POST['old'])){
        $sql = "SELECT *
        FROM スレッド 
        WHERE create_day
        ORDER BY create_day ASC ";
    }else{
        $sql = "SELECT *
        FROM スレッド
        WHERE good >= 1 
        ORDER BY good DESC";
    };
    $selectdata = $pdo->query($sql);
?>
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
                        <form action="top.php" method="POST">
                            <button type="submit" name="good">👍グッド数</button></br>
                            <button type="submit" name="new">✨新着順</button></br>
                            <button type="submit" name="old">🗓年代別</button>
                        </form>
                    </ul>
                </nav>
            </div>
            <div class="main">
                <h1>グッド数</h1>
                <?php $c=0; foreach ($selectdata as $row): ?>
                    <div class="sure">
                        <?php  echo $row['create_day'] ?></br>
                        <?php  echo $row['title'] ?></br>
                        <?php  echo $row['comment'] ?></br>
                        <?php  echo $row['good'] ?></br>
                        <?php echo "" ?></br>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </body>
</html>
