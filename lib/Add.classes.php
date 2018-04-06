<?php

namespace MyClasses;

defined('_CONTROL') or die;
include_once 'MyDb.classes.php';
include_once 'Blog.classes.php';

class Add extends Blog
{

    protected $idmax;
    protected $filename;

    public function _construct()
    {
        parent::__construct();
    }

    public function redactRecord()
    {
        if (!empty($_SESSION["id_user"]) && $_SESSION['redact'] >= 1) {

            $arr_err = [];
            $title = trim(html_entity_decode(strip_tags($_POST['Title'])));
            $text = trim(html_entity_decode(strip_tags($_POST['text'])));
            $id = intval($_SESSION['redact']);
            if (strlen($title) >= 255) $arr_err['title'] = 'not more than 255 characters';
            if (strlen($title) < 1) $arr_err['title'] = 'empty field';
            if (strlen($text) >= 65000) $arr_err['text'] = 'not more than 255 characters';
            if (strlen($text) < 1) $arr_err['text'] = 'empty field';
            $this->idmax = intval($_SESSION['redact']);
            $getfile = $this->getFile();
            if (!empty($this->filename)) {
                $arr_err['file'] = $getfile;
            }
            if (empty($arr_err['text']) && empty($arr_err['title'])) {
                $insert = parent::setUpdate($id, $title, $text, $this->filename);
                if ($insert) $_SESSION['redact'] = 0;
            };
            $arr_err['insert'] = $insert;
        }
        return $arr_err;
    }


    public function checkRecord(int $id_rec = 0)
    {
        if (!empty($_SESSION["id_user"])) {
            $arr_err = [];
            $id_user = intval($_SESSION["id_user"]);
            $title = trim(html_entity_decode(strip_tags($_POST['Title'])));
            $text = trim(html_entity_decode(strip_tags($_POST['text'])));

            if (strlen($title) >= 255) $arr_err['title'] = 'not more than 255 characters';
            if (strlen($title) < 1) $arr_err['title'] = 'empty field';
            if (strlen($text) >= 65000) $arr_err['text'] = 'not more than 255 characters';
            if (strlen($text) < 1) $arr_err['text'] = 'empty field';

            if ($id_rec == 0) {
                $this->idmax = parent::maxId() + 1;
            } else {
                $this->idmax = intval($id_rec);
            }

            $arr_err['file'] = $this->getFile();

            if (empty($arr_err['file']) && empty($arr_err['text']) && empty($arr_err['title'])) {
                $insert = parent::setInsert($id_user, $title, $text, $this->filename);
            };
            $arr_err['insert'] = $insert;
        }
        return $arr_err;
    }

    protected function getFile()
    {
        $uploaddir = '../img/';
        if (!is_dir($uploaddir)) mkdir($uploaddir, 0777);
        foreach ($_FILES as $file) {
            if (($file["type"] == "image/png"
                    || $file["type"] == "image/jpg"
                    || $file["type"] == "image/gif"
                    || $file["type"] == "image/jpeg"
                    || $file["type"] == "image/jpeg")
                && ($file["size"] < 4297152)
            ) {
                $path_parts = pathinfo($file['name']);
                $path_parts['extension'];
                $this->filename = "{$this->idmax}.{$path_parts['extension']}";
                if (move_uploaded_file($file['tmp_name'], $uploaddir . $this->filename)) {
                    $files[] = realpath($uploaddir . $file['name']);
                } else {
                    return "error file";
                }
            } else {
                return "not file,max 4 megabytes";
            }
        }
    }
}