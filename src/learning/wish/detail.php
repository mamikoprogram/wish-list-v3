<?php

require_once "../../include/initialize.php";

//todo コントローラーに条件指定する
//todo 必要であれば関数化する

//Wish詳細を取得
$id = $_GET['id'];
$db = db();
$userId = $_SESSION['id'];
$sql = 'SELECT * FROM wishes WHERE id = :ID AND user_id = :USER_ID';
$stmt = select($db, $sql, [':ID' => $id, ':USER_ID' => $userId]);
$detail = $stmt->fetch(PDO::FETCH_ASSOC);

render('wish/detail', [
    'id' => $_GET['id'],
    'detail' => $detail,
]);
