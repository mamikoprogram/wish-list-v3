<?php

/**
 * このファイルのフルパス
 * /var/www/learning/wish/new.php
 *
 * このファイルのカレントディレクトリ
 * /var/www/learning/wish
 *
 * このファイルのカレントURL
 * /with/new.php
 *
 * このファイルの絶対URL
 * http://localhost:8080/with/new.php
 *
 * ブラウザ上でindex.phpにアクセスさせる方法
 * <a>タグや<form>タグで指定できるURL
 *
 * 絶対URL： http://localhost:8080/index.php
 * 絶対URL： //localhost:8080/index.php
 * ルートURL： /index.php
 * 相対URL：../index.php
 *
 * ブラウザ上でlogin.phpにアクセスさせる方法
 * <a>タグや<form>タグで指定できるURL
 *
 * 絶対URL： http://localhost:8080/user/login.php
 * 絶対URL： //localhost:8080/user/login.php
 * ルートURL： /user/login.php
 * 相対URL：../user/login.php
 *
 * 補足 絶対URLの違い
 * 絶対URL： http://localhost:8080/index.php
 * 絶対URL： //localhost:8080/index.php
 *
 * アクセスされた http / https の方法に従ってリンクを生成する方法
 * 絶対URL： //localhost:8080/index.php
 *
 */


require_once "../../include/initialize.php";

$errors = register();
render('wish/new', [
    'errors' => $errors
]);

function register(): ?array
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return null;
    }

    $errors = validate();
    if (!empty($errors)) {
        return $errors;
    }

    $userId = $_SESSION['id'];
    $db = db();
    $wishId = insertWish($db, $_POST['myWish'], $_POST['memo'], $userId);
    if (!empty($wishId)) {
        header("location:http://localhost:8080/wish/detail.php?id=$wishId");
        exit;
    }
    die('システムエラー');
}

function validate(): array
{
    $errors = [];

    // 空かチェック
    if (empty(trim($_POST['myWish']))) {
        $errors[] = 'Wishを登録してください。';
    }
    return $errors;
}
