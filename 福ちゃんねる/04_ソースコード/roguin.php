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
          メールアドレスとパスワードを入力して「ログイン」ボタンを押してください<br>

         メールアドレス　 <input type="id" name="user_id"><br>
         パスワード　　　    <input type="password" name="password"><br>
       </div>
       <button type="button" class="btn1">ログイン</button><br>
      <div class="login_sin_">
        <h1>新規登録</h1>
      </div>

      <div class="login_sinki_btm">
        aaaa
      </div>
       <button type="button" class="btn2">新規登録</button>
</form>