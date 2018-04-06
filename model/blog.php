<?php
define('_CONTROL', 1);
session_start();
include_once "/lib/Blog.classes.php";

use MyClasses\Blog as Blog;

$id = trim(html_entity_decode(strip_tags($_GET['id'])));
if (empty($id)) {
    header('Location: /');
    die();
}
$blog = new MyClasses\Blog();
$id = intval($id);
$blogClass = new Blog();

$one_record = $blogClass->oneRecord($id);
if (empty($one_record['id'])) {
    header('Location: /');
    die();
}

echo '
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1>' . $one_record['title'] . '</h1>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                <img class="wrapper_img" style="width: 100%;
                    height: 350px;" src="img/' . $one_record['img'] . '"">
            </div>

            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                <p style="word-wrap: break-word;">' . $one_record['text'] . '</p>
                <p>Posted on ' . $one_record['time'] . ' by <b>' . $one_record['name'] . '</b></p>';

if ((intval($_SESSION['id_user']) === intval($one_record['id_user'])) || $_SESSION['status'] === 'writer') {
    echo '
                <button onclick="delButton()" id="delete" name="' . $one_record['id'] . '" class="btn btn-primary">Delete</button>
                <a href="/?page=redact&id=' . $one_record['id'] . '" class="btn btn-primary">Edit</a>';
}

echo '
            </div>
        </div>';