<?php
function verify($response){
  session_start();
  if (isset($_SESSION['ID_USER'])) {
    $response->user=new stdClass();
    $response->user->id_usuario=$_SESSION['ID_USER'];
    $response->user->email=$_SESSION['EMAIL_USER'];
    return;
  }
  else if ($_GET['action']=='instrumentos'||$_GET['action']=='marcas'||$_GET['action']=='mostrarmas'){
    return;
  }
  else{
    header("Location: " . BASE_URL . "showlogin");
    die();
  }
}
?>