<?php
define('_CONTROL', 1);
session_start();
include_once "../lib/Login.classes.php";
/*
$_POST["email"]='3niko@niko.ru';
//$_POST["email"]='sacha@sacha.ru';
$_POST["pass"]='12345678aA';
$_POST["shidden"]=true;
$_POST["shidden"]=false;

$_POST["name"]='name';
$_POST["conpass"]='12345678aA';

$arr['log'] = ['name'=>$_POST["name"], 'email'=>$_POST["email"], 'pass'=>$_POST["pass"], 'conpass'=>$_POST["conpass"], 'shidden'=>$_POST["shidden"]];
var_dump($arr);*/
new MyClasses\Login();
//var_dump($arr);
//echo json_encode($arr);
//$name='123Fdd4FFFf';
//var_dump($name);
//$pattern = '/^[0-9a-zA-Z]{1,16}$/';
//preg_match($pattern, $name, $name);
//var_dump($name);

