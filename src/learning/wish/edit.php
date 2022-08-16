<?php

require_once "../../include/initialize.php";

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    return null;
}
//todo 編集機能作業中
try {
    $db = db();
    $row = getWishById($db, $_GET['id'], $_SESSION['id']);
} catch (Exception $e) {
}

render('wish/edit', ['row' => $row]);


//    try {
//        //GETのidを取得
//        $id = $_GET['id'];
//
////    編集画面に内容を表示する
//        $sql = "SELECT * FROM learning_php.wishes WHERE id = :id";
//        $stmt = $dbh->prepare($sql);
//        $stmt->bindParam('id', $id);
//        $stmt->fetchAll(PDO::FETCH_ASSOC);
//        $stmt->execute();
//    } catch (PDOException $e) {
//        echo $e->getMessage();
//        exit();
//    }
//}
//
//if ($_SERVER['REQUEST_METHOD'] != 'GET') {
//    if (!empty($_POST['myWish'])) {
//        $id = $_POST['id'];
//        $myWish = $_POST['myWish'];
//        $memo = $_POST['memo'];
//
////        編集内容を更新する処理
//        $sql = 'UPDATE wishes SET my_wish = :MY_WISH, memo = :MEMO WHERE id = :id';
//        $stmt = $dbh->prepare($sql);
//        $stmt->bindParam('id', $id);
//        $stmt->bindParam('MY_WISH', $myWish);
//        $stmt->bindParam('MEMO', $memo);
//        $stmt->execute();
//        header("Location: index.php");
//    } else {
//        echo '更新できませんでした。My Wishを入力してください。';
//        exit;
//    }
//}

