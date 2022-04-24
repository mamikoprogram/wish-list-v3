<?php

require_once "../include/const.php";

//変数を初期化
$name = '';
$email = '';
$password = '';
//！配列でやったほうがいいのか悩み中
$error = '';

if ($_SERVER['REQUEST_METHOD'] === $_POST) {
//メールとパスワードが空かチェック
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = " blank";
    }

//メールとパスワードが空白かチェック
    if ($_POST['email'] === '' || $_POST['password'] === '') {
        $error = "blank";
    }

//メールの形式になっているかチェック
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($email === '') {
        $error = "blank";
    }

//パスワードの文字数チェック（６文字以上１２文字以内）
    $pw = mb_strlen($_POST['password']);
    if ($pw < 6 || $pw > 12) {
        $error = "pass";
    }

//    ！条件式がおかしいので修正予定
//チェックがOKならユーザー登録する
    if (empty($error)) {
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
        $sql = 'INSERT INTO users(name,email,password) VALUES(:NAME,:EMAIL,:PASSWORD)';
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':NAME', $name);
        $stmt->bindParam(':EMAIL', $email);
        $stmt->bindParam(':PASSWORD', $password);
        $stmt->execute();
        header('location: http://localhost:8080/login.php');
    } else {
        echo "メールアドレスとパスワードを入力してください";
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
    <title>Wish List ユーザー登録画面</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Wish List</h1>
<h2>ユーザー登録</h2>
<!--！エラーメッセージの表示の作業中-->
<?php
//if (!empty($error)): ?>
<!--    --><?php
//    echo $error; ?>
<?php
//endif; ?>
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
