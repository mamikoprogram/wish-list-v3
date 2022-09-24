<?php
/**
 * @var array $errors
 */

?>

<?php
element('header', ['title' => 'New Wish']); ?>
<?php
element('error', ['errors' => $errors]);
?>
<form method="post" action="http://localhost:8080/wish/new.php">
    <h2 class="item">My Wish:</h2><br>
    <label>
        <input class="txt" type="text" name="myWish" placeholder="例）旅行に行く" maxlength="255">
    </label>
    <h2 class="item">Memo:</h2><br>
    <label for="memo"></label>
    <textarea name="memo" id="memo" cols="20" rows="10" placeholder="例）夏までに貯金して沖縄でリゾートホテルに泊まる"
              maxlength="255"></textarea><br>
    <input class="btn-style" type="submit" value="Wishを追加">
</form>
<a href="http://localhost:8080/index.php">Wish Listへ戻る</a>
<?php
element('footer'); ?>
