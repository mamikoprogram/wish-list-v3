<?php

require_once "../../include/initialize.php";

$db = db();

//達成したWishを見る処理
$wishes = findWishByList($db, $_SESSION['id'], !empty($_GET['completion']));
render('wish/list', [
    'wishes' => $wishes
]);
