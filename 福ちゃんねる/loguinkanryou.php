<link rel="stylesheet" href="css/loguinkanryou.css">
<form name="loguinkanryou_form">
  <div  class=back>
  <div style="text-align:left;">
    <?php
        date_default_timezone_set("japan");
        echo date('Y/m/d');
    ?></br>
    </div>
    <div style="text-align:center;">
    <img src="img/logo.jpg">
  </div>
</div>

<div style="text-align:center;">
  <div class="roguinkanryou_rogo">
  <?php
session_start();
$mail = $_POST['mail'];
$pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');
$sql = "SELECT * FROM ユーザー WHERE user_mail = :mail";
$ps = $pdo->prepare($sql);
$ps->bindValue(':mail', $mail);
$ps->execute();
$member = $ps->fetchAll();
foreach($member as $row){
//指定したハッシュがパスワードにマッチしているかチェック
if ($row['user_pass'] == $_POST['pass']){
  header("Location:logtop.php");
}else{

}
}
?>
<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>
      </div>
      </div>
    </div>
  </div>
</form>
