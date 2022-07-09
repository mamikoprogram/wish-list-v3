<?php

require_once "../include/initialize.php";
$user = [];

try {
    $db = db();
    $user = getUserById($db, $_SESSION['id'] ?? null);
} catch (Exception $e) {
}

$wishes = display($db);

function getUserInfo(array $user): string
{
    if (empty($user)) {
        return '';
    }
    return h(
        "{$user['name']}【{$user['email']}】さん"
    );
}

render('wish/list', [
    'user' => $user,
    'wishes' => $wishes,
]);
