<?php

/**
 * @param PDO $db
 * @param string $subject
 * @param string $memo
 * @param int $userId
 * @return int|null
 */
function insertWish(PDO $db, string $subject, string $memo, int $userId): ?int
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
 * @param int $userId
 * @return array
 * @throws Exception
 */
function findWishByList(PDO $db, int $userId): array
{
    $sql = "SELECT * FROM wishes WHERE user_id = :id";
    $stmt = select($db, $sql, [':id' => $userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * @param PDO $db
 * @param int $id
 * @param int $userId
 * @return array
 * @throws Exception
 */
function getWishById(PDO $db, int $id, int $userId) :array
{
    $sql = 'SELECT * FROM wishes WHERE id = :ID AND user_id = :USER_ID';
    $stmt = select($db, $sql, [':ID' => $id, ':USER_ID' => $userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
