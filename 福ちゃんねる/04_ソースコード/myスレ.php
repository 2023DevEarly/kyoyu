<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="myスレ.css"/>
        <title>トップ</title>
    </head>
    
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <body>

        <div class="back1">
            <?php
                date_default_timezone_set("japan");
                echo date('Y/m/d');
            ?></br>
            <div style="text-align:center;">
                <img src="MicrosoftTeams-image (22).png">
            </div>
        </div>

        <div class="search">
            <div class="search1">
                <p>myスレ</p> 
            </div>
            
        </div>

        <p>作成日</p>
         <?php
                date_default_timezone_set("japan");
                echo date('Y/m/d');
         ?>
       
            </div>
        </div>
    </body>
</html>
