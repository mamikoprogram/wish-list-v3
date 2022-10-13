<?php

/**
 * @var array $comWishes
 */

element('header', ['title' => 'Completion Wish']); ?>

<table>
    <thead>
    <tr>
        <th>My Wish</th>
        <th>Memo</th>
        <th>detail</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach (
        $comWishes
        as $comWish
    ): ?>
        <tr>
            <td><?php
                echo h(mb_substr($comWish['subject'], 0, 10)); ?></td>
            <td><?php
                echo h(mb_substr($comWish['memo'], 0, 10)); ?></td>
            <td><a class="btn-style" href="http://localhost:8080/wish/detail.php?id=<?php
                echo $comWish['id']; ?>">詳細</a></td>
        </tr>
    <?php
    endforeach; ?>
    </tbody>
</table>
<a href="http://localhost:8080/index.php">Wish Listへ戻る</a>
<?php
element('footer'); ?>
