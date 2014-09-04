<?php
namespace phonecatalog\dao;

use phonecatalog\model\Phone;

class MysqlPhoneDAO implements PhoneDAO
{
    public function delete($id)
    {
        $stmt = MysqlConnection::$dbh->prepare("DELETE FROM phone "
                . "WHERE id=:id");
        try {
          $stmt->bindParam('id', $id);
          return $stmt->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function find($id)
    {
        $stmt = MysqlConnection::$dbh->prepare("SELECT id, fio, "
                . "phone, comment FROM phone WHERE id=:id");
        try {        
            $stmt->bindParam('id', $id);
            $stmt->execute();
            $phone = $stmt->fetchObject('\phonecatalog\model\Phone');
            return $phone;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function findAll()
    {
        $stmt = MysqlConnection::$dbh->prepare("SELECT id, fio, "
                . "phone, comment FROM phone");
        try {
            $stmt->execute();
            $phones = [];
            while ($phone = $stmt->fetchObject('\phonecatalog\model\Phone')) {
                $phones[] = $phone;
            }
            return $phones;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        
    }

    public function save(Phone $phone)
    {
        $stmt = MysqlConnection::$dbh->prepare("INSERT INTO phone "
                . "(fio, phone, comment) "
                . "values "
                . "(:fio, :phone, :comment)");
        if ($phone->getFio()==''){
            $phone->setFio('no name');
        }
        try {
            $stmt->bindParam('fio', $phone->getFio());
            $stmt->bindParam('phone', $phone->getPhone());
            $stmt->bindParam('comment', $phone->getComment());
            return $stmt->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function update(Phone $phone) 
    {
        $stmt = MysqlConnection::$dbh->prepare("UPDATE phone "
                . "SET fio=:fio, phone=:phone, comment=:comment "
                . "WHERE id=:id");
        try {
            $id = $phone->getId();
            $stmt->bindParam('id', $id);
            $stmt->bindParam('fio', $phone->getFio());
            $stmt->bindParam('phone', $phone->getPhone());
            $stmt->bindParam('comment', $phone->getComment());
            return $stmt->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
}
