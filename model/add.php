<?php
define('_CONTROL', 1);
session_start();

include_once "../control/exist.php";
include_once "../lib/Add.classes.php";

use MyClasses\Add as Add;
$add = new Add();
$arr = $add->checkRecord();
echo json_encode($arr);