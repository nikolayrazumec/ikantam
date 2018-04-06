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

    public function checkRecord(int $id_rec = 0)
    {

        //if ((!empty($_POST['Title']) || !empty($_POST['text'])) && !empty($_SESSION["id_user"])) {
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


class Submit
{
    protected $idmax;
    protected $filename;

    public function __construct()
    {
        if (!empty($_POST['nameadd']) && !empty($_POST['priceadd']) && !empty($_POST['quantityadd']) && !empty($_POST['descriptionadd']) && !empty($_SESSION["name"]) && !empty($_SESSION["id_client"])) {
            $id_client = $_SESSION["id_client"];
            $nameadd = trim(html_entity_decode(strip_tags($_POST['nameadd'])));
            $priceadd = trim(html_entity_decode(strip_tags($_POST['priceadd'])));
            $pattern = '#^\d{1,}(\.\d{1,})?$#U';
            preg_match($pattern, $priceadd, $matches);
            $priceadd = $matches[0];
            !empty($priceadd) or die("введите число в поле цена,число вида X или X.X");

            $quantityadd = trim(html_entity_decode(strip_tags(preg_replace("/[^\d]/", '', $_POST['quantityadd']))));
            (1 <= $quantityadd && 100 >= $quantityadd) or die("количество может быть от 1 до 100!");

            $descriptionadd = trim(html_entity_decode(strip_tags($_POST['descriptionadd'])));
            strlen($descriptionadd) < 65000 or die("в описании количество символов превышено!");

            $this->idmax = Product::maxId() + 1;
            $this->getFile();
            !empty($this->filename) or die("проверьте проложен ли файл!");
            Product::getInstance()->getInsert($id_client, $nameadd, $priceadd, $quantityadd, $descriptionadd, $this->filename) or die("что-то пошло не так, попробуйте снова!");
            echo '
                <script language="JavaScript">
                    alert( "товар добавлен" );                
                    //window.location.href = "/";
                    window.location.href = "/?page=add";
                </script>';
        } elseif (empty($_SESSION["name"])) {
            echo '
                <script language="JavaScript">
                    window.location.href = "/login.php"
                </script>';
        }
    }

    protected function getFile()
    {
        $uploaddir = '../uploads/';
        if (!is_dir($uploaddir)) mkdir($uploaddir, 0777);
        foreach ($_FILES as $file) {
            if (($file["type"] == "image/png"
                    || $file["type"] == "image/jpg"
                    || $file["type"] == "image/gif"
                    || $file["type"] == "image/jpeg"
                    || $file["type"] == "image/jpeg")
                && ($file["size"] < 2097152)
            ) {
                $path_parts = pathinfo($file['name']);
                $path_parts['extension'];
                $this->filename = "{$this->idmax}.{$path_parts['extension']}";
                if (move_uploaded_file($file['tmp_name'], $uploaddir . $this->filename)) {
                    $files[] = realpath($uploaddir . $file['name']);
                } else {
                    die("проверьте формат файла, размер не более 2мб!!!");
                }
            } else {
                die("проверьте формат файла, размер не более 2мб!!!");
            }
        }
    }
}