<?php
session_start();
if(isset($_POST['handle_name'])){
    $pdo = new PDO('mysql:host=localhost;dbname=webdb;charset=utf8','root','root');
    $sql="SELECT * FROM users_tbl WHERE users_password=?";
    $ps=$pdo->prepare($sql);
    $ps->bindValue(1,$_POST['password'],PDO::PARAM_STR);
    $ps->execute();
}
if (empty($_POST['user_mail'])) {
    echo "メールアドレスが入力されていません。";
}

if (empty($_POST['user_pass'])) {
    echo "パスワードが入力されていません。";
}