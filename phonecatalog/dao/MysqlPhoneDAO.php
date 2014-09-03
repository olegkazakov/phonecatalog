<?php
namespace phonecatalog\dao;

use phonecatalog\model\Phone;

class MysqlPhoneDAO implements PhoneDAO
{
    public function delete($id)
    {
      
    }

    public function find()
    {

    }

    public function findAll()
    {
        $stmt = MysqlConnection::$dbh->prepare("SELECT id, fio as 'F.I.O.'"
                . "phone, commit FROM phone");
        $stmt->execute();
        $phones = [];
        while ($phone = $stmt->fetchObject('\phonecatalog\model\Phone')) {
            $phones[] = $phone;
        }
        return $phones;
    }

    public function save(Phone $phone)
    {

    }

    public function update(Phone $phone) 
    {

    }
}
