<link rel="stylesheet" href="css/thread.css">
<form name="loguinkanryou_form">
<div class=back>  
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
<div style="text-align:center;">
    <h1>スレッドを作成しました</h1>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');
$day_str = date('Y-m-d H:i:s');
$title = $_POST['title'];
$sql = "INSERT INTO スレッド(handle_name, create_day, title, comment) VALUES (?, ?, ?, ?)";
$ps = $pdo->prepare($sql);
$ps->bindValue(1,$_POST['handlename'],PDO::PARAM_STR);
$ps->bindValue(2,$day_str,PDO::PARAM_STR);
$ps->bindValue(3,$_POST['title'],PDO::PARAM_STR);
$ps->bindValue(4,$_POST['comment'],PDO::PARAM_STR);
$ps->execute();
echo "<p>NGワード: " . $title . "</p>";
//メールアドレスで検索を行い、user_idを取得するSELECTする

//$sql4 = "SELECT MAX(thread_id) FROM スレッド";
//$ps4 = $pdo->prepare($sql4);
//$ps4->execute();
//$newuserid = $ps4->fetchColumn();

?>
    <div class="section1 text-center">
    <button type="button" class="btn btn-outline-dark" type="button" onclick="location.href='logtop.php'">　　次へ　　</button>
  </div>
</div>
</div>   
</form>
