


<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="CSS/loguin.css"/>
</head>
<form method="POST" name="login_form">
        //ロゴ表示
       <div class="login_rogo_top">
        
       </div>
         
      <div class="login_rogo_">
          <h1>ログイン</h1>
      </div>
       
       <div class="login_form_btm">
       
          メールアドレスとパスワードを入力して「ログイン」ボタンを押してください<br>

         メールアドレス　 <input type="email" name="user_mail" required><br>
                          <?php require 'login_check.php'  ?><br>
         パスワード　　　    <input type="password" name="user_pass" required><br>
       </div>
          
       <button type="button" class="btn1" onclick="location.href='loguinkanryou.php'">ログイン</button><br>
      <div class="login_sin_">
        <h1>新規登録</h1>
      </div>

      <div class="login_sinki_btm">
      メールアドレスとパスワードを入力して「新規登録」ボタンを押してください<br>

         ハンドルネーム　<input type="name" name="handle_name"><br>
         メールアドレス　 <input type="email" name="user_mail" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
         メールアドレス（再確認） <input type="email" name="user_mail_sub"><br>
         パスワード　　　    <input type="password" name="user_pass" pattern="[0-9A-Za-z]+" minlength="8" maxlength="30"><br>
         パスワード（再確認）    <input type="password" name="user_mail_sub"><br>
      </div>
       <button type="button" class="btn2">新規登録</button>
</form>