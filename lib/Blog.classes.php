<?php

namespace MyClasses;

defined('_CONTROL') or die;
include_once 'MyDb.classes.php';

class Blog
{
    protected $pdo;
    protected $limi2 = 4;

    public function __construct()
    {
        $this->pdo = MyDb::MyPdo();
    }

    public function setUpdate(int $id, string $title, string $text, $img)
    {
        if (!empty($img)) {
            $stmt = $this->pdo->prepare('UPDATE `user_blog` SET `title`=?,`text`=?,`img`=? WHERE `id`=?');
            return $stmt->execute([$title, $text, $img, $id]);
        } else {
            $stmt = $this->pdo->prepare('UPDATE `user_blog` SET `title`=?,`text`=? WHERE `id`=?');
            return $stmt->execute([$title, $text, $id]);
        }
    }

    public function setInsert(int $id_user, string $title, string $text, string $img)
    {
        $stmt = $this->pdo->prepare('INSERT INTO `user_blog`(`id_user`, `title`, `text`, `time`, `img`) VALUES (?,?,?,NOW(),?)');
        return $stmt->execute([$id_user, $title, $text, $img]);
    }

    public function maxId()
    {
        $stmt = $this->pdo->query('SELECT MAX(`id`) as `MAX` FROM `user_blog`');
        $id = $stmt->fetch($this->pdo::FETCH_ASSOC);
        return intval($id['MAX']);
    }

    public function getMax()
    {
        $sql = 'SELECT COUNT(`id`) as leng FROM `user_blog`';
        $stmt = $this->pdo->query($sql);
        $user = $stmt->fetch($this->pdo::FETCH_ASSOC);
        return $user['leng'];
    }

    public function getRecord(int $limi1 = 0)
    {
        $limi1 = intval($limi1);
        $sql = "SELECT blog.id,`id_user`, `title`, SUBSTR(`text`, 1, 150) as text, `time`, `img`, name FROM `user_blog` as blog
JOIN `user` as user ON user.id=blog.id_user
ORDER BY `time` DESC
LIMIT {$limi1},{$this->limi2}";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll($this->pdo::FETCH_ASSOC);
    }

    public function oneRecord(int $blog_id = 0)
    {
        $blog_id = intval($blog_id);
        $blog_id = $this->pdo->quote($blog_id);
        $sql = "SELECT blog.id,`id_user`, `title`,text, `time`, `img`, name FROM `user_blog` as blog
JOIN `user` as user ON user.id=blog.id_user WHERE blog.id={$blog_id}
LIMIT 1";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetch($this->pdo::FETCH_ASSOC);
    }

    public function deleteRecord(int $blog_id = 0)
    {
        $id_user = intval($_SESSION['id_user']);
        $id_user = $this->pdo->quote($id_user);
        $blog_id = intval($blog_id);
        $blog_id = $this->pdo->quote($blog_id);
        $sql = "SELECT `id` FROM `user_blog` WHERE `id`={$blog_id} AND `id_user`={$id_user} LIMIT 1";
        $stmt = $this->pdo->query($sql);
        $user = $stmt->fetch($this->pdo::FETCH_ASSOC);
        if ((intval($user['id']) > 0) || $_SESSION['status'] === 'writer') {
            $sql = "DELETE FROM `user_blog` WHERE `id`={$blog_id}";
            $result = $this->pdo->exec($sql);
            if ($result) {
                die('window.location.href = "/"');
            } else {
                die("alert('try later')");
            }
        }
        die("alert('try later')");
    }
}