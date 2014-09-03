<?php
namespace phonecatalog\controller;

use phonecatalog\service\UserServiceImpl;

class UserController extends AbstractController
{
    private $userService;
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