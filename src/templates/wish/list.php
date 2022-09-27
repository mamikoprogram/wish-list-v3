<?php
/**
 * @var array $wishes
 * @var array $user
 */

?>

<?php
element('header', ['title' => 'Wish List']);
?>
<p>こんにちは<?php
    echo escapeUserInfo($user); ?></p>
<a class="btn-style" href="http://localhost:8080/wish/new.php">Wishを追加する</a>
<table>
    <thead>
    <tr>
        <th>My Wish</th>
        <th>Memo</th>
        <th>detail</th>
        <th>edit</th>
        <th>completion</th>
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
            <td><a class="btn-style" href="http://localhost:8080/wish/edit.php?id=<?php
                echo $wish['id']; ?>">編集</a></td>
            <td><a class="btn-style" href="http://localhost:8080/wish/completion.php?id=<?php
                echo $wish['id']; ?>">完了</a></td>
        </tr>
    <?php
    endforeach; ?>
    </tbody>
</table>
<?php
element('footer'); ?>
