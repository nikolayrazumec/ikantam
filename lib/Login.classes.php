<?php

namespace MyClasses;

defined('_CONTROL') or die;
include_once 'MyDb.classes.php';

class Login
{
    private $pass = '';
    private $email = '';
    private $name = '';
    private $conpass = '';
    private $shidden = 1;
    private $pdo;

    function __construct()
    {
        if (!empty($_POST["email"] && !empty($_POST["pass"]))) {
            $this->pdo = MyDb::MyPdo();
            $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}/';
            preg_match($pattern, $_POST["pass"], $pass);
            $this->pass = trim(html_entity_decode(strip_tags($pass[0])));;
            $this->email = trim(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));
            if ($_POST["shidden"] === 'true') {
                $this->shidden = 1;
            } else {
                $this->shidden = 0;
            }
            if ($this->shidden == 0) {
                $pattern = '/^[0-9a-zA-Z]{1,16}$/';
                preg_match($pattern, $_POST["name"], $name);
                $this->name = trim(html_entity_decode(strip_tags($name[0])));
                $this->conpass = trim(html_entity_decode(strip_tags($_POST["conpass"])));
            }

            if ($this->conpass == $this->pass) {
                $con = 1;
            } else {
                $con = 0;
            }
            $na = (empty($this->name)) ? '0' : '1';
            $pa = (empty($this->pass)) ? '0' : '1';
            $em = (empty($this->email)) ? '0' : '1';

            $arr['construct'] = ['email' => $this->email, 'pass' => $this->pass, 'shidden' => $this->shidden, 'name' => $this->name, 'conpass' => $this->conpass];
            $arr['construct11'] = ['$na' => $na, '$pa' => $pa, '$em' => $em, '$con' => $con];

            if ($this->shidden) {
                if (!$em || !$pa) {
                    die("validForm({$em}, {$pa}, {$this->shidden}, {$na}, {$con})");
                } else {
                    $this->signIn();
                    return;
                }
            } else {
                if (!$em || !$pa || !$na || !$con) {
                    die("validForm({$em}, {$pa}, {$this->shidden}, {$na}, {$con})");
                } else {
                    $this->signUp();
                    return;
                }
            }
            die("validForm({$em}, {$pa}, {$this->shidden}, {$na}, {$con})");
        }
        die("validForm(0,0,0,0,0);alert('try later')");
    }

    private function signIn()
    {
        $sql = 'SELECT `id`, `name`,`admin` FROM `user` WHERE email=:email AND password=:password LIMIT 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $this->email, ':password' => $this->pass]);
        $user = $stmt->fetch($this->pdo::FETCH_ASSOC);
        if (!$user['id']) {
            die("validForm(0,0,1,0,0);");
        } else {
            $_SESSION["user_name"] = $user['name'];
            $_SESSION["id_user"] = $user['id'];
            $_SESSION["admin"] = $user['admin'];
            if ($user['admin'] == 1) {
                $_SESSION['status'] = 'writer';
            } else {
                $_SESSION['status'] = 'user';
            }

            die('window.location.href = "/"');
        }
        die('window.location.href = "/"');
    }

    private function signUp()
    {
        $user = $this->getUser();
        if ($user['id'] > 0) {
            die("validForm(1,1,0,1,1,1);");
        }
        $sql_insert = 'INSERT INTO `user`(`name`, `email`, `password`) VALUES (:name,:email,:password)';
        $stmt = $this->pdo->prepare($sql_insert);
        $a = $stmt->execute([':name' => $this->name, ':email' => $this->email, ':password' => $this->pass]);
        if ($a) {
            $user = $this->getUser();
            $_SESSION["user_name"] = $user['name'];
            $_SESSION["id_user"] = $user['id'];
            $_SESSION["admin"] = $user['admin'];
            if ($user['admin'] == 1) {
                $_SESSION['status'] = 'writer';
            } else {
                $_SESSION['status'] = 'user';
            }
            die('window.location.href = "/"');
        } else {
            die("alert('maximum number of characters for field 50')");
        }
    }

    private function getUser()
    {
        $sql = 'SELECT `id`, `name`,`admin` FROM `user` WHERE email=:email LIMIT 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $this->email]);
        $user = $stmt->fetch($this->pdo::FETCH_ASSOC);
        return $user;
    }
}