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
    // todo insertの戻り値を適切に修正する（詳細ページ作成時）
    $wish = insertWish($db, $_POST['myWish'], $_POST['memo'], $userId);
    if (!empty($wish)) {
        header('location:http://localhost:8080/index.php');
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
