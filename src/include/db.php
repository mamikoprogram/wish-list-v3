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
        $stmt->bindParam($key, $value);
    }
    $stmt->execute();
    return $stmt;
}

//作業中（混乱中）
function insert(PDO $db, string $name, string $email, string $password)
{
    $sql = 'INSERT INTO users(name,email,password) VALUES(:NAME,:EMAIL,:PASSWORD)';
    $stmt = $db->prepare($sql);

    $ = select($db,[':NAME' => $name, ':EMAIL' => $email, ':PASSWORD' => $password]);

    $stmt->execute();
}
