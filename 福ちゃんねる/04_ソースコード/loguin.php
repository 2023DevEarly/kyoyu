<?php
session_start();
if(isset($_POST['user_name'])){
    $pdo = new PDO('mysql:host=localhost;dbname=kaihatu;charset=utf8','root','root');
    $sql="SELECT * FROM ユーザー WHERE user_pass=?";
    $ps=$pdo->prepare($sql);
    $ps->bindValue(1,$_POST['password'],PDO::PARAM_STR);
    $ps->execute();
    $Array = $ps->fetchAll();
}

if (empty($user_mail)) {
  $_SESSION['error'] = 'メールアドレスが入力されていません。';
}

if (empty($user_pass)) {
  $_SESSION['error'] = 'パスワードが入力されていません。';
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
         パスワード　　　    <input type="password" name="user_pass" required><br>
          <?php   
                  if((isset($_SESSION['error']))){
                        echo '<div style="color: red; text-align: center;">'.$_SESSION['error'].'</div>'.'<br>';
                        unset($_SESSION['error']);
} ?><br>
       </div>
          
       <button type="button" class="btn1" 
       <?php 
        
        ?>>ログイン</button><br>
</form>
<form name="login_form2" action="loguinkanryou.php" method="POST" >
      <div class="login_sin_">
        <h1>新規登録</h1>
      </div>

      <div class="login_sinki_btm">
      メールアドレスとパスワードを入力して「新規登録」ボタンを押してください<br>

         ハンドルネーム　<input type="name" name="handle_name"><br>
         メールアドレス　 <input type="email" name="user_mail" ><br>
         メールアドレス（再確認） <input type="email" name="user_mail_sub"><br>
         <?php if('user_mail' == 'user_mail_sub'){
                    echo '<div style="color: red; text-align: center;">'.'上記のメールアドレスと違います。'.'</div>';
         }   ?>
         パスワード　　　    <input type="password" name="user_pass" pattern="[0-9A-Za-z]+" minlength="8" maxlength="30"><br>
         パスワード（再確認）    <input type="password" name="user_mail_sub"><br>
      </div>
       <button type="button" class="btn2">新規登録</button>
</form>