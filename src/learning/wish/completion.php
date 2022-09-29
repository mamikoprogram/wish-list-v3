<?php

require_once "../../include/initialize.php";

$db = db();
$completion = completionWish($db, $_GET['id'], $_SESSION['id']);


if (empty($completion)) {
    echo 'sqlエラー';
}

header('location:http://localhost:8080/index.php');
exit;

/**
 * @param PDO $db
 * @param int $id
 * @param int $userId
 * @return int|null
 * @throws Exception
 */
function completionWish(PDO $db, int $id, int $userId): ?int
{
    $sql = "UPDATE wishes SET completion = :completion WHERE id = :id AND user_id = :user_id";
    return update($db, $sql, ['completion' => 1, 'id' => $id, 'user_id' => $userId]);
}
