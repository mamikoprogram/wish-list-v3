<?php

require_once "../include/initialize.php";
$user = [];

$db = db();
$user = getUserById($db, $_SESSION['id'] ?? null);

if (empty($user)) {
    header('location:http://localhost:8080/user/login.php');
    exit;
}

$wishes = findWishByList($db, $_SESSION['id']);

//$wishes = display($db);

//$wishes = findWishByList($db, $_SESSION['id']);

render('wish/list', [
    'user' => $user,
    'wishes' => $wishes
]);
