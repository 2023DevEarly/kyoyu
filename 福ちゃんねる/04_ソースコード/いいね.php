<?php
1、データベースに良いしているかを検索
$pdo = new PDO('mysql:host=localhost;dbname=yamatter;charset=utf8', 'root', 'root');
                $sql3 = "select * from favorite_post where user_id = ? and like_subject = ?";
                $ps3 = $pdo->prepare($sql3);
                $ps3->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_INT);
                $ps3->bindValue(2,$row['post_id'],PDO::PARAM_STR);
                $ps3->execute();
                $check_like = null;
                foreach($ps3 as $row3){
                 $check_like = $row3['like_id'];
                }

 2、いいねの判別
 if(isset($check_like)){            過去に良いねしてあった場合
    echo               '<form action="addlike.php" method="post">';
                      $like = "like".$row['post_id'];
    echo                '<button type="hidden" name="like" value="1,'.$row['post_id'].'" style="width:90px;background-color:white;border:none;">'.//最初からいいねしてるかの判別
                      //ここにいいねを押してある場合の表示
                      </button>
                      </form>';
 }else{          まだいいねしてなかった場合
    echo                '<form action="addlike.php" method="post">';
                        $like = "like".$row['post_id'];
    echo                '<button type="hidden" name="like" value="2,'.$row['post_id'].'" style="width:90px;background-color:white;border:none;">'.//最初からいいねしてるかの判別
                      //ここにまだいいねを押されていない場合の表示
                      </button>
                      </form>';
}    

3、遷移させて表示
//いいねを追加
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
        

                //いいねした投稿/返信をfavorite_postに登録
                $sql = "INSERT INTO favorite_post(user_id, like_subject) VALUES(?,?)";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$_SESSION['user']['id'],PDO::PARAM_INT);
                $ps->bindValue(2,$favorite,PDO::PARAM_STR);
                $ps->execute();


//いいねを消す
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

                //いいねを取り消した投稿/返信をfavorite_postから削除
                $sql = "DELETE FROM favorite_post WHERE like_subject = ?";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$favorite,PDO::PARAM_STR);
                $ps->execute();
?>