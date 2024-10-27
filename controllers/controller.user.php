<?php
    require_once 'models/model.user.php';
    require_once 'views/view.user.php';
class user{
private $model;
private $view;

 public function __construct($response) {
    $this->model=new usermodel();
    $this->view=new viewuser($response->user);
}
function mostrarlogin(){
$this->view->mostrarlogin();
}
function login(){
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        return $this->view->mostrarlogin('Falta completar el nombre de usuario');
    }

    if (!isset($_POST['contraseña']) || empty($_POST['contraseña'])) {
        return $this->view->mostrarlogin('Falta completar la contraseña');
    }
    $email = $_POST['email'];
    $password = $_POST['contraseña'];

    $data=$this->model->mostrarporusuario($email);
    if ($data && password_verify($password,$data->contraseña)) {
        session_start();
        $_SESSION['ID_USER'] = $data->id_usuario;
        $_SESSION['EMAIL_USER'] = $data->email;
        $_SESSION['LAST_ACTIVITY'] = time();
        header("Location: " . BASE_URL . "instrumentos");
    }
    else{
        $this->view->mostrarlogin("CRENDENCIALES INCORRECTAS");
    }
}
function logout(){
session_start();
session_destroy();
header("Location: " . BASE_URL . "login");
}

}
?>