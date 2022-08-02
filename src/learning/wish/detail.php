<?php
require_once "../../include/initialize.php";

render('wish/detail', [
    'id' => $_GET['id'],
]);
var_dump($_GET['id']);
?>

<!--todo select修正して使う？-->
