<?php
require_once 'models/model.user.php';
require_once 'views/view.user.php';
class user{
private $model;
private $view;

 public function __construct() {
    $this->model =new modeluser();
    $this->view=new viewuser();
}
function mostrarlogin(){
$this->view->mostrarlogin();
}
function login(){
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        return $this->view->mostrarlogin('Falta completar el nombre de usuario');
    }

    if (!isset($_POST['password']) || empty($_POST['password'])) {
        return $this->view->mostrarlogin('Falta completar la contraseña');
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
}


}
?>