<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="css/myスレ.css"/>
        <title>myスレ</title>
    </head>
    
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <body>

        <div class="back1">
            <?php
                date_default_timezone_set("japan");
                echo date('Y/m/d');
                
            ?></br>
            <div style="text-align:center;">
                <img src="img/logo.jpg">
            </div>
        </div>
        <div class="main py-5">
            
            <?php
                $pdo = new PDO('mysql:host=localhost;dbname=fuku;charset=utf8','root','root');
                $sql = "SELECT * FROM スレッド";
                $selectdata = $pdo->query($sql);
                ?>
                <?php $c=0;foreach($selectdata as $row):?>
                <?php
                $id=$row['thread_id'];
                echo'<div class="row py-3 border border-dark" " style="background-color: #eee;">';
                echo'<div class="col-2 text-end">'.$row['create_day'].'</div>';
                echo'<div style="text-align:center;">';
                echo '<form action="ログイン後スレッド.php" method="POST" >';
                echo '<button class="btn btn-outline-dark" type="hidden" name="thread" value="'.$id.'"/>'.$row['title'].'</button>';
                echo'</div>';
                echo '</form>';
                echo'</div>';
            ?>
            <?php echo""?></br>
            <?php endforeach?>
        </div>
    </body>
</html>
<style>
</style>
