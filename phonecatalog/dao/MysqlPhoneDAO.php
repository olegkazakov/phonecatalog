<?php
namespace phonecatalog\dao;

use phonecatalog\model\Phone;

class MysqlPhoneDAO implements PhoneDAO
{
    public function delete($id)
    {
        $stmt = MysqlConnection::$dbh->prepare("DELETE FROM phone "
                . "WHERE id=:id");
        $stmt->bindParam('id', $id);
        return $stmt->execute();
    }

    public function find($id)
    {

    }

    public function findAll()
    {
        $stmt = MysqlConnection::$dbh->prepare("SELECT id, fio, "
                . "phone, comment FROM phone");
        $stmt->execute();
        $phones = [];
        while ($phone = $stmt->fetchObject('\phonecatalog\model\Phone')) {
            $phones[] = $phone;
        }
        return $phones;
    }

    public function save(Phone $phone)
    {
        $stmt = MysqlConnection::$dbh->prepare("INSERT INTO phone "
                . "(fio, phone, comment) "
                . "values "
                . "(:fio, :phone, :comment)");
        $stmt->bindParam('fio', $phone->getFio());
        $stmt->bindParam('phone', $phone->getPhone());
        $stmt->bindParam('comment', $phone->getComment());
        return $stmt->execute();
    }

    public function update(Phone $phone) 
    {

    }
}
