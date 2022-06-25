<?php

require_once "../include/initialize.php";


$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = validate();

    if (empty($errors)) {
//        作業中
//        ユーザーidを変数に代入
//        変数ユーザーidを引数に渡す
        $userId =
        $db = db();
        return insertWish($db, $_POST['myWish'], $_POST['memo'], $userId);
    }
    echo implode(",", $errors);
}

function validate(): array
{
    $errors = [];

//    if ($_SESSION['token'] !== $_POST['token']) {
//        $errors[] = 'トークンが不適切です。';
//    }

    //空かチェック
    if (empty($_POST['myWish'])) {
        $errors[] = 'Wishを登録してください。';
    }

    //空白かチェック
    if ($_POST['myWish'] === 'Wishを登録してください') {
        $errors[] = '';
    }
    return $errors;
}

/**
 * @param PDO $db
 * @param string $myWish
 * @param string $memo
 * @param int $userId
 * @return bool
 */
function insertWish(PDO $db, string $myWish, string $memo, int $userId): bool
{
    $cols = [
        'my_wish' => $myWish,
        'memo' => $memo,
        'user_id' => $userId,
    ];
    return insert($db, 'wishes', $cols);
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Wish</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>New Wish</h1>
<form method="POST" action="new-wish.php">
    <span class="item">My Wish:</span><br>
    <label>
        <input type="text" class="txt" name="myWish" placeholder="例）旅行に行く">
    </label>
    <span class="item">Memo:</span><br>
    <label for="memo"></label><textarea name="memo" id="memo" cols="20" rows="10"
                                        placeholder="例）夏までに貯金して沖縄でリゾートホテルに泊まる "></textarea>
    <br>
    <input class="btn-style" type="submit" value="Wishを追加">
</form>
</body>
</html>
