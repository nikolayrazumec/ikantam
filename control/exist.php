<?php
defined('_CONTROL') or die;
if (empty($_SESSION["user_name"])) {
    header('Location: /');
    exit;
} ?>