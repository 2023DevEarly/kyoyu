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
        <div style="text-align:center;">
            <img src="img/logo.png">
            </div>
            </div>
    </div>
</div>
<div>
<a href="http://localhost/chanel/deletethread.php">削除する</a>
<div id="chatbox">
        <!-- チャットログが表示される領域 -->
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');
    $sql="SELECT * FROM スレッド INNER JOIN メッセージ ON スレッド.thread_id = メッセージ.thread_id WHERE スレッド.thread_id= (?)";
    $ps=$pdo->prepare($sql);
    $ps->bindValue(1,$_POST['thread'], PDO::PARAM_INT);
    $ps->execute();

    $Array = $ps->fetchAll();
 $c=0;foreach($Array as $row)
    echo'<h1>'.$row['title'].'</h1>';
?>
    <form method="post" action="commentngword.php">
        <label for="input">入力:</label>
        <input type="text" id="input" name="text" required>
        <br>
        <label>
            <input type="file" onchange="preview(this)" multiple accept="image/*" name="file" value="up">
            <div class="preview-area"></div>

            <script>
                function preview(elem, output = '') {
                    Array.from(elem.files).map((file) => {
                        const blobUrl = window.URL.createObjectURL(file)
                        output += `<img src=${blobUrl}>`
                    })
                    elem.nextElementSibling.innerHTML = output
                }
            </script>
        </label><br>
        <input type="submit" value="送信">
        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');
       $sql = "SELECT * FROM NGワード WHERE ng_decision LIKE '%*%'";
       $ps = $pdo->query($sql);
       $Array = $ps->fetchAll();
       $c=0;foreach($Array as $row)
       if (str_replace($row, '', $_POST['text'])) {
        $msg = '使用できない言語が含まれています。';//NGワードがある場合
    } 
    ?>
    </form>
    <button type="button" class="btn btn-outline-dark" onclick="history.back(-1)">◁</button>
</body>
</html>