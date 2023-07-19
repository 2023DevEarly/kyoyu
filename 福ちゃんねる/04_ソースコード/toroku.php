<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="CSS/loguin.css"/>
</head>
       <div class="login_rogo_top">
       <div style="text-align:left;"> 
    <?php
            date_default_timezone_set("japan");
            echo date("Y/m/d");
        ?>
        <br>
        </div>
        <div style="text-align:center;">
        <div id="headerdiv">
            <img src="img/logo.png">
        </div>
    </div>
       </div>
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
<form method="post" action="torokukanryou.php">
         ハンドルネーム　<input type="name" name="name"required><br>
         メールアドレス　 <input type="email" name="mail" required><br>
         メールアドレス（再確認） <input type="email" name="usermail_sub"required><br>
         <?php if('usermail' != 'usermail_sub'){
                    echo '<div style="color: red; text-align: center;">'.'上記のメールアドレスと違います。'.'</div>';
         }   ?>
         パスワード　　　    <input type="password" name="pass" pattern="[0-9A-Za-z]+" minlength="8" maxlength="30"required><br>
         パスワード（再確認）    <input type="password" name="userpass_sub"required><br>
         <?php if('userpass' != 'userpass_sub'){
                    echo '<div style="color: red; text-align: center;">'.'上記のパスワードと違います。'.'</div>';
         }    ?>
         <input type="submit" value="登録する">
        </form><br>
        <div style="text-align:left;">
        <button type="button" class="btn btn-outline-dark" onclick="history.back(-1)">◁</button>
        </div>
      </div>