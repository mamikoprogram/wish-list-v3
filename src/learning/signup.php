<?php

require_once "../include/const.php";
//変数を初期化
$name = '';
$email = '';
$password = '';

if (isset($_POST['email']) && isset($_POST['password'])) {
//    POSTの値を取得
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // データベース接続
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch
    (PDOException $e) {
        echo 'データベースに接続できませんでした。';
        exit;
    }

//        Usersテーブルに保存
    $sql = 'INSERT INTO users(name,email,password) VALUES(:NAME,:EMAIL,:PASSWORD)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':NAME', $name);
    $stmt->bindParam(':EMAIL', $email);
    $stmt->bindParam(':PASSWORD', $password);
    $stmt->execute();
    header('location: http://localhost:8080/login.php');
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
<form action="" method="POST">
    <label for="name">ニックネーム</label><br>
    <input type="text" name="name" id="name"><br>
    <label for="email">メールアドレス</label><br>
    <input type="email" name="email" id="email"><br>
    <!--    --><?php
    //    if ($error === 'blank'): ?>
    <!--        <p>メールアドレスを正しく入力してください。</p>-->
    <!--    --><?php
    //    endif; ?>
    <label for="password">パスワード</label><br>
    <input type="password" name="password" id="password"><br>
    <!--    --><?php
    //    if ($error === 'blank'): ?>
    <!--        <p>パスワードを正しく入力してください。</p>-->
    <!--    --><?php
    //    endif; ?>
    <input type="submit" value="ユーザー登録する">
</form>
</body>
</html>
