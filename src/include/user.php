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
//    $userが空なら配列を初期化する　該当なければ$user
//    を返す
}

//作業中
function insertUser($db, $_POST['name'], $_POST['email'], $_POST['password']) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = makeSecurePassword($_POST['password']);

    $stmt = getUserByAuth($email);
    if ($stmt === false) {
        $db = db();
        $cols = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ];
        $stmt = insert($db, 'users', $cols);
        return $stmt;
    }
//    POSTの値を代入して
//    DB接続
//    insert関数使って登録
}
