<?php

function db(): PDO
{
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $dbh;
}

//作業中 この関数の使い方はもう少し理解を深める必要あり

function select(PDO $dbh, string $sql, array $binds = []): PDOStatement
{
    $stmt = $dbh->prepare($sql);
    if (false === $stmt) {
        throw new Exception('sql error');
    }
//    foreach ()の$bindsの中身確認
    foreach ($binds as $key => $value) {
        $stmt->bindParam($key, $value);
    }
    $stmt->execute();
    return $stmt;
}
