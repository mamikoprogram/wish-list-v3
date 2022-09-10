<?php

function db(): PDO
{
    $db = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $db;
}

/**
 * @throws Exception
 */
function select(PDO $db, string $sql, array $binds = []): PDOStatement
{
    $stmt = $db->prepare($sql);
    if (false === $stmt) {
        throw new Exception('sql error');
    }
    foreach ($binds as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    $stmt->execute();
    return $stmt;
}

/**
 * @param PDO $db
 * @param string $table
 * @param array $cols
 * @return int|null
 * todo 詳細画面作成実装後にリターン値を修正
 */

function insert(PDO $db, string $table, array $cols): ?int
{
    /*
    $cols = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
    ];
    */

    $values = [];
    foreach ($cols as $key => $value) {
        $values[] = ":{$key}";
    }
    /*
    $values = [
        :name,
        :email,
        :password,
    ];
    */

    $insertCols = implode(',', array_keys($cols));
    $insertValues = implode(',', $values);
    /*
     * $insertCols = name, email, password
     * $insertValues = :name, :email, :password
     */

    $sql = "INSERT INTO {$table} ({$insertCols}) values ({$insertValues})";
    /*
     * insert into users (name, email, password) values ('name', 'email', 'password');
     * insert into users (name, email, password) values (:name, :name, :password);
     */

//    print_r([
//        $keys,
//        $values,
//        $insertCols,
//        $insertValues,
//        $sql
//    ]);
//    die;

    $stmt = $db->prepare($sql);
    foreach ($cols as $key => $value) {
        $stmt->bindValue(':' . $key, $value);
    }

    if (!$stmt->execute()) {
        return null;
    }

    return (int)$db->lastInsertId();
}

//todo UPDATE直後に何行更新したかを取得する関数の作成
/**
 * @param PDO $db
 * @param string $table
 * @param array $cols
 * @return int|null
 */
function getRowNums(PDO $db, string $table, array $cols, int $id): ?int
{
    $values = [];
    foreach ($cols as $key => $value) {
        $values[] = ":{$key}";
    }
    $updateCols = implode(',', array_keys($cols));
    $updateValues = implode(',', $values);

//    todo idの値が渡せていないので修正
    $sql = "UPDATE {$table} SET {$updateCols} = {$updateValues} WHERE 'id' = :ID";
    $stmt = select($db, $sql, [':ID' => $id,]);
    $stmt = $db->prepare($sql);
    foreach ($cols as $key => $value) {
        $stmt->bindValue(':' . $key, $value);
    }

    if (!$stmt->execute()) {
        return null;
    }
    return $stmt->rowCount();
}
