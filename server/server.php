<?php
include 'libs/SPDO.php';
include 'libs/SLayout.php';
include 'PageManager.php';

$route = isset($_GET['r']) ? $_GET['r'] : 'list';
$path_database = __DIR__.'/database/db.sqlite';
$path_templates = __DIR__.'/views';

$pageDataManager = new PageManager($path_database);

$layout = new SLayout([
    'path' => $path_templates,
    'template' => 'template',
]);

// Список всех страниц
if ($route == 'list') {
    $pages = $pageDataManager->getPages();
    $layout->setPosition('page', 'list', [
        'pages' => $pages
    ]);
}

// Отображать превю
if ($route == 'view') {
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 1;
    $page = $pageDataManager->getPage($id);
    $links = $pageDataManager->getPageLinks($id);
    $layout->setPosition('page', 'preview', [
        'page' => $page,
        'links' => $links,
    ]);
}

// Редактор
if ($route == 'edit') {
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 1;
    $page = $pageDataManager->getPage($id);
    $pages = $pageDataManager->getPages();
    $links = $pageDataManager->getPageLinks($id);
    $layout->setPosition('page', 'formpage', [
        'page' => $page,
        'pages' => $pages,
        'links' => $links,
    ]);
}



























/*
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *
class Server {

    private $spdo;
    private $slayout;
    private $root;

    public function __construct () {
        $this->root = __DIR__.'/';
        $this->spdo = new SPDO('sqlite:'.$this->root.'database/db.sqlite');
        $this->slayout = new SLayout([
            'path' => $this->root.'views',
            'template' => 'template'
        ]);
    }

    public function db () {
        return $this->spdo;
    }

    public function layout () {
        return $this->slayout;
    }

}

function itemByAttr ($arr, $key, $value) {
    for ($i = 0; $i < count($arr); $i ++) {
        if (isset ($arr[$i][$key]) && $arr[$i][$key] == $value) {
            return $arr[$i];
        }
    }
    return false;
}

$mode = isset($_POST['mode']) ? $_POST['mode'] : false;
$server = new Server();
$pages = $server->db()->select('*', 'page');
$result = [
    'mode' => $mode,
];

//
//print_r($server->db()->tableInfo('page'));
//print_r($server->db()->select('*', 'page'));

if ($mode === 'getpages') {
    $result['pages'] = $pages;
    $result['error'] = $server->db()->errorCode();
}

else if ($mode === 'insert') {
    $title = $_POST['title'];
    $content = $_POST['content'];

//    if (itemByAttr($pages, 'title', $title)) {
//
//    }
//

    $insert_id = $server->db()->insert('page', [
        'title' => $title,
        'text' => $content,
    ]);

    $result['insert_id'] = $insert_id;
    $result['error'] = $server->db()->errorCode();
}

else if ($mode === 'update') {




}

else if ($mode === 'delete') {




}

exit(json_encode($result));*/