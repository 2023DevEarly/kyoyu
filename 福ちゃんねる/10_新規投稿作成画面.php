<?php
session_start();
unset($_SESSION['trash']);
?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>やまったー | 新規投稿作成</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="css/nakai.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link href="css/yamane.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link href="css/yamanishi.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.4/css/all.css">
</head>
<style>
    label {
        padding: 10px 40px;
        color: #FBA8B8;
        background-color: #fff;
        cursor: pointer;
    }

    input[type="file"] {
        display: none;
    }
</style>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-3 back_pink_ys" style="height:100vh;"></div>

            <div class="col-md-6 col-lg-6 start_0_ys">
                <div class="magin-sayu-ys  magin40_yamanisi">

                    <button type="button" class="btn container-fluid color_white_yamani" style=" width: 130px;height: 40px;background: #FBA8B8;" onclick="location.href='05_プロフィール画面.php'">キャンセル</button>

                    <form method="post" action="new_post.php" enctype="multipart/form-data">

                        <div class="touroku_ys">
                            <button type="submit" class="btn container-fluid color_white_yamani" style=" width: 130px;height: 40px;background: #FBA8B8;">投稿する</button>
                        </div>
<?php
                //アイコン表示
                $pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
                $sql = "select * from user where user_id = ?";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_INT);
                $ps->execute();
                foreach($ps as $row){
                    $aikon = $row['media'];
                }
                  if (!empty($aikon) || isset($aikon)) { //設定している場合

                    $base64_image = base64_encode($aikon);

                    echo '<br>' . '<img class="image_middle" width="250"src="data:image/jpeg;base64,' .  $base64_image . '" />　';

                  } else { //設定してない場合

                    echo '<img class="image_middle" src="img/pink.png">　';
                  }
?>
                        <h5 style="position: relative;top:-50px;left:100px;"><?php echo $_SESSION['user']['name']; ?></h5>

                        <select class="form-select" style="border-color:#FBA8B8;border-width:3px;" name="genre">
                            <option value="2">JPOP</option>
                            <option value="3">洋楽</option>
                            <option value="4">アニソン</option>
                            <option value="5">クラシック</option>
                            <option value="6">ロック</option>
                            <option value="7">VOCALOID</option>
                            <option value="8">ギター</option>
                            <option value="9">楽器</option>
                            <option value="10">その他</option>
                        </select>

                        <hr start_0_ys magin40_yamanisi>


                        <textarea class="form-control alert-light toukou_bokku_ys" name="text" id="txt1" maxlength="300" required placeholder="｜投稿内容"></textarea><br>

                        <label>
                            <input type="file" onchange="preview(this)" multiple accept="image/*,video/*" name="file" value="up">メディアを選択
                            <div class="preview-area"></div>

                            <script>
                                function preview(elem, output = '') {
                                    Array.from(elem.files).map((file) => {
                                        const blobUrl = window.URL.createObjectURL(file)
                                        output += `<img src=${blobUrl}>`
                                    })
                                    elem.nextElementSibling.innerHTML = output
                                }
                            </script>
                        </label>
                    </form>
                </div>
            </div>

            <div class="col-md-3 col-lg-3 back_pink_ys" style="height:100vh;"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="sprict/file_ys.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>