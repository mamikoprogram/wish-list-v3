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
    echo getUserInfo($user); ?></p>
<a href="http://localhost:8080/new-wish.php">Wishを追加する</a>
<table>
    <thead>
    <tr>
        <th>My Wish</th>
        <th>Memo</th>
        <th></th>
        <th></th>
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
        </tr>
    <?php
    endforeach; ?>
    </tbody>
</table>
<?php element('footer'); ?>
