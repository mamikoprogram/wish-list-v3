<?php
/**
 * @var array $wishes
 * @var array $user
 */

?>
<?php
element('header', ['title' => 'Wish List']); ?>
<?php
if (empty($_GET['completion'])): ?>
    <p>こんにちは<?php
        echo escapeUserInfo($user); ?></p>
    <a class="btn-style" href="http://localhost:8080/wish/new.php">Wishを追加する</a>
    <a class="btn-style" href="http://localhost:8080/index.php?completion=1">達成したWishを見る</a>
<?php
else: ?>
    <h2>Best wishes</h2>
<?php
endif; ?>
<table>
    <thead>
    <tr>
        <th>My Wish</th>
        <th>Memo</th>
        <th>detail</th>
        <?php
        if (empty($_GET['completion'])): ?>
            <th>edit</th>
            <th>completion</th>
        <?php
        endif; ?>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach (
        $wishes
        as $wish
    ): ?>
        <tr>
            <td><?php
                echo h(mb_substr($wish['subject'], 0, 10)); ?></td>
            <td><?php
                echo h(mb_substr($wish['memo'], 0, 10)); ?></td>
            <td><a class="btn-style" href="http://localhost:8080/wish/detail.php?id=<?php
                echo $wish['id']; ?>">詳細</a></td>
            <?php
            if (empty($_GET['completion'])): ?>
                <td><a class="btn-style" href="http://localhost:8080/wish/edit.php?id=<?php
                    echo $wish['id']; ?>">編集</a></td>
                <td><a class="btn-style" href="http://localhost:8080/wish/completion-btn.php?id=<?php
                    echo $wish['id']; ?>">完了</a></td>
            <?php
            endif; ?>
        </tr>
    <?php
    endforeach; ?>
    </tbody>
</table>
<?php
if (!empty($_GET['completion'])): ?>
    <a href="http://localhost:8080/index.php">Wish Listへ戻る</a>
<?php
else: ?>
<a href="http://localhost:8080/user/logout.php">ログアウト</a>
<?php endif; ?>
<?php
element('footer'); ?>
