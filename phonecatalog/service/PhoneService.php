<?php
namespace phonecatalog\service;

use phonecatalog\model\Phone;
use phonecatalog\dao\PhoneDAO;

class PhoneService
{
    private $dao;
    
    function __construct(PhoneDAO $dao)
    {
        $this->dao = $dao;
    }
    
    public function find($id) {
        return $this->dao->find($id);
    }

    public function findAll() {
        return $this->dao->findAll();
    }
   
    public function delete($id) {
        return $this->dao->delete($id);
    }
    
    public function save(Phone $phone) {
        return $this->dao->save($phone);
    }
    
    public function update(Phone $phone) {
        return $this->dao->update($phone);
    }
}
