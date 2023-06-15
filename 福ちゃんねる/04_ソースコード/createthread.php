<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>スレッド作成</title>
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
//$errors = []; // エラーメッセージを格納する配列

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームが送信された場合の処理
   // if (empty($_POST['handlename'])) {
   //     $errors[] = "入力されていない項目があります";
    //}
    //if (empty($_POST['title'])) {
    //    $errors[] = "入力されていない項目があります";
    //}
   // if (empty($_POST['comment'])) {
   //     $errors[] = "入力されていない項目があります";
   // }
//}

?>

<form method="post" action="">
        <label for="handlename">ハンドルネーム</label>
        <input type="text" id="handlename" name="handlename" required>
        <br>
        <label for="title">タイトル</label>
        <input type="title" id="title" name="title" required>
        <br>
        <label for="comment">コメント</label>
        <input type="comment" id="comment" name="comment" required>
        <br>
        <button type="button" class="btn btn-outline-dark" type="button" onclick="location.href='createkanryou.php'">作成</button>
    </form>
</div>
<br>
<a href='http://localhost/chanel/top.php'>◁</a>
</body>
</html>