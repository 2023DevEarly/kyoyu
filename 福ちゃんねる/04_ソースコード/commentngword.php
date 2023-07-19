<?php
session_start();
$date=date('Y-m-d H:i:s');
$zero=0;
       $pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');
       $sql = "SELECT * FROM NGワード WHERE ng_decision LIKE '%*%'";
       $ps = $pdo->query($sql);
       $Array = $ps->fetchAll();
       $c=0;foreach($Array as $row)
       if (str_replace($row, '', $_POST['text'])) {
        $msg = '使用できない言語が含まれています。';//NGワードがある場合
    } else if (!empty($_FILES['file']['name'])) {
      $file = $_FILES['file'];

      $filename = $file['name'];
      $filetype = $file['type'];
      $filedata = file_get_contents($file['tmp_name']);

      $pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');
      $sql ="INSERT into メッセージ(user_id,thread_id,comment,create_day,good,media1)
              value(?,?,?,?,?,?)";
      $ps = $pdo->prepare($sql);
      $ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_STR);//ユーザーID
      $ps->bindValue(2,$_POST['genre'],PDO::PARAM_STR);//ジャンル
      $ps->bindValue(3,$_POST['text'],PDO::PARAM_STR);//投稿内容
      $ps->bindValue(4,$date,PDO::PARAM_STR);//日時
      $ps->bindValue(5,$zero,PDO::PARAM_STR);//いいね数
      $ps->bindValue(6,$filedata,PDO::PARAM_LOB);//メディア1
      $ps->execute();
      }else{ //ないばあい
      $pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');
      $sql ="INSERT into メッセージ(user_id,thread_id,comment,create_day,good)
              value(?,?,?,?,?)";
      $ps = $pdo->prepare($sql);
      $ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_STR);//ユーザーID
      $ps->bindValue(2,$_POST['genre'],PDO::PARAM_STR);//ジャンル
      $ps->bindValue(3,$_POST['text'],PDO::PARAM_STR);//投稿内容
      $ps->bindValue(4,$date,PDO::PARAM_STR);//日時
      $ps->bindValue(5,$zero,PDO::PARAM_STR);//いいね数
      $ps->execute();
}
    header('Location:ログイン後スレッド.php');
?>