<?php
define('_CONTROL', 1);
session_start();
include_once "../lib/Blog.classes.php";

$main = trim(html_entity_decode(strip_tags($_POST['main'])));
if (empty($main)) die();
$blog = new MyClasses\Blog();
if ($main === 'getRecord') {
    $rec = intval($_POST['rec']);
    $rec = $rec * 4;
    $record = $blog->getRecord($rec);
    foreach ($record as $key) {
        echo '
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <h1>' . $key['title'] . '</h1>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <img class="wrapper_img" src="img/' . $key['img'] . '"">
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <p style="word-wrap: break-word;">' . $key['text'] . '...</p>

                <a href="/?page=blog&id=' . $key['id'] . '" class="btn btn-primary">Read More →</a>
                <p>Posted on ' . $key['time'] . ' by <b>' . $key['name'] . '</b></p>
            </div>
        </div>';
    }
} elseif ($main === 'getMax') {
    echo $blog->getMax();
}