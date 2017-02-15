<?php


class PageDataManager {

    /** @var SPDO */
    private static $db;
    private static $dbPath;
    private $fields = ["id", "title", "text", "group", "note", "links"];

    public function __construct($db_path) {
        self::$dbPath = $db_path;
        self::db();
    }

    public static function db() {
        if (self::$db === null)
            self::$db = new SPDO('sqlite:' . self::$dbPath);

        return self::$db;
    }

    public function getPage($id) {
        return self::itemByAttr($this->getPages(), 'id', $id);
    }

    public function getPages() {
        return self::$db->select('*', 'page');
    }

    public function getPageLinks($id) {
        $links = false;
        $pages = [];
        $page = $this->getPage($id);

        if (!empty($page['links']))
            try{
                $links = json_decode($page['links'], true);
            } catch (Exception $e) {}

        if (is_array($links)) {
            for ($i = 0; $i < count($links); $i ++)
                array_push($pages, $this->getPage($links[$i]));
        }
        return $pages;
    }

    public function insertPages($data) {
        $data = $this->toDefaultFields($data, ['id']);
        return self::$db->insert('page', $data);
    }

    public function updatePages($id, $data) {
        $data = $this->toDefaultFields($data, ['id']);
        return self::$db->update('page', $data, 'id = ' . $id);
    }

    public function toDefaultFields($data, $remove = ['id']) {
        $result = [];
        foreach (array_fill_keys($this->fields, '') as $key => $value) {
            if (!is_array($remove) || !in_array($key, $remove)) {
                if (isset($data[$key]))
                    $result[$key] = $data[$key];
                else
                    $result[$key] = '';
            }
        }
        return $result;
    }

    public static function itemByAttr ($arr, $key, $value) {
        for ($i = 0; $i < count($arr); $i ++) {
            if (isset ($arr[$i][$key]) && $arr[$i][$key] == $value) {
                return $arr[$i];
            }
        }
        return false;
    }
}