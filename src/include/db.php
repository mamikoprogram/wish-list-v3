<?php

/**
 * @return PDO
 */
function db(): PDO
{
    $db = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $db;
}

/**
 * @param  PDO  $db
 * @param  string  $sql
 * @param  array  $binds
 *
 * @return PDOStatement
 * @throws Exception
 */
function select(PDO $db, string $sql, array $binds = []): PDOStatement
{
    $stmt = $db->prepare($sql);
    if (false === $stmt) {
        throw new Exception('sql error');
    }
    foreach ($binds as $key => $value) {
        $stmt->bindParam($key, $value);
    }
    $stmt->execute();

    return $stmt;
}
