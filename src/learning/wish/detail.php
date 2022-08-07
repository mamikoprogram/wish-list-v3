<?php

require_once "../../include/initialize.php";

render('wish/detail', [
    'id' => $_GET['id'],
]);

//Wish詳細を取得
    $sql = "SELECT * FROM wishes WHERE  id = :ID";
try {
    $stmt = select($db, $sql, [':ID' => 'id']);
} catch (Exception $e) {
}
$detail = $stmt->fetch(PDO::FETCH_ASSOC);
?>






