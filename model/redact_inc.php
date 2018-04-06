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
if (intval($_SESSION['id_user']) !== intval($one_record['id_user'])) {
    header('Location: /');
    die('<script>window.location.href = "/"</script>');
}
if ((intval($_SESSION['id_user']) === intval($one_record['id_user'])) || $_SESSION['status'] === 'writer') {
    $_SESSION['redact'] = intval($one_record['id']);
    ?>
    <form class="form-horizontal" enctype="multipart/form-data" method="post" name="fileinfo">
        <div id='Title1div' class="bs-example">
            <label class="control-label" for="Title1">Title
                <span id="Title1Status"></span>
            </label>
            <input type="text" name="Title" class="form-control" id="Title1" placeholder="Title"
                   value="<?= $one_record['title'] ?>" required>
        </div>

        <div id='Text11div' class="bs-example">
            <label class="control-label" for="Text11">Text
                <span id="Text1Status"></span>
            </label> <textarea id="Text1" name="text" class="form-control" rows="3" required
                               placeholder="Text"><?= $one_record['text'] ?></textarea>
        </div>
        <div class="bs-example">
            <input type="file" name="file" accept="image/*"/>
            <p hidden id='p1' class="bg-danger">Not file, max 4 megabytes</p>
            <input class="btn btn-primary" type="submit" value="Submit"/>
        </div>
    </form>
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <h3>Current image</h3>
        <img class="wrapper_img" style="width: 100%; height: 400px;" src="../img/<?= $one_record['img'] ?>"">
    </div>

    <?php
}
?>