<?php
define('_CONTROL', 1);
session_start();

include_once "../control/exist.php";
include_once "../lib/Add.classes.php";

use MyClasses\Add as Add;

//echo 'add.php';

$add = new Add();
$arr = $add->checkRecord();
echo json_encode($arr);
//var_dump($arr);
//var_dump($_POST);
//var_dump($_FILES);
//echo '{"file":null,"insert":true}';