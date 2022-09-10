<?php

require_once "../../include/initialize.php";

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    return null;
}

$db = db();
$row = getWishById($db, $_GET['id'], $_SESSION['id']);


//todo 関数を作って修正
$nums = getRowNums($db, 'wishes', ['subject', 'memo'], $_GET['id']);
if ($nums === 0) {
    return null;
}

$row = updateWish($db, $_POST['subject'], $_POST['memo'], $_POST['id'], $_SESSION['id']);
render('wish/edit', ['row' => $row]);
header('location:http://localhost:8080/wish/detail.php');
exit;

