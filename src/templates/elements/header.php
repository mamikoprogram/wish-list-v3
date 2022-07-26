<?php
/**
 * @var string $title
 */
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo h($title) ?></title>
<!--     todo ファイル読み込み修正-->
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
<h1><?php echo h($title) ?></h1>
