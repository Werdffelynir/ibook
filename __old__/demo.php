<?php
include 'server/libs/SPDO.php';
include 'server/libs/SLayout.php';

$url = '/interactive_book/demo.php';


function item_by_attr ($arr, $key, $value) {
    for ($i = 0; $i < count($arr); $i ++) {
        if (isset ($arr[$i][$key]) && $arr[$i][$key] == $value) {
            return $arr[$i];
        }
    }
    return false;
}

function post ($key = false, $default = false) {
    if ($key) return isset($_POST[$key]) ? $_POST[$key] : ($default ? $default : false);
    else
        return $_POST;
};

function get ($key = false, $default = false) {
    if ($key) return isset($_GET[$key]) ? $_GET[$key] : ($default ? $default : false);
    else
        return $_GET;
};

function db () {
    static $db;
    if ($db === null)
        $db = new SPDO('sqlite:' . 'server/database/db.sqlite');
    return $db;
};

function db_get_pages () {
    $pages = db()->select('*', 'page');
    return $pages;
};

function db_get_links () {
    $pages = db()->select('*', 'link');
    return $pages;
};

function db_insert_page ($data) {
    $last_id = db()->insert('page', [
        'title' => $data['title'],
        'text'  => $data['content'],
        //'group' => isset($data['group']) ? $data['group'] : 0,
    ]);
    return $last_id;
};

function db_update_page ($data) {
    $last_id = db()->update('page', [
        'title' => $data['title'],
        'text'  => $data['content']
    ], 'id = ?', [$data['id']]);
    return $last_id ? $data['id'] : false;
}

if (isset($_POST['mode'])) {
    $mode = post('mode');
    $result = ['mode' => $mode];

    if ($mode == 'get'){
        $result['pages'] = db_get_pages();
        $result['links'] = db_get_links();
    }

    if ($mode == 'insert-update') {
        if (is_numeric(post('id')))
            $mode = 'update';
        else
            $mode = 'insert';
    }

    if ($mode == 'insert') {
        $result['insert_id'] = db_insert_page(post());
    }

    if ($mode == 'update') {
        $result['update_id'] = db_update_page(post());
    }

    $result['sqlerror-info'] =  db()->errorInfo();
    $result['sqlerror-code'] =  db()->errorCode();
    $result['errors'] =  db()->getError();

    exit(json_encode($result));
}



if (!empty(get('goto'))) {
    $goto = get('goto');
    $book = new InteractiveBook();
    $data_page = $book->page($goto);
    $data_links = $book->links($goto);

    if ($data_page) {

    }
}



class InteractiveBook {

    static private $db;

    public function __construct()
    {
        self::$db = new SPDO('sqlite:' . 'server/database/db.sqlite');
    }

    public function page($id = 1)
    {
        $pages = self::$db->select('*', 'page', 'id = ?', [$id]);
        if (!empty($pages))
            return $pages[0];
    }

    public function links($id = 1)
    {
        $links_from = self::$db->select('*', 'link', 'page_id_from = ?', [$id]);
        $links_to = self::$db->select('*', 'link', 'page_id_to = ?', [$id]);
        return [
            'from' => $links_from,
            'to' => $links_to,
        ];
    }
}

/*
$page_id = get('goto', 1) ;
$book = new InteractiveBook();
$bookData = [
    'data' => $book->page($page_id),
    'reflection' => $book->reflection($page_id)
];*/
















?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/demo.css">

    <script data-init="js/demo.js" src="js/namespaceapplication.js"></script>

</head>
<body>

<div id="page" class="table">

    <div id="box-list">
        <div id="box-list-head" class="box-title">Pages</div>
        <div id="box-list-content"></div>
    </div>

    <div id="box-form">
        <div id="box-form-head" class="box-title">Editor</div>
        <div id="box-form-content"></div>
    </div>

    <div id="box-view">
        <div id="box-view-head" class="box-title">View</div>
        <div id="box-view-content">
            <div class="view-title"></div>
            <div class="view-text"></div>

            <div class="view-reflections">

                <div class="editbox table">

                    <div class="editbox-list valign_top">
                        <ul>
                            <li data-id="">edit item</li>
                            <li data-id="">edit item</li>
                            <li data-id="">edit item</li>
                        </ul>
                    </div>
                    <div class="editbox-form valign_top">
                        <div>
                            <span>text</span>
                            <span><input type="text"></span></div>
                        <div>
                            <span>text</span>
                            <span><input type="text"></span></div>
                        <div>
                            <span>text</span>
                            <span><input type="text"></span></div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>




<div id="templates" class="hide">
    <div id="form">
        <form>
            <div>
                <input type="submit" name="exec" value="Save">
                &nbsp;
                <input type="button" id="button-new" value="New page" class="hide">
                <input type="button" id="button-remove" value="Remove" class="hide">
            </div>
            <div>
                <div>Group</div>
                <div>
                    <select name="group">
                        <option>Inertaimant</option>
                        <option>orange</option>
                        <option>apple</option>
                        <option>space-around</option>
                        <option>justify</option>
                        <option>content</option>
                    </select>
                </div>
            </div>
            <div>
                <div>Page Title</div>
                <div><input type="text" name="title" value="{title}"></div>
            </div>
            <div>
                <div>Page Content</div>
                <div><textarea name="content">{content}</textarea></div>
                <div><textarea name="note">{note}</textarea></div>
            </div>
            <div>

                <div id="editor-create-link" class="button">Create action link</div>
                <div id="editor-pages">
                    <select>
                        <optgroup label="Option group 1">
                            <option selected></option>
                            <option>Link reflection name</option>
                        </optgroup>
                    </select>
                </div>


                <div class="link-items">
                    <div class="link-items-form"></div>
                    <div class="link-items-list">
                        <div class="r-item">
                            <span><a href="#">remove</a></span>
                            <span title="reflection-reflection-reflection">Link reflection name</span>
                        </div>
                        <div class="r-item">
                            <span><a href="#">remove</a></span>
                            <span title="reflection-reflection-reflection">Link reflection name</span>
                        </div>
                        <div class="r-item">
                            <span><a href="#">remove</a></span>
                            <span title="reflection-reflection-reflection">Link reflection name</span>
                        </div>
                        <div class="r-item">
                            <span><a href="#">remove</a></span>
                            <span title="reflection-reflection-reflection">Link reflection name</span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <input type="text" name="id" value="{id}" hidden="hidden">
                <input type="text" name="mode" value="{mode}" hidden="hidden">
                <input type="text" name="links" value="{links}" hidden="hidden">
            </div>
            <div>
                <span class="error hide"></span>
            </div>
        </form>
    </div>
    <div id="box"></div>
    <div id="view"></div>
    <div id="form-link">
        <div>
            <select>
                <optgroup label="group 1">
                    <option>Page name 1</option>
                </optgroup>
                <optgroup label="group 2">
                    <option>Page name 2</option>
                </optgroup>
            </select>
            Page
        </div>
        <div>
            <textarea name="title" id="" placeholder="Title"></textarea>
        </div>
        <div>
            <textarea name="note" id="" placeholder="Nodes..."></textarea>
        </div>
    </div>
</div>

</body>
</html>