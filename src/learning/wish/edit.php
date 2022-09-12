<?php

require_once "../../include/initialize.php";

$db = db();
//編集画面の内容を取得

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    return null;
}
$row = getWishById($db, $_GET['id'], $_SESSION['id']);

$numRow = updateWish($db, $_GET['id'], $_SESSION['id']);

render('wish/edit', [
    'row' => $row,
    'id' => $_GET['id'],
    'wishes' => $wishes
]);

if ($numRow === 0) {
    echo '更新できませんでした。';
}

if ($numRow >= 1) {
    header('location:http://localhost:8080/wish/detail.php');
    exit;
}
