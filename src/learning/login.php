<?php

require_once "../include/const.php";
session_start();
//変数を初期化
$error = '';
$email = '';
$password = '';

//POSTの値を受け取る
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_INT);

//    if ($email !== '' && $password !== '') {
if (!empty($email && $password)) {
    try {
        // データベース接続
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        //ユーザー登録されているか確認
        $sql = "SELECT * FROM users WHERE email = :email and password = :password";
        $stmt = $dbh->prepare($sql);
//            $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user['email'] == $email && $user['password'] == $password) {
            $_SESSION['email'] = $email;
            header('location: http://localhost:8080/index.php');
        }
    } catch (PDOException $error) {
        echo $error;
        exit;
    }
}

?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wish List ログイン画面</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Wish List</h1>
<h2>ログイン</h2>
<form action="" method="POST">
    <label for="mail">メールアドレス</label><br>
    <input type="text" name="email" id="mail"><br>
    <!--    入力不備でエラー表示する-->
    <!--    --><?php
    //    if ($error['login'] === 'blank'): ?>
    <!--        <p class="error">メールアドレスとパスワードを入力してください。</p>-->
    <!--    --><?php
    //    endif; ?>
    <!--    <p class="error">ログインできません。正しく入力してください。</p>-->
    <label for="pass">パスワード</label><br>
    <input type="password" name="password" id="pass"><br>
    <input type="submit" value="ログインする">
</form>
<a href="signup.php">新規ユーザー登録はこちら</a>
</body>
</html>
