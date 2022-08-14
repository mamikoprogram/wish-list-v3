<?php

require_once "../../include/initialize.php";

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    return null;
}
$db = db();
$detail = getWishById($db, $_GET['id'], $_SESSION['id']);

if (empty($detail)) {
    header('location:http://localhost:8080/index.php');
    exit;
}

render('wish/detail', [
    'id' => $_GET['id'],
    'detail' => $detail,
]);
