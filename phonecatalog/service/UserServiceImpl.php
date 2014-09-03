<?php
namespace phonecatalog\service;

/**
 * Description of UserServiceImpl
 *
 * @author olegkazakov
 */
class UserServiceImpl implements UserService
{
    private $userDAO;
    
    function __construct(\phonecatalog\dao\MysqlUserDAO $dao)
    {
        $this->userDAO = $dao;
    }

    public function find($id)
    {
        return $this->userDAO->find($id);
    }

    public function save(\phonecatalog\model\User $user)
    {
        return $this->userDAO->save($user);
    }

    public function authorize($name, $pass)
    {
        return $this->userDAO->findByNameAndPass($name, $pass);
    }

}
