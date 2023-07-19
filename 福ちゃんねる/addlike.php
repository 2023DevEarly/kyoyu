<?php
session_start();
$data = $_POST['like']; 
$dataArray = explode(',', $data);

$like = $dataArray[0];
$favorite = $dataArray[1];


$pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');
$a = substr($favorite,0,2);
//追加なのか削除なのかの分岐
if($like == 2){
        //いいねしたのが投稿か返信か判別
        if($a == "00"){
                //返信のカウントを追加したいいね数を取得
                $sql = "SELECT good FROM いいね WHERE comment = ?";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$favorite,PDO::PARAM_STR);
                $ps->execute();
                        foreach($ps as $row){
                                $newfabulous = $row['fabulous'] + 1;
                        }

                //返信のいいね数を更新
                $sql = "UPDATE reply SET fabulous = ? WHERE reply_id = ?";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$newfabulous,PDO::PARAM_INT);
                $ps->bindValue(2,$favorite,PDO::PARAM_STR);
                $ps->execute();

        }else{
                //投稿のカウントを追加したいいね数を取得
                $sql = "SELECT fabulous FROM post WHERE post_id = ?";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$favorite,PDO::PARAM_STR);
                $ps->execute();
                        foreach($ps as $row){
                                $newfabulous = $row['fabulous'] + 1;
                        }

                //投稿のいいね数を更新
                $sql = "UPDATE post SET fabulous = ? WHERE post_id = ?";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$newfabulous,PDO::PARAM_INT);
                $ps->bindValue(2,$favorite,PDO::PARAM_STR);
                $ps->execute();
        }

                //いいねした投稿/返信をfavorite_postに登録
                $sql = "INSERT INTO favorite_post(user_id, like_subject) VALUES(?,?)";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_INT);
                $ps->bindValue(2,$favorite,PDO::PARAM_STR);
                $ps->execute();

}else{
                //いいねを取り消した場合
        if($a == "00"){
                //返信のカウントを取り消したいいね数を取得
                $sql = "SELECT fabulous FROM reply WHERE reply_id = ?";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$favorite,PDO::PARAM_STR);
                $ps->execute();
                foreach($ps as $row){
                        $newfabulous = $row['fabulous'] - 1;
                }

                //返信のいいね数を更新
                $sql = "UPDATE reply SET fabulous = ? WHERE reply_id = ?";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$newfabulous,PDO::PARAM_INT);
                $ps->bindValue(2,$favorite,PDO::PARAM_STR);
                $ps->execute();

        }else{
                //投稿のカウントを取り消したいいね数を取得
                $sql = "SELECT fabulous FROM post WHERE post_id = ?";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$favorite,PDO::PARAM_STR);
                $ps->execute();
                foreach($ps as $row){
                        $newfabulous = $row['fabulous'] - 1;
                }

                //投稿のいいね数を更新
                $sql = "UPDATE post SET fabulous = ? WHERE post_id = ?";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$newfabulous,PDO::PARAM_INT);
                $ps->bindValue(2,$favorite,PDO::PARAM_STR);
                $ps->execute();
        }

                //いいねを取り消した投稿/返信をfavorite_postから削除
                $sql = "DELETE FROM favorite_post WHERE like_subject = ?";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$favorite,PDO::PARAM_STR);
                $ps->execute();

};
header('Location:07_ジャンル別投稿一覧画面.php');
?>