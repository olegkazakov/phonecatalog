<?php
namespace phonecatalog\controller;

use phonecatalog\service\UserServiceImpl;
use phonecatalog\model\Phone;

class UserController extends AbstractController
{
    private $userService;
    private $phoneService;
    private $view;
    
    public function getView()
    {
        return $this->view;
    }
    
    public function setView($view)
    {
        $this->view = $view;
    }
    
    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }
    public function __construct(UserServiceImpl $userService)
    {
        parent::__construct();
        $this->userService = $userService;
        $this->view = new \stdClass();
    }

    protected function getUserService()
    {
        return $this->userService;
    }
    
    public function setPhoneService($phoneService)
    {
        $this->phoneService = $phoneService;
    }

    public function showUser()
    {
        $id = $this->getUserId();
        if (empty($id)) {
            $this->view->error = "There is no such User";
            return 'errors';
        }
        if (!($this->view->user = $this->userService->find($id))) {
            $this->view->error = "User search error.";
            return 'errors';
        } else {
            return "showuser";
        }
    }

    function login()
    {
        $name = $this->getRequestParam('name');
        $pass = $this->getRequestParam('password');
        if (empty($name) || empty($pass)) {
            return 'login';
        } else {
            if (FALSE != ($this->view->user = $this->userService->authorize($name, $pass))) {
                $_SESSION['id'] = $this->view->user->getId();
                return 'showuser';
            } else {
                $this->view->error = "Login or password failed";
                return 'login';
            }
        }
    }
     
    public function formAddUser()
    {
        if (isset($_SESSION['id'])) {
            $this->view->error='Log out, please.';  
            return "errors";
        } else {
            return 'adduser';
        }
    }
    
    public function getAllPhones()
    {
        $this->view->phones = [];
        if (FALSE != ($this->view->phones = $this->phoneService->findAll())) {
            return 'phones';          
        } else {
            $this->view->error = "Phones view error";
            return 'index';
        }
    }
    
    public function addPhone($add=true) {
        $phone = new Phone();
        if ($add) {
            $phone->setFio($this->getRequestParam('fio'));
            $phone->setPhone($this->getRequestParam('phone'));
            $phone->setComment($this->getRequestParam('comment'));
            if ($this->phoneService->save($phone)) {
                $this->view->error = "Phone added succesessfully!";
            } else {
                $this->view->error = "Phone add error.";
            }
        }
        return 'addphone';
    }
    
    public function index()
    {
        return 'index';
    }
    
    public function logout()
    {
        return 'logout';
    }
}
?>