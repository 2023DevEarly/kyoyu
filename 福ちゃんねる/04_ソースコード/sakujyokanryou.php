<link rel="stylesheet" href="css/loguinkanryou.css">

<form name="loguinkanryou_form">
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
    <h1>スレッドを削除しました。</h1>
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');
    $sql = "DELETE FROM スレッド WHERE thread_id = ?";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1,$_POST['thread'], PDO::PARAM_INT);
    $ps->execute();
    
    ?>
    <div class="section1 text-center">
    <button type="button" class="btn btn-outline-dark" type="button" onclick="location.href='logtop.php'">　　トップに戻る　　</button>
  </div>
</div>
</div>   
</form>