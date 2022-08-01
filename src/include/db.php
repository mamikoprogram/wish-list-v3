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
 * @return bool
 */
function insert(PDO $db, string $table, array $cols): bool
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

    return $stmt->execute();
}
