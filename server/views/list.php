<?php
/**
 * @var $pages array
 */

?>

<ul class="pagelist">
    <?php foreach ($pages as $page): ?>
        <li title="<?= $page['text']?>"> <?= $page['title']?>
            <a class="" href="?r=view&id=<?= $page['id']?>">view</a>
            <a class="" href="?r=edit&id=<?= $page['id']?>">edit</a>
        </li>
    <?php endforeach; ?>
</ul>
