<?php

require_once "../include/initialize.php";

$name = '';
$email = '';
$password = '';
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validate();
    if (empty($erroes)) {
        $db = db();

        $insert = insertUser($db, $_POST['name'], $_POST['email'], makeSecurePassword($_POST['password']));
        if ($insert === false) {
            return;
        }
        header('location: http://localhost:8080/login.php');
    }
}

function validate(): array
{
    $errors = [];

    //メールとパスワードが空かチェック
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $errors[] = 'メールアドレスとパスワードを入力してください';
    }

    //メールとパスワードが空白かチェック
    if ($_POST['email'] === '' || $_POST['password'] === '') {
        $errors[] = 'メールアドレスとパスワードを入力してください';
    }

    //メールの形式になっているかチェック
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($email === '') {
        $errors[] = 'メールアドレスを正しく入力してください';
    }

    //パスワードの文字数チェック（６文字以上１２文字以内）
    $pw = mb_strlen($_POST['password']);
    if ($pw < 6 || $pw > 12) {
        $errors[] = 'パスワードは６文字以上１２文字以内で入力してください';
    }
    return $errors;
}

?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wish List ユーザー登録画面</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Wish List</h1>
<h2>ユーザー登録</h2>
<?php
if (!empty($errorList)): ?>
    <?php
    foreach ($errorList as $error): ?>
        <?php
        echo $error; ?>
        <br>
    <?php
    endforeach; ?>
<?php
endif; ?>
<form action="" method="POST">
    <label for="name">ニックネーム</label><br>
    <input type="text" name="name" id="name"><br>
    <label for="email">メールアドレス</label><br>
    <input type="email" name="email" id="email"><br>
    <label for="password">パスワード<br>（６文字以上１２文字以内）</label><br>
    <input type="password" name="password" id="password"><br>
    <input type="submit" value="ユーザー登録する">
</form>
<a href="login.php">ログイン画面に戻る</a>
</body>
</html>
