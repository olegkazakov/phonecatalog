<?php

session_start();
require_once './autoload.php';
require_once './config.php';

use phonecatalog\controller\UserController;
use phonecatalog\dao\MysqlConnection;
use phonecatalog\dao\MysqlUserDAO;
use phonecatalog\dao\MysqlPhoneDAO;
use phonecatalog\layout\Layout;
use phonecatalog\service\UserServiceImpl;
use phonecatalog\service\PhoneService;

MysqlConnection::$dbh = new PDO('mysql:host=' . Config::$dbhost . ';dbname='
        .Config::$dbname, Config::$dbuser, Config::$dbpass); 

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
if (empty($action)) {
    $action='index';
}
$ctrl = new UserController(new UserServiceImpl(new MysqlUserDAO()));
$ctrl->setPhoneService(new PhoneService(new MysqlPhoneDAO()));
$layout = new Layout();
if (isset($_SESSION['id'])) {
    $ctrl->setUserId($_SESSION['id']);
}

switch ($action) {
    case "showUser":
        $id = filter_input(INPUT_GET, 'id');
        $ctrl->setRequestParam('id', empty($id) ? $_SESSION['id'] : $id);
        $viewName = $ctrl->showUser();
        $layout->setView($ctrl->getView());
        $layout->render($viewName);
        break;
    case "login" :
        $ctrl->setRequestParam('name', filter_input(INPUT_POST, 'name'));
        $ctrl->setRequestParam('password', filter_input(INPUT_POST, 'password'));
        $viewName = $ctrl->login();
        if (isset($viewName)) {
            if ($viewName=='showuser') {
                $layout->setLayoutName('userlayout');
            }
            $layout->setView($ctrl->getView());
            $layout->render($viewName);
        }
        break;
    case "logout":
        setcookie(session_name(),'');
        $layout->setLayoutName('default');
        $ctrl->setUserId(NULL);
        $viewName = $ctrl->index();
        $layout->setView($ctrl->getView());
        $layout->render($viewName);
        break;
    case "addIncome" :
        if (count($_POST) > 0) {
            foreach (['amount', 'currency_id', 'date', 'source_id', 'user_id'] as $key) {
                $ctrl->setRequestParam($key, filter_input(INPUT_POST, $key));
            }
            $viewName = $ctrl->addIncome();
        } else {
            $viewName = $ctrl->addIncome(false);
        }
        $layout->setView($ctrl->getView());
        $layout->render($viewName);
        break;
    case "phones" :
        $viewName = $ctrl->getAllPhones();
        $layout->setView($ctrl->getView());
        $layout->render($viewName);
        break;
    case "index" :
        $viewName = $ctrl->index();
        $layout->setView($ctrl->getView());
        $layout->render($viewName);
        break;
    default :
        http_response_code(404);
        echo "Page does not exist";
}