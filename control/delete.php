<?php
define('_CONTROL', 1);
session_start();
include_once "exist.php";
include_once "../lib/Blog.classes.php";

use MyClasses\Blog as Blog;

$id = trim(html_entity_decode(strip_tags($_POST['delete'])));
if (empty($id)) die();
$blog = new MyClasses\Blog();
$id = intval($id);
$blogClass = new Blog();
$del_record = $blogClass->deleteRecord($id);
?>