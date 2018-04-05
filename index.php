<?php
ini_set('session.gc_maxlifetime', '14400');
ini_set('session.cookie_lifetime', '14400');

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);

clearstatcache();
session_start();
define('_CONTROL', 1);
ob_start();
if (empty($_SESSION['status'])) {
    $_SESSION['status']='guets';
}
include_once __DIR__ . "/control/pages.php";
include_once __DIR__ . "/view/head/head.php";