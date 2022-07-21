<?php

require_once "../include/initialize.php";

function insertWish(PDO $db, string $subject, string $memo, int $userId): bool
{
    $cols = [
        'subject' => $subject,
        'memo' => $memo,
        'user_id' => $userId,
    ];
    return insert($db, 'wishes', $cols);
}

// todo 一覧表示はユーザー毎に行う（作業中）
function findWishByList(PDO $db): array
{
    $sql = 'select * from wishes where $id = user_id';
    $stmt = $db->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
