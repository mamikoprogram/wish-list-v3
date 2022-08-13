<?php

element('header', ['title' => 'Detail Wish']);
?>
<?php
if (!empty($detail)): ?>
    <h2>My Wish</h2>
    <p class="detail"><?php
        echo h($detail['subject']); ?></p><br>
    <h2>Memo</h2>
    <p class="detail"><?php
        echo h($detail['memo']); ?></p><br>
<?php
endif; ?>
<a href="http://localhost:8080/index.php">Wish Listへ戻る</a>
