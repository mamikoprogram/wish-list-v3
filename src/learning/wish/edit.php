<?php

require_once "../../include/initialize.php";

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    return null;
}

//編集画面の内容を取得
$db = db();
$row = getWishById($db, $_GET['id'], $_SESSION['id']);
render('wish/edit', [
    'row' => $row,
]);


//更新する
$db = db();
$rowNum = updateWish($db, $_GET['id'], $_SESSION['id']);

if ($rowNum === 0) {
    echo '更新できませんでした。';
}
$detail = getWishById($db, $_GET['id'], $_SESSION['id']);
render('wish/detail', [
    'detail' => $detail,
]);
header('location:http://localhost:8080/wish/detail.php');
exit;
