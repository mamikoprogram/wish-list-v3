<?php

require_once "../include/initialize.php";
$user = [];

$db = db();
$user = getUserById($db, $_SESSION['id'] ?? null);

if (empty($user)) {
    header('location:http://localhost:8080/login.php');
    exit;
}

$wishes = findWishByList($db);

function getUserInfo(array $user): string
{
    if (empty($user)) {
        return '';
    }
    return h(
        "{$user['name']}【{$user['email']}】さん"
    );
}
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wish List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Wish List</h1>
<p>こんにちは<?php
    echo getUserInfo($user); ?></p>
<a href="new-wish.php" class="btn-style">Wishを追加する</a>
<table>
    <thead>
    <tr>
        <th>My Wish</th>
        <th>Memo</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($wishes as $wish): ?>
        <tr>
            <td><?php
                echo mb_substr(h($wish['subject']), 0, 10); ?></td>
            <td><?php
                echo mb_substr(h($wish['memo']), 0, 10); ?></td>
        </tr>
    <?php
    endforeach; ?>
    </tbody>
</table>
</body>
</html>
