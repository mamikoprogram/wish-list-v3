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
 * @throws Exception
 */
function findWishByList(PDO $db, int $id): array
{
    $sql = "select * from wishes where user_id = :id";
    $stmt = select($db, $sql, [':id' => $id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
