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

/**
 * @param PDO $db
 * @param int $id
 * @return array
 */
function findWishByList(PDO $db, int $id): array
{
    // todo SQLセキュリティ対策必要
    $sql = "select * from wishes where $id = user_id";
    $stmt = $db->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
