<?php
session_start();

    $pdo = new PDO('mysql:host=localhost;dbname=webdb;charset=utf8','root','');
    $sql = "INSERT INTO ng_decision  FROM ngワード WHERE  = ?";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1,$_POST['NGword'],PDO::PARAM_STR);
    $ps->execute();
    $searchArray = $ps->fetchAll();

    header('Location:NGword.php');
?>