<?php
$pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');
    try{
        $count = 0;
        if(isset($_POST['new'])){
            $count = 0;
            $sql = "SELECT *
                    FROM スレッド
                    WHERE thread_id  
                    ORDER BY thread_id DESC";
        }elseif(isset($_POST['old'])){
            $count = 2;
            $sql = "SELECT *
                    FROM スレッド       
                    WHERE create_day
                    ORDER BY create_day ASC ";
        }elseif(isset($_GET['search'])){
            $count = 3;
            $search = htmlspecialchars($_GET['search']);
            $search_value = $search;
            $sql = "SELECT *,count(title)
                    FROM スレッド 
                    WHERE title
                    LIKE '%$search%'";
        }else{
            $count = 1;
            $sql = "SELECT *
            FROM スレッド
            WHERE good >= 1
            ORDER BY good DESC";
        }
        $selectdata = $pdo->query($sql);
    }catch (PDOException $e){
        exit($e->getMessage()); 
    }
?>
<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="css/top.css"/>
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
            <div style="text-align:right;">
            <a href="http://localhost/chanel/loguin.php">ログイン</a>
            </div>
            <div style="text-align:center;">
                <img src="img/logo.png">
            </div>
        </div>

        <div class="search">
            <form action="" method="GET">
                <div class="search1">
                    <input type="text" name="search" value="">
                    <button type="submit" name="">検索</button>
                </div>
            </form>
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
                <?php
                    if($count== 1){
                        echo '<p style="font-size:20px;,">グッド数</p>'."<br>";
                    }elseif($count == 0){
                        echo '<p style="font-size:20px;,">新着順</p>'."<br>";
                    }elseif($count == 2){
                        echo '<p style="font-size:20px;,">年代別</p>'."<br>";
                    }else{
                        echo '<p style="font-size:20px;,">検索結果</p>'."<br>";
                    }
                ?>
                <?php $c=0; foreach ($selectdata as $row): ?>
                    <?php  echo $row['create_day'] ?>
                    <div class="sure">
                        <?php
                        $id=$row['thread_id'];
                        echo '<form action="ログイン前スレッド.php" method="POST" >';
                        echo  '<button class="btn btn-outline-dark type="hidden" id="thread" name="thread" value="'.$id.'"/>'.$row['title'].'</button>';
                        echo '</form>';
                        ?>
                    </div>
                    <?php echo "" ?></br>
                <?php endforeach ?>
            </div>
        </div>
    </body>
</html>
