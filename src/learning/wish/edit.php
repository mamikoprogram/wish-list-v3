<?php

require_once "../../include/initialize.php";
//データベース接続
$db = db();

//更新する処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $rowNum = updateWish($db, $_POST['subject'], $_POST['memo'], $_POST['id'], $_SESSION['id']);
    } catch (Exception $e) {
    }
}

if (!empty($rowNum)) {
    $wishId = $_POST['id'];
    header("location:http://localhost:8080/wish/detail.php?id=$wishId");
    exit;
}

//表示する処理
//$_REQUEST = get > post
try {
    $row = getWishById($db, $_REQUEST['id'], $_SESSION['id']);
    render('wish/edit', [
        'id' => $_GET['id'],
        'row' => $row,
    ]);
} catch (Exception $e) {
}
