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
            if (NULL!== $this->getUserId()) {
                return 'extphones';     
            } else {
                return 'phones';
            }
        } else {
            $this->view->error = "Phones view error";
            return 'index';
        }
    }
    
    public function addPhone($add=true)
    {
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
    
    public function deleteConfirm()
    {
        $id = $this->getRequestParam('id');
        $_SESSION['DeletePhoneId'] = $id;
        return 'deleteconfirm';
    }
    
    public function deletePhone()
    {
        if (NULL !== ($_POST['btnYes'])) {
            $id=$_SESSION['DeletePhoneId'];
            if ($this->phoneService->delete($id)) {
                $this->view->error = "Phone deleted succesessfully!";
            } else {
                $this->view->error = "Phone delete error.";
            }
        } 
        $_SESSION['DeletePhoneId']=NULL;
        $this->view->phones = [];
        if (FALSE != ($this->view->phones = $this->phoneService->findAll())) {
            return 'extphones';     
        } else {
            $this->view->error = "Phones view error";
            return 'index';
        }
    }
    
    public function changeConfirm()
    {
        $id = $this->getRequestParam('id');
        if (FALSE != ($this->view->phone = $this->phoneService->find($id))) {
            $_SESSION['ChangePhoneId'] = $id;
            return 'changeconfirm';     
        } else {
            $this->view->error = "Phones change error";
            return 'extphones';
        }
    }
    
    public function changePhone($change=true)
    {
        if (NULL !== ($_POST['cbtnYes'])) {
            if ($change) {
                $phone = new Phone();
                $phone->setId($_SESSION['ChangePhoneId']);
                $phone->setFio($this->getRequestParam('fio'));
                $phone->setPhone($this->getRequestParam('phone'));
                $phone->setComment($this->getRequestParam('comment'));
                if ($this->phoneService->update($phone)) {
                    $this->view->error = "Phone changed succesessfully!";
                } else {
                    $this->view->error = "Phone change error.";
                }
            }
            $id = $_SESSION['ChangePhoneId'];
            $this->view->phone = $this->phoneService->find($id);
            return 'changeconfirm'; 
        } 
        if (NULL !== ($_POST['cbtnNo'])) {
            $_SESSION['ChangePhoneId'] = NULL;
            $this->view->phones = [];
            if (FALSE != ($this->view->phones = $this->phoneService->findAll())) {
                return 'extphones';     
            } else {
                $this->view->error = "Phones view error";
                return 'index';
            }
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