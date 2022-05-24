<?php


/**
 * @param PDO $dbh
 * @param string $email
 * @param string $password
 * @return bool|array
 * @throws Exception
 */

function getUserByAuth(PDO $dbh, string $email, string $password): bool|array
{
//ユーザー登録の情報の呼び出し
    $sql = "SELECT * FROM users WHERE email = :EMAIL";
    $stmt = select($dbh, $sql, [':EMAIL' => $email,]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (false === $user) {
        return false;
    }
    if (makeSecurePassword($password) !== $user['password']) {
        return false;
    }
    return $user;
}

function getUserById(PDO $dbh, ?int $id): array
{
    if (empty($id)) {
        return [];
    }
    //ユーザー登録の情報の呼び出し
    $sql = "SELECT * FROM users WHERE id = :ID";
    try {
        $stmt = select($dbh, $sql, [':ID' => $id,]);
    } catch (Exception) {
    }

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return (empty($user) ? [] : $user);
//    $userが空なら配列を初期化する　該当なければ$user
//    を返す
}
