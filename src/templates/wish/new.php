<?php
/**
 * @var array $errors
 */

?>

<?php
element('header', ['title' => 'New Wish']); ?>
<?php
element('error', $errors); ?>
    <form method="post" action="new-wish.php">
        <span class="item">My Wish:</span><br>
        <label>
            <input type="text" name="myWish" placeholder="例）旅行に行く" maxlength="255">
        </label>
        <span class="item">Memo:</span><br>
        <label for="memo"></label>
        <textarea name="memo" id="memo" cols="20" rows="10" placeholder="例）夏までに貯金して沖縄でリゾートホテルに泊まる"
                  maxlength="255"></textarea><br>
        <input type="submit" value="Wishを追加">
    </form>
<?php
element('footer'); ?>
