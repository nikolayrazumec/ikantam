<?php
define('_CONTROL', 1);
session_start();

include_once "../control/exist.php";
include_once "../lib/Add.classes.php";

if ($_SESSION['redact'] < 1) {
    header('Location: /');
    exit;
}

use MyClasses\Add as Add;

$add = new Add();
$arr = $add->redactRecord();
echo json_encode($arr);

