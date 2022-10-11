<?php

require_once "../../include/initialize.php";


$db = db();
$comWishes = completionWish($db, $_SESSION['id']);
render('wish/completion', ['comWishes' => $comWishes]);


//todo 作業中
//if ($_SERVER['REQUEST_METHOD'] !== '') {
//    return null;
//}
$comNum = completionWishNum($db, $_GET['id'], $_SESSION['id']);

if (is_null($comNum)) {
}

//　todo 完了機能更新されない場合NULLが返るから達成一覧の画面でエラー文が消えない

header('location:http://localhost:8080/index.php');
exit;


//todo  作業中
/**
 * @param PDO $db
 * @param int $userId
 * @return array
 * @throws Exception
 */
function completionWish(PDO $db, int $userId): array
{
    $sql = "SELECT * FROM wishes WHERE user_id = :id AND completion = :completion";
    $stmt = select($db, $sql, [':id' => $userId, ':completion' => 1]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
