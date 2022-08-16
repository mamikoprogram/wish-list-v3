<?php
/**
 * @var array $errors
 */

?>
<!--todo 編集に修正-->
<?php
element('header', ['title' => 'Edit Wish']); ?>
<?php
//element('error', ['errors' => $errors]);
//?>

<!--todo memoが上手く表示されない（取得はできている）-->
<form method="post" action="http://localhost:8080/wish/edit.php">
    <h2 class="item">My Wish:</h2><br>
    <label>
        <input class="txt" type="text" name="myWish" maxlength="255" value="<?php
        echo $row['subject']; ?>">
    </label>
    <h2 class="item">Memo:</h2><br>
    <label for="memo">
    <textarea name="memo" id="memo" cols="20" rows="10"
              maxlength="255" <?php
    echo $row['memo']; ?>></textarea>
    </label><br>
    <input class=" btn-style" type="submit" value="更新">
</form>
<a href="http://localhost:8080/index.php">Wish Listへ戻る</a>
<?php
var_dump($row) ?>
<?php
element('footer'); ?>
