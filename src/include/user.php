<?php

/**
 * @param PDO $db
 * @param string $email
 * @param string $password
 * @return bool|array
 * @throws Exception
 */

function getUserByAuth(PDO $db, string $email, string $password): bool|array
{
//ユーザー登録の情報の呼び出し
    $sql = "SELECT * FROM users WHERE email = :EMAIL";
    $stmt = select($db, $sql, [':EMAIL' => $email,]);

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
 * @param PDO $db
 * @param int|null $id
 * @return array
 */
function getUserById(PDO $db, ?int $id): array
{
    if (empty($id)) {
        return [];
    }
    //ユーザー登録の情報の呼び出し
    $sql = "SELECT * FROM users WHERE id = :ID";
    try {
        $stmt = select($db, $sql, [':ID' => $id,]);
    } catch (Exception) {
    }

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return (empty($user) ? [] : $user);
}

/**
 * @param PDO $db
 * @param string|null $name
 * @param string $email
 * @param string $password
 * @return int|null
 */
function insertUser(PDO $db, ?string $name, string $email, string $password): ?int
{
    $cols = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
    ];
    return insert($db, 'users', $cols);
}

/**
 * @return void
 */
function killSession(): void
{
    $_SESSION = [];
    session_destroy();
}
