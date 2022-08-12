<?php

require_once "../../include/initialize.php";

//Wish詳細を取得
$id = $_GET['id'];
$db = db();
$sql = 'SELECT * FROM wishes WHERE id = :ID';
$stmt = select($db, $sql, [':ID' => $id,]);
$detail = $stmt->fetch(PDO::FETCH_ASSOC);

render('wish/detail', [
    'id' => $_GET['id'],
    'detail' => $detail,
]);
