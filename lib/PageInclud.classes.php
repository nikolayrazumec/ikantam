<?php

namespace MyClasses;

defined('_CONTROL') or die;

class PagesInclud
{
    protected static $_instance;
    public static $page;
    public static $id;
    //public static $exit = "/view/body/exit.php";
    //public static $login = "login.php";
    protected $main = 'main';

    const MYPAGE = [
        'redact' => 'redact',
        'redact2' => 'redact2',
        'redact3' => 'redact3',
    ];
    const MYLOGIN = [
        'login' => 'login',
        'exit' => 'exit',
    ];

    private function __construct()
    {
        if (!empty($_REQUEST['page'])) {
            self::$page = trim(html_entity_decode(strip_tags(preg_replace('/[^a-z]/Uuis', '', $_REQUEST['page']))));
            if ($_SESSION["name"]) {
                if ((!array_key_exists(self::$page, self::MYPAGE)) || (!array_key_exists(self::$page, self::MYLOGIN))) {
                    self::$page = $this->main;
                }
            } else {
                if (!array_key_exists(self::$page, self::MYLOGIN)) {
                    self::$page = $this->main;;
                }
            }
        } elseif (!empty($_REQUEST['id'])) {
            self::$id = intval(trim(filter_var($_REQUEST['id'], FILTER_VALIDATE_INT)));
            if (self::$id > 0) {
                self::$page = 'blog';
            } else {
                self::$id = 0;
                self::$page = $this->main;
            }
        } else {
            self::$page = $this->main;

        }
    }

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    public function getInc()
    {
        self::getInstance();
        if (!empty(self::$page)) {
            $file = "view/body/" . self::$page . ".php";
        }
        if (!empty($file) && is_file($file)) {
            include_once $file;
        }
        return $file;
    }
}