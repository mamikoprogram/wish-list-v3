<?php

element('header', ['title' => 'Edit Wish']); ?>
<form method="post" action="http://localhost:8080/wish/edit.php?id=<?php
echo $row['id']; ?>>">
    <h2 class="item">My Wish:</h2><br>
    <label>
        <input class="txt" type="text" name="subject" maxlength="255" value="<?php
        echo h($row['subject']); ?>">
    </label>
    <h2 class="item">Memo:</h2><br>
    <label for="memo">
    <textarea name="memo" id="memo" cols="20" rows="10"
              maxlength="255"><?php
        echo h($row['memo']); ?></textarea>
    </label><br>
    <input type="hidden" name="id" value="<?php
    echo $row['id']; ?>">
    <input class=" btn-style" type="submit" value="更新">
</form>
<a href="http://localhost:8080/index.php">Wish Listへ戻る</a>
<?php
element('footer'); ?>
