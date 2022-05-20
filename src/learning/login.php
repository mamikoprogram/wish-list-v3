<?php

require_once "../include/initialize.php";

//作業中
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validate();

    if (empty($errors)) {
        try {
            $dbh = db();
//            ユーザー認証
            $user = getUserByAuth($dbh, $_POST['email'], $_POST['password']);
            if (!empty($user)) {
                $_SESSION['id'] = $user['id'];
                header('location:http://localhost:8080/index.php');
                exit;
            }
            $errors[] = 'ログインできませんでした。';
        } catch (Exception$exception) {
            $errors[] = "ログインできませんでした。";
        }
    }
}

function validate(): array
{
    $errors = [];

    if ($_SESSION['token'] !== $_POST['token']) {
        $errors[] = 'トークンが正しくありません。';
    }

    //メールとパスワードが空かチェック
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $errors[] = 'メールアドレスかパスワードが正しくありません';
    }

    //メールとパスワードが空白かチェック
    if ($_POST['email'] === '' || $_POST['password'] === '') {
        $errors[] = 'メールアドレスかパスワードが正しくありません';
    }
    return $errors;
}

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $email = $_POST['email'];
//    $password = makeSecurePassword($_POST['password']);
//
//
//    //パスワードの文字数チェック（６文字以上１２文字以内）
//    $pw = mb_strlen($_POST['password']);
//    if ($pw < 6 || $pw > 12) {
//        $errors[] = 'メールアドレスかパスワードが正しくありません';
//    }
//
//    if ($errors === '') {
//        try {
//            // データベース接続
//            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
//            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//            //ユーザー登録の情報を呼び出す
//            $sql = "SELECT * FROM users WHERE email = :EMAIL and password = :PASSWORD";
//            $stmt = $dbh->prepare($sql);
//            $stmt->bindParam(':EMAIL', $email);
//            $stmt->bindParam(':PASSWORD', $password);
//            $stmt->execute();
//            $user = $stmt->fetch();
//            var_dump($user);
//
//            //条件が一致したらログイン
//            if ($_SESSION['token'] === $_POST['token']) {
//                if ($user['email'] === $email && $user['password'] === $password) {
//                    $_SESSION['email'] = $user['email'];
//                    $_SESSION['name'] = $user['name'];
//                    header('location: http://localhost:8080/index.php');
//                } else {
//                    echo "ログインできませんでした。";
//                }
//            }
//        } catch (PDOException $error) {
//            echo "ユーザー登録してください。";
//            exit;
//        }
//    }
//}

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
<?php
if (!empty($errors)):
    foreach ($errors as $error) {
        echo $error;
    }
endif; ?>

<form action="" method="POST">
    <label for="mail">メールアドレス</label><br>
    <input type="email" name="email" id="mail"><br>
    <label for="pass">パスワード<br>（６文字以上１２文字以内）</label><br>
    <input type="password" name="password" id="pass"><br>
    <input type="hidden" name="token" value="<?php
    echo $_SESSION['token']; ?>">
    <input type="submit" value="ログインする">
</form>
<a href="signup.php">新規ユーザー登録はこちら</a>
</body>
</html>
