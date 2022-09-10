<?php

require_once "../../include/initialize.php";

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    return null;
}

$db = db();
$row = getWishById($db, $_GET['id'], $_SESSION['id']);

$row = updateWish($db, $_GET['id'], $_SESSION['id']);
//var_dump($update);
if ($row === 0) {
    echo '更新できませんでした。';
}
render('wish/edit', ['row' => $row]);
header('location:http://localhost:8080/wish/detail.php');
exit;
