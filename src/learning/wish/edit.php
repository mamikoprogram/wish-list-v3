<?php

require_once "../../include/initialize.php";
//データベース接続
$db = db();

//更新する処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rowNum = updateWish($db, $_POST['id'], $_SESSION['id']);
    var_dump($rowNum);
}
//if (!empty($rowNum)) {
//    $wishId = $_POST['id'];
//    header("location:http://localhost:8080/wish/detail.php?id=$wishId");
////    header("location:http://localhost:8080/wish/detail.php?id={$_POST['id']}");
//    exit;
//}

//表示する処理
//$_REQUEST = get > post
$row = getWishById($db, $_REQUEST['id'], $_SESSION['id']);
render('wish/edit', [
    'row' => $row,
]);

//
//if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
//    return null;
//}
//
////編集画面の内容を取得
//$db = db();
//$row = getWishById($db, $_GET['id'], $_SESSION['id']);
//render('wish/edit', [
//    'row' => $row,
//]);
//
//
////更新する
//$db = db();
//$rowNum = updateWish($db, $_GET['id'], $_SESSION['id']);
//
//if ($rowNum === 0) {
//    echo '更新できませんでした。';
//}
//$detail = getWishById($db, $_GET['id'], $_SESSION['id']);
//render('wish/detail', [
//    'detail' => $detail,
//]);
//header('location:http://localhost:8080/wish/detail.php');
//exit;
