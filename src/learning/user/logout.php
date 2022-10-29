<?php
require_once "../../include/initialize.php";

killSession();

element('header', ['title' => 'ログアウト完了',]);
?>
<a href="http://localhost:8080/user/login.php">ログイン画面へ戻る</a>
<?php
element('footer'); ?>
