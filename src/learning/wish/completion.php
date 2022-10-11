<?php

require_once "../../include/initialize.php";

$db = db();

//達成したWishを見る処理
$comWishes = completionWish($db, $_SESSION['id']);
render('wish/completion', [
    'comWishes' => $comWishes,
    'id' => $_GET['id']
]);

//完了機能の処理
$comNum = completionWishNum($db, $_GET['id'], $_SESSION['id']);
header('location:http://localhost:8080/index.php');
exit;

//　todo 完了機能更新されない場合NULLが返るから達成一覧の画面でエラー文が消えない
