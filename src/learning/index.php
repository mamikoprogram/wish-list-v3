<?php


require_once "../include/initialize.php";
$user = [];

try {
    $db = db();
    $user = getUserById($db, $_SESSION['id'] ?? null);
} catch (Exception $e) {
}

function getUserInfo(array $user): string
{
    if (empty($user)) {
        return '';
    }
//    要確認　表示される名前
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
</body>
</html>
