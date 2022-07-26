<?php

require_once "../include/initialize.php";
$user = [];

$db = db();
$user = getUserById($db, $_SESSION['id'] ?? null);

if (empty($user)) {
    header('location:http://localhost:8080/login.php');
    exit;
}

function getUserInfo(array $user): string
{
    if (empty($user)) {
        return '';
    }
    return h(
        "{$user['name']}【{$user['email']}】さん"
    );
}

$wishes = findWishByList($db, $_SESSION['id']);

render('wish/list', [
    'user' => $user,
    'wishes' => $wishes
]);
