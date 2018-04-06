<?php

namespace MyClasses;

defined('_CONTROL') or die;
include_once 'MyDb.classes.php';

class Blog
{
    private $pdo;
    private $max;
    private $limi2 = 4;

    public function __construct()
    {
        $this->pdo = MyDb::MyPdo();

        $this->max = $this->getMax();
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
        $sql = "SELECT blog.id,`id_user`, `title`, SUBSTR(`text`, 1, 300) as text, `time`, `img`, name FROM `user_blog` as blog
JOIN `user` as user ON user.id=blog.id_user
ORDER BY `time` DESC
LIMIT {$limi1},{$this->limi2}";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll($this->pdo::FETCH_ASSOC);
    }

}
