<?php
// チャットメッセージを保存するためのファイル
$chatFile = "chat_log.txt";

// メッセージの送信者と内容を取得
if (isset($_POST['sender']) && isset($_POST['message'])) {
    $sender = $_POST['sender'];
    $message = $_POST['message'];

    // メッセージをファイルに追記
    $log = "[" . date('Y-m-d H:i:s') . "] " . $sender . ": " . $message . "\n";
    file_put_contents($chatFile, $log, FILE_APPEND | LOCK_EX);
}

// チャットログを取得して表示
if (file_exists($chatFile)) {
    $chatLog = file_get_contents($chatFile);
    echo nl2br($chatLog); // 改行を<br>タグに変換して表示

    if (isset($_POST['comment_id']) && isset($_POST['delete_comment'])) {
        $commentId = $_POST['comment_id'];
        // コメントの削除処理を実行する（ここでは削除のみを想定）
        // ...
    
        echo "コメントは削除されました";
    }
}
?>

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
        <div style="text-align:right;">
        <a href="http://localhost/chanel/loguin.php">ログイン</a>
        <div style="text-align:center;">
            <img src="img/logo.png">
            </div>
            </div>
    </div>
</div>
    <h1></h1>

    <div id="chatbox">
        <!-- チャットログが表示される領域 -->
        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');
        ?>
    </div>
    <div style="text-align:bottom;"> 
    <a href='http://localhost/chanel/top.php'>◁</a>
</div>
</body>
</html>