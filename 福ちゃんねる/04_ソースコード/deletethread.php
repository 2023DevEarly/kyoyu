<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>スレッドを削除</title>
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
<h1>スレッドを削除しますか？</h1>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');
$sql = "DELETE FROM スレッド WHERE thread_id = ?";
$ps = $pdo->prepare($sql);
$ps->bindValue(1,$_POST['thread'], PDO::PARAM_INT);
$ps->execute();
?>
<input type="submit" name="test" value="はい" onclick="location.href='http://localhost/chanel/sakujyokanryou.php'">
<input type="submit" name="test" value="いいえ" onclick="history.back(-1)">
</div>
</body>
</html>