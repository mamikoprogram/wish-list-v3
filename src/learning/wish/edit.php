<?php

require_once "../../include/initialize.php";

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    return null;
}
//todo 編集機能作業中
try {
    $db = db();
    $row = getWishById($db, $_GET['id'], $_SESSION['id']);
} catch (Exception $e) {
}

render('wish/edit', ['row' => $row]);
