<?php

require_once "../../include/initialize.php";


$db = db();
//todo 作業中
$completionWish = completionWish($db);
render('wish/completion', ['completion' => $completionWish]);

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    return null;
}

$completion = completionWishNum($db, $_GET['id'], $_SESSION['id']);

if (empty($completion)) {
    echo 'sqlエラー';
}

header('location:http://localhost:8080/index.php');
exit;





