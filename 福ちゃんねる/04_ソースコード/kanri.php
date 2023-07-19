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
         
      <div class="login_rogo_">
          <h1>ログイン</h1>
      </div>
       
       <div class="login_form_btm">
       
          管理者番号とパスワードを入力して「ログイン」ボタンを押してください<br>
      <form action="kanrikakunin.php" method="post">
        <div>
            <label>
              管理者番号：
              <input type="text" name="num" required>
            </label>
        </div>
        <div>
          <label>
            パスワード：
            <input type="password" name="pass" required>
          </label>
        </div>
      <input type="submit" value="ログイン">
<div style="text-align:left;">
        <button type="button" class="btn btn-outline-dark" onclick="location.href='http://localhost/chanel/top.php'">◁</button>
        </div>
