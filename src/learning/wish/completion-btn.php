<?php

require_once "../../include/initialize.php";

$db = db();

//完了機能の処理
$comNum = completionWishNum($db, $_GET['id'], $_SESSION['id']);
header('location:http://localhost:8080/index.php');
exit;
