<?php

require_once "../../include/initialize.php";

$db = db();
//編集画面の内容を取得
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    return null;
}
$rowNum = updateWish($db, $_POST['id'], $_SESSION['id']);
$row = getWishById($db,$_POST['id'],$_SESSION['id']);
render('wish/edit', [
    'row' => $row
]);

if ($rowNom >= 1) {
    header('location:http://localhost:8080/wish/detail.php');
    exit;
} else {
    echo '更新できませんでした。';
}
