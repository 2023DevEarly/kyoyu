<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>NGワード登録完了</title>
    <style>
         </style>
        <link href="css/thread.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class=back>  
<div style="text-align:left;"> 
    <?php
            date_default_timezone_set("japan");
            echo date("Y/m/d");
        ?>
        </div>
        <div style="text-align:center;">
        <div id="headerdiv">
            <img src="img/logo.png">
        </div>
    </div>
</div>
<div style="text-align:center;">
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');//PDOでMySQLのデータベースに接続
  //input.phpの値を取得
    $ngword = $_POST['ngword'];
    $sql = "INSERT INTO ngワード(ng_decision) VALUES (?)";
    $ps = $pdo->prepare($sql); //値が空のままSQL文をセット
    $ps->bindValue(1,$_POST['ngword'], PDO::PARAM_STR);
    $ps->execute();
    echo "<p>NGワード: " . $ngword . "</p>";
    echo '<p>上記の内容をデータベースへ登録しました。</p>';
?>
</div>
<br>
<a href='http://localhost/chanel/NGwordinput.php'>追加で入力する</a>
<a href='http://localhost/chanel/logtop.php'>トップへ</a>
</body>
</html>