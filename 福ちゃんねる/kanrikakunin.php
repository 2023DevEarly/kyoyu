<?php
session_start();
$num = $_POST['num'];
$pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');
$sql = "SELECT * FROM ユーザー WHERE kanri_num = :num";
$ps = $pdo->prepare($sql);
$ps->bindValue(':num', $num);
$ps->execute();
$member = $ps->fetchAll();
foreach($member as $row){
//指定したハッシュがパスワードにマッチしているかチェック
if ($row['user_pass'] == $_POST['pass']){
  header("Location:NGwordinput.php");
}else{

}
}