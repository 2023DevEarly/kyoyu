<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="CSS/loguin.css"/>
</head>
<form name="login_form" action="loguinkanryou.php" method="POST" >
       <div class="login_rogo_top">
        <img src="rogo.jpg">
       </div>
<form name="login_form2" action="loguinkanryou.php" method="POST" >
      <div class="login_sin_">
        <h1>新規登録</h1>
      </div>

      <div class="login_sinki_btm">
      メールアドレスとパスワードを入力して「新規登録」ボタンを押してください<br>

      <?php
            
             
        if(empty($user_name) || empty($user_mail) || empty($user_pass)){
            $erro[]='入力されていない項目があります。';
        }
                  
      ?>

         ハンドルネーム　<input type="name" name="handlename"><br>
         メールアドレス　 <input type="email" name="usermail" ><br>
         メールアドレス（再確認） <input type="email" name="usermail_sub"><br>
         <?php if('usermail' == 'usermail_sub'){
                    echo '<div style="color: red; text-align: center;">'.'上記のメールアドレスと違います。'.'</div>';
         }   ?>
         パスワード　　　    <input type="password" name="userpass" pattern="[0-9A-Za-z]+" minlength="8" maxlength="30"><br>
         パスワード（再確認）    <input type="password" name="userpass_sub"><br>
         <?php if('userpass' == 'userpass_sub'){
                    echo '<div style="color: red; text-align: center;">'.'上記のパスワードと違います。'.'</div>';
         }   ?>
         
         <?php
            $pdo = new PDO("mysql:host=localhost;dbname=kaihatu;charset=utf8",'root','root');
            $random=rand();
            $_SESSION['random']=$random;
            $handle_name = $_POST['handlename'];
            $user_mail = $_POST['usermail'];
            $user_pass = $_POST['userpass'];
            session_start();
            if((isset($_SESSION['error']))){
                echo '<div style="color: red; text-align: center;">'.$_SESSION['error'].'</div>';
                unset($_SESSION['error']);
            }else{
            
            $sql = "INSERT INTO ユーザー(user_id,handle_name,user_mail,user_pass) VALUES(?,?,?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$random,PDO::PARAM_INT);
            $ps->bindValue(2,$handle_name,PDO::PARAM_STR);
            $ps->bindValue(3,$user_mail,PDO::PARAM_STR);
            $ps->bindValue(4,$user_pass,PDO::PARAM_STR);
            $ps->execute();
            }
         ?>
      </div>
       <button type="button" class="btn2">新規登録</button>
</form>