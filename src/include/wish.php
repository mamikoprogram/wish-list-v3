<?php

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
