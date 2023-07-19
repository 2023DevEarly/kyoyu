<?php
public function login_check($email,$pass){
    $pdo = new PDO('mysql:host=localhost;dbname=chanel;charset=utf8','root','');   //db接続に必要な情報を変数に入れる

          // 接続状況をチェックします
  if (mysqli_connect_errno()) {
      die("データベースに接続できません:" . mysqli_connect_error() . "\n");
  }
  $isUserExist=0;
  $isCorrectPass=0;
  $error="";

  $con->set_charset('utf8');
  $query = 'SELECT id,name,email,password FROM user';
  $result = $con->query($query);
  // クエリを実行します。
  if (!$result) {
      echo $con->error;
      exit();
  }
  while($row=$result->fetch_array(MYSQLI_ASSOC)){
    $rows[] = $row;
  }
  foreach($rows as $row){

    if($row['email']==$email){

      $isUserExist=1;

      if($row['password']==$pass){

        $isCorrectPass=1;
        $_SESSION['name']=$row['name'];
        $_SESSION['id']=$row['id'];
      }
    }

  }
  if($isUserExist==0){
    $error="入力されたメールアドレスは登録されていません。";
  }else{
    if($isCorrectPass==0){
      $error="パスワードが違います。";

    }else{
        header('Location:loguin.php');
      exit;
    }
  }
  return $error;
  // 接続を閉じます
  mysqli_close($con);
}
 ?>