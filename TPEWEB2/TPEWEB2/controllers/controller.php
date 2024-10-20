<?php
include_once 'models/model.instrumentos.php';
include_once 'views/view.instrumentos.php';
class instrumentoscontroller {
private $view;
private $model;

function __construct($response){
  $this->model = new instrumentosmodel();
  $this->view = new viewinstrumentos($response->user);
}   
function showinstrumento(){
    //obtiene los pagos del modelo
    $instrumentosdb=$this->model->getinstrumentos();
    //llamamos a vista y mostramos
    $marcas=$this->model->getmarcas();
    $this->view->showinstrumentos($instrumentosdb,$marcas);
}
 function addinstrumentos() {
  include 'templates/form.insertarinstrumentos.phtml';
  $instrumento = $_POST['instrumento'];
  $precio = $_POST['precio'];
  $stock = $_POST['stock'];
  $ID_MARCAS = $_POST['ID_MARCAS'];
  // Validar campos obligatorios
  if (!empty($instrumento) &&!empty($precio) && !empty($stock) && !empty($ID_MARCAS)) {
    $id = $this->model->insertar($instrumento, $precio, $stock, $ID_MARCAS);
    header("Location: " . BASE_URL . "instrumentos");
  }
  else{
  $this->view->error($error="Todos los campos son obligatorios.");
  }

}

function deleteinstrumento($id){
  $this->model->borrar($id);
  header("Location: ".BASE_URL."instrumentos");
}
function updateinstrumento($id){
  require 'templates/form.instrumentos.update.phtml';
  }
  function update1(){
    if (isset($_POST['instrumento'], $_POST['precio'], $_POST['stock'])) {
      $instrumento= $_POST['instrumento'];
      $precio = $_POST['precio'];
      $stock = $_POST['stock'];
      $id=$_POST['id'];
      $this->model->update($instrumento,$precio,$stock,$id);
     header("Location: ".BASE_URL."instrumentos");
    
    }
  }
function detalle($id){
  $detalle=$this->model->getdetalle($id);
    $this->view->showdetalle($detalle); 
}
}

?>