<?php
session_start();
if(isset($_POST['user_name'])){
    $pdo = new PDO('mysql:host=localhost;dbname=kaihatu;charset=utf8','root','root');
    $sql="SELECT * FROM ユーザー WHERE user_mail=?";
    $ps=$pdo->prepare($sql);
    $ps->bindValue($_POST['password'],PDO::PARAM_STR);
    $ps->execute();
    $Array = $ps->fetchAll();
}

$erro=[];

if (empty($user_mail)) {
  $_SESSION['error1'] = 'メールアドレスが入力されていません。';
  $erro[] = $_SESSION['error1'];
}

if (empty($user_pass)) {
  $_SESSION['error2'] = 'パスワードが入力されていません。';
  $erro[] = $_SESSION['error2'];
}

?>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="CSS/loguin.css"/>
</head>
<form name="login_form" action="loguinkanryou.php" method="POST" >
       <div class="login_rogo_top">
        <img src="rogo.jpg">
       </div>
         
      <div class="login_rogo_">
          <h1>ログイン</h1>
      </div>
       
       <div class="login_form_btm">
       
          メールアドレスとパスワードを入力して「ログイン」ボタンを押してください<br>

         メールアドレス　 <input type="email" name="user_mail" required><br>
         <?php   
                  if((isset($_SESSION['error1']))){
                        echo '<div style="color: red; text-align: center;">'.$_SESSION['error1'].'</div>'.'<br>';
                        unset($_SESSION['error1']);
                  } ?>
         パスワード　　　    <input type="password" name="user_pass" required><br>
         <?php   
                  if((isset($_SESSION['error2']))){
                        echo '<div style="color: red; text-align: center;">'.$_SESSION['error2'].'</div>'.'<br>';
                        unset($_SESSION['error2']);
                  } ?>
          <br>
       </div>
          
       <button type="button" class="btn1" 
       <?php 
        
        ?>>ログイン</button><br>
</form>
