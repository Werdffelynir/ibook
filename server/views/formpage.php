<?php
/**
 * @var $page array
 * @var $pages array
 * @var $links array
 */

// ["id", "title", "text", "group", "note", "links"]

$show_links = [];
if (is_array($links)) {
    $links_ids = array_map(function ($item) {return $item['id'];}, $links);
    foreach ($pages as $ps){
        if (!in_array($ps['id'], $links_ids))
            array_push($show_links, $ps);
    }
}




?>

<div id="formpage">

    <div class="formpage-buttons table">
        <div>
            <button>New page</button>
            <button>Delete page</button>
        </div>
        <div class="text_right">
            <button>Save page</button>
        </div>
    </div>

    <div>
        <span class="error hide">error message</span>
    </div>

    <div class="form-line">
        title <br>
        <input type="text" name="title">
    </div>

    <div class="form-line">
        <div>
            <button id="fp-box-open">Routs paths</button>
            <div id="fp-box" style="display: none">
                <ul>
                    <?php foreach($show_links as $slink):?>
                    <li>
                        <div><?= $slink['title']?></div>
                        <div><?= $slink['text']?></div>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
        <div class="fp-items-list">
            <?php foreach($links as $link):?>
                <div class="fp-item">
                    <div class="fp-item-title"><?= $link['title']?></div>
                    <div class="fp-item-info" style="display: none">
                        <div><?= $link['title']?></div>
                        <div><span>remove</span></div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>

    <div class="form-line">
        text <br>
        <textarea name="text"></textarea>
    </div>

    <div>
        <input type="text" name="id" value="{id}" hidden="hidden">
        <input type="text" name="links" value="{links}" hidden="hidden">
    </div>
</div>

<script>
    (function () {
        NsApp.queryAll('.fp-item-title').map(function(item){
            item.onclick = function (event) {
                var elem =  event.target.nextElementSibling;
                if (elem.style.display == 'none') elem.style.display = 'block';
                else
                    elem.style.display = 'none';
            };
        });
        NsApp.query('#fp-box-open').onclick = function (event) {
            var elem =  event.target.nextElementSibling;
            if (elem.style.display == 'none') elem.style.display = 'block';
            else
                elem.style.display = 'none';
        };



    })();
</script>