<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>NGワード登録</title>
    <style>
         </style>
        <link href="css/thread.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class=back>  
<div style="text-align:left;"> 
    <?php
            date_default_timezone_set("japan");
            echo date("Y/m/d");
        ?>
        </div>
        <div style="text-align:center;">
        <div id="headerdiv">
            <img src="img/logo.png">
        </div>
    </div>
</div>
<div style="text-align:center;">

<form method="post" action="NGword.php">
  <label for="ngword">登録するNGワードを入力</label><br>
        <input type="text" id="ngword" name="ngword" required><br>
    <input type="submit" value="登録する">
  </div>
</form>
<div style="text-align:left;">
        <button type="button" class="btn btn-outline-dark" onclick="location.href='http://localhost/chanel/logtop.php'">◁</button>
        </div>
</div>
</body>
</html>