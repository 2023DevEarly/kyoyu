

<link rel="stylesheet" href="CSS/roguin.css"/>

<form name="login_form">
        
       <div class="login_rogo_top">
        <?php
        //ファイル指定
        $filerogo = 'C:/xampp2/htdocs/web/kaihatu/CSS/rogo.jpg';
        //パスから画像のデータ取得
        $rogo = file_get_contents($filerogo);
        $base64 = base64_encode($rogo);
        echo '<img src="data:image/jpeg;base64,' . base64_encode($rogo) . '" alt="rogo">';
        ?>
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
           $sql="SELECT * FROM F_user WHERE users_password=?";
           $ps=$pdo->prepare($sql);
           $ps->bindValue(1,$_POST['password'],PDO::PARAM_STR);
           $ps->execute();
       
           $Array = $ps->fetchAll();
           $count = 0;
           foreach($Array as $row){
             if($row['users_pass'] == $_POST['password'] && $row['user_name'] == $_POST['user_name']){
               $_SESSION['user_name'] = $_POST['user_name'];
               $_SESSION['jyushoID'] = $row['users_adress'];
               header("Location:afterlogin.php");
             }else{
               header("Location:roguin.php");
             }
           }
       }
          if($count == 0){
            $alert = "<script type='text/javascript'>alert('メールアドレス、又はパスワードが違います');</script>";
            echo $alert;

          }
?>
       <button type="button" class="btn1">ログイン</button><br>
      <div class="login_sin_">
        <h1>新規登録</h1>
      </div>

      <div class="login_sinki_btm">
      メールアドレスとパスワードを入力して「新規登録」ボタンを押してください<br>

         ハンドルネーム　<input type="name" name="handle_name"><br>
         メールアドレス　 <input type="id" name="user_mail" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br>
         メールアドレス（再確認） <input type="id" name="user_mail_sub"><br>
         パスワード　　　    <input type="password" name="user_pass" pattern="[0-9A-Za-z]+" minlength="8" maxlength="30"><br>
         パスワード（再確認）    <input type="password" name="user_mail_sub"><br>
      </div>
       <button type="button" class="btn2">新規登録</button>
</form>