<?php 

namespace application\controllers; 

use application\core\Controller;

class AccountController extends Controller {

	public function loginAction() {
	    if(!empty($_POST)){
            $vars = $this->model->getAuth($_POST['login'],$_POST['password']);
            if($vars){
                $_SESSION["id"]=$vars[0]['id'];
                $_SESSION["user"]=$vars[0]['username'];
                exit(json_encode(['url'=>'/OrderProject/']));
            } else{
                exit(json_encode(['status'=>'Ошибка!', 'message'=>'Неверное имя пользователя или пароль']));
            }
        }
		$this->view->render('Вход');
	}

    public function logoutAction() {
        unset($_SESSION['id']);
        unset($_SESSION['user']);
        header('location: /OrderProject/login');
        exit;
    }
}