<?php
namespace phonecatalog\dao;

use phonecatalog\dao\MysqlConnection;
use phonecatalog\dao\UserDAO;
use phonecatalog\model\User as User;

class MysqlUserDAO implements UserDAO
{
    public function find($id)
    {
        $stmt = MysqlConnection::$dbh->prepare("SELECT id, name, "
                ."password from user where id=:id");
        try {
            $stmt->bindParam('id', $id);
            $stmt->execute();
            while ($user = $stmt->fetchObject('\phonecatalog\model\User')) {
                return $user;
            }
            return null;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function findByNameAndPass($name, $pass)
    {
        $stmt = MysqlConnection::$dbh->prepare("SELECT id, name, "
                ."password from user where name=:name and "
                ."password=password(:pass)");
        try {
            $stmt->bindParam('name', $name);
            $stmt->bindParam('pass', $pass);
            $stmt->execute();
            while ($user = $stmt->fetchObject('\phonecatalog\model\User')) {
                return $user;
            }
            return null;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function save(User $user)
    {
        
    }
}
