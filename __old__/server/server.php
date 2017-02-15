<?php
include 'libs/SPDO.php';
include 'libs/SLayout.php';
include 'libs/Page.php';









//$layout = new SLayout(['path' => 'views', 'template' => 'template']);
//$page = new Page();
//
//
//$data_page = $page->getPage(1);
//$layout->setPosition('page', 'formpage', $data_page);
//$layout->setPosition('page', 'formpage', $data_page);





/*class Server {

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