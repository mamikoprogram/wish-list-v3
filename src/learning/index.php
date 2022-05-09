<?php

require_once "../include/initialize.php";

$email = $_SESSION['email'];
$name = $_SESSION['name'];

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
    if (!empty($name)):
//        hはXSS対策
        echo h($name);
    else:
        echo h($email);
    endif; ?>さん</p>
</body>
</html>
