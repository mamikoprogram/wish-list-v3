<?php

require_once "../../include/initialize.php";

$db = db();

//todo $userIdを入力する
$completion = completionWish($db, $_GET['id'], );


if (isset($completion)) {
    header('location:http://localhost:8080/index.php');
    exit;
}


// todo 作業中（userIdの値を取得する関数）
function getuserId (PDO $db, string $sql, int $id, int $userId) {
    $sql = "SELECT * FROM users WHERE 'id' = :id AND 'user_id' = :user_id";
    select($db,$sql,['id' => $_GET['id'], 'user_id' => $userId]);

    return
}
