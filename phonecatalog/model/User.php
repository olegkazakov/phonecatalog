<?php
namespace phonecatalog\model;
/**
 * Description of User
 *
 * @author olegkazakov
 */
class User
{
    private $id;
    private $name;
    private $password;
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getPass()
    {
        return $this->password;
    }
    
    function setPass($pass)
    {
        $this->password = $pass;
    }
}
