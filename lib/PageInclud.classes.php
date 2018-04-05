<?php

namespace MyClasses;

defined('_CONTROL') or die;

class PagesInclud
{
    protected static $_instance;
    public static $page;
    public static $id;
    protected $main = 'main';

    const MYPAGE = [
        'redact' => 'redact',
        'blog' => 'blog',
    ];
    const MYLOGIN = [
        'login' => 'login',
        'exit' => 'exit',
    ];

    private function __construct()
    {
        if (!empty($_REQUEST['page'])) {
            self::$page = trim(html_entity_decode(strip_tags(preg_replace('/[^a-z]/Uuis', '', $_REQUEST['page']))));


            if ($_SESSION["user_name"]) {
                if (array_key_exists(self::$page, self::MYPAGE) || array_key_exists(self::$page, self::MYLOGIN)) {
                    return;
                } else {
                    self::$page = $this->main;
                    return;
                }
            } else {
                if (!array_key_exists(self::$page, self::MYLOGIN)) {
                    self::$page = $this->main;;
                    return;

                }
            }
        } /*elseif (!empty($_REQUEST['id'])) {
            self::$id = intval(trim(filter_var($_REQUEST['id'], FILTER_VALIDATE_INT)));
            if (self::$id > 0) {
                self::$page = 'blog';
            } else {
                self::$id = 0;
                self::$page = $this->main;
            }
        }*/
        else {
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
        if (!empty(self::$page)) {
            $file = "view/body/" . self::$page . ".php";
        }
        if (!empty($file) && is_file($file)) {
            include_once $file;
        }
        return $file;
    }
}