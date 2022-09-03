<?php

require_once "../../include/initialize.php";

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    return null;
}

$db = db();
$row = getWishById($db, $_GET['id'], $_SESSION['id']);

//todo 関数を作って修正
$rows = getRowNums($db, wishes, ['subject', 'memo']);

if (!empty($rows)) {
    $row = updateWish($db, $_POST['id'], $_SESSION['id']);
    header('location:http://localhost:8080/wish/detail.php');
    exit;
}
render('wish/edit', ['row' => $row]);

