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
function getWishById(PDO $db, int $id, int $userId): array
{
    $sql = 'SELECT * FROM wishes WHERE id = :id AND user_id = :user_id';
    $stmt = select($db, $sql, [':id' => $id, ':user_id' => $userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * @param PDO $db
 * @param $subject
 * @param $memo
 * @param int $id
 * @param int $userId
 * @return int|null
 * @throws Exception todo 要エラー修正
 */
function updateWish(PDO $db, $subject, $memo, int $id, int $userId): ?int
{
    $sql = "UPDATE wishes SET subject=:subject, memo=:memo WHERE id = :id AND user_id = :user_id";
    select($db, $sql, [':subject' => $subject, ':memo' => $memo]);
    var_dump($sql);
    return update($db, $sql, [':id' => $id, ':user_id' => $userId]);
}
