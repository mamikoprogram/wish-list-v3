<?php

require_once "../../include/initialize.php";

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    return null;
}

$db = db();
$row = getWishById($db, $_GET['id'], $_SESSION['id']);

//todo 関数を作って修正
//if (!empty($row)) {
//    $row = updateWish($db, $_GET['id'], $_SESSION['id']);
//    header('location:http://localhost:8080/user/login.php');
//    exit;
//}

render('wish/edit', ['row' => $row]);

