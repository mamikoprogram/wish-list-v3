<?php

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
<form action="signup-check.php" method="post">
    <label for="name">ニックネーム</label><br>
    <input type="text" name="name" id="name"><br>
    <label for="email">メールアドレス</label><br>
    <input type="email" name="email" id="email"><br>
    <label for="pass">パスワード</label><br>
    <input type="password" name="pass" id="pass"><br>
    <input type="submit" value="確認画面へ進む">
</form>

</body>
</html>
