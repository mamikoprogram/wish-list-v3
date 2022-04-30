<?php

/**
 * @param  PDO  $db
 * @param  string  $email
 * @param  string  $password
 *
 * @return bool|array
 * @throws Exception
 */
function getUserByAuth(PDO $db, string $email, string $password): bool|array
{
    //ユーザー登録の情報を呼び出す
    $sql = "SELECT * FROM users WHERE email = :EMAIL";
    $stmt = select($db, $sql, [
        ':EMAIL' => $email,
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (false === $user) {
        return false;
    }
    if (makeSecurePassword($password) !== $user['password']) {
        return false;
    }
    return $user;
}

/**
 * @param  PDO  $db
 * @param  ?int  $id
 *
 * @return array
 * @throws Exception
 */
function getUserById(PDO $db, ?int $id): array
{
    if (empty($id)) {
        return [];
    }

    //ユーザー登録の情報を呼び出す
    $sql = "SELECT * FROM users WHERE id = :ID";
    $stmt = select($db, $sql, [
        ':ID' => $id,
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return (empty($user) ? [] : $user);
}
