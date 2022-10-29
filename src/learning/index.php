<?php

/**
 * このファイルのフルパス
 * /var/www/learning/index.php
 *
 * このファイルのカレントディレクトリ
 * /var/www/learning
 *
 * このファイルのカレントURL
 * /index.php
 *
 * このファイルの絶対URL
 * http://localhost:8080/index.php
 */

require_once "../include/initialize.php";
//以下の処理を入れるとエラーが出ます
//session_start();
$user = [];

$db = db();
$user = getUserById($db, $_SESSION['id'] ?? null);

if (empty($user)) {
    header('location:http://localhost:8080/user/login.php');
    exit;
}

$wishes = findWishByList($db, $_SESSION['id'], !empty($_GET['completion']));

render('wish/list', [
    'user' => $user,
    'wishes' => $wishes,
]);
