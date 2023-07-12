<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>チャット</title>
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
        <br>
        </div>
        <div style="text-align:center;">
        <div id="headerdiv">
            <img src="img/logo.png">
        </div>
    </div>
</div>
    <h1></h1>

    <div id="chatbox">
        <!-- チャットログが表示される領域 -->
    <?php   
       $pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');
       $sql="SELECT thread_id,title,comment FROM スレッド INNER JOIN メッセージ ON スレッド.thread_id = message.thread_id WHERE スレッド.thread_id= ?";
       $ps=$pdo->prepare($sql);
       $ps->bindValue(1,$_POST['thread'], PDO::PARAM_INT);
       $ps->execute();
       foreach($ps->fetchAll() as $row){
       $title = $row['title'];
       $comment = $row['comment'];
       }
?>

    <form method="post" action="ログイン後スレッドngworderror.php">
        <label for="input">入力:</label>
        <input type="text" id="input" name="input" required>
        <br>
        <input type="submit" value="送信">
    </form>
    <button type="button" class="btn btn-outline-dark" onclick="history.back(-1)">◁</button>
</body>
</html>
