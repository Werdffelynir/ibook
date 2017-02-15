<?php
/**
 * @var $page array
 * @var $links array
 */

//var_dump($page);

?><div id="preview">
    <div id="preview-title">
        <?= $page['title']?>
    </div>
    <div id="preview-text">
        <?= $page['text']?>
    </div>
    <div id="preview-links">
        <ul>
            <?php foreach($links as $link):?>
                <li>
                    <a href="?r=view&id=<?= $link['id']?>"><?= $link['title']?></a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>

