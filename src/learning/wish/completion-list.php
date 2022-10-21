<?php

require_once "../../include/initialize.php";

$db = db();

//達成したWishを見る処理
$Wishes = completionWish($db, $_SESSION['id']);
render('wish/list', [
    'Wishes' => $Wishes,
]);
