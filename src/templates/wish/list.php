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
<a href="http://localhost:8080/wish/new.php">Wishを追加する</a>
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
<!--            todo wishのidを渡す-->
            <td><a href="http://localhost:8080/wish/detail.php?id=<?php echo $wish['id']; ?>"><?php
                echo h(mb_substr($wish['subject'], 0, 10)); ?></a></td>
            <td><?php
                echo h(mb_substr($wish['memo'], 0, 10)); ?></td>
        </tr>
    <?php
    endforeach; ?>
    </tbody>
</table>
<?php element('footer'); ?>
