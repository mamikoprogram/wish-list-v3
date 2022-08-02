<?php

element('header', ['title' => 'Detail Wish']);
?>
<?php
//todo if文の中身修正　対象のWishを取得する
if ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
    <p class="detail"><?php
        echo $row['subject']; ?></p><br>
    <h2>Memo</h2>
    <p class="detail"><?php
        echo $row['memo']; ?></p><br>
    <?php endif; ?>
<a href="http://localhost:8080/wish/index.php" class="btn-style">もどる</a>

