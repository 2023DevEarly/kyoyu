<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>新規登録完了</title>
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
//フォームからの値をそれぞれ変数に代入
$name = $_POST['name'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');

//フォームに入力されたmailがすでに登録されていないかチェック
$sql = "SELECT * FROM ユーザー WHERE user_mail = :mail";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mail', $mail);
$stmt->execute();
$member = $stmt->fetch();
if ($member['mail'] == $mail) {
    $msg = '同じメールアドレスが存在します。';
    $link = '<a href="toroku.php">戻る</a>';
} else {
    //登録されていなければinsert 
    $sql = "INSERT INTO ユーザー(handle_name, user_mail, user_pass) VALUES (:name, :mail, :pass)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':mail', $mail);
    $stmt->bindValue(':pass', $pass);
    $stmt->execute();
    $msg = '会員登録が完了しました';
}
?>

<h1><?php echo $msg; ?></h1><!--メッセージの出力-->
<br>
<button type="button" onclick="location.href='http://localhost/chanel/logtop.php'">トップへ</a>
</div>
</body>
</html>