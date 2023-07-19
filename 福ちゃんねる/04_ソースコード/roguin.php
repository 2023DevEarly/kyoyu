

<link rel="stylesheet" href="CSS/roguin.css"/>

<form name="login_form">
        
       <div class="login_rogo_top">
        <img src="img/logo.jpg">
       </div>
         
      <div class="login_rogo_">
          <h1>ログイン</h1>
      </div>
       
       <div class="login_form_btm">
       <?php
  
?>
          メールアドレスとパスワードを入力して「ログイン」ボタンを押してください<br>

         メールアドレス　 <input type="id" name="user_mail" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
         パスワード　　　    <input type="password" name="user_pass" pattern="[0-9A-Za-z]+" minlength="8" maxlength="30"><br>
       </div>
       <?php
       session_start();
       if(isset($_POST['handle_name'])){
           $pdo = new PDO('mysql:host=localhost;dbname=webdb;charset=utf8','root','');
           $sql="SELECT * FROM ユーザー WHERE users_pass=?";
           $ps=$pdo->prepare($sql);
           $ps->bindValue(1,$_POST['password'],PDO::PARAM_STR);
           $ps->execute();
       
           $Array = $ps->fetchAll();
           $count = 0;
           foreach($Array as $row){
             if($row['users_pass'] == $_POST['password'] && $row['handle_name'] == $_POST['handle_name']){
               $_SESSION['handle_name'] = $_POST['handle_name'];
               $_SESSION['jyushoID'] = $row['users_adress'];
               header("Location:afterlogin.php");
             }else{
               header("Location:roguin.php");
             }
           }
       }
          
?>
       <button type="button" class="btn1" onclick="location.href='http://localhost/chanel/loguinkanryou.php'">ログイン</button><br>
       </form>
      <div class="login_sin_">
        <h1>新規登録</h1>
      </div>
      <div style="text-align:center;">
      <div class="login_sinki_btm">
      <form method="post" action="loguinkanryou.php">
      メールアドレスとパスワードを入力して「新規登録」ボタンを押してください<br>

         ハンドルネーム　<input type="name" name="handle_name"><br>
         メールアドレス　 <input type="id" name="user_mail" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
         メールアドレス（再確認） <input type="id" name="user_mail_sub"><br>
         パスワード　　　    <input type="password" name="user_pass" pattern="[0-9A-Za-z]+" minlength="8" maxlength="30"><br>
         パスワード（再確認）    <input type="password" name="user_mail_sub"><br>
        <input type="submit" value="新規登録">
      </div>
      </form>
      </div>