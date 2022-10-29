<?php

element('header', ['title' => 'Detail Wish']);
?>
<?php
if (!empty($detail)): ?>
    <h2 class="item">My Wish:</h2>
    <p class="detail"><?php
        echo h($detail['subject']); ?></p><br>
    <h2 class="item">Memo:</h2>
    <p class="detail"><?php
        echo h($detail['memo']); ?></p><br>
<?php
endif; ?>
<a href="http://localhost:8080/index.php">Wish Listへ戻る</a>
<?php
element('footer'); ?>
