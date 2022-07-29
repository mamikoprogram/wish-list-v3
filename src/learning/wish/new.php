<?php

require_once "../../include/initialize.php";

$errors = register();
render('wish/new', [
    'errors' => $errors
]);

function register(): ?array
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
