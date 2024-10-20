<?php
include_once 'models/model.marcas.php';
include_once 'views/view.marcas.php';
class marcascontroller{
private $view;
private $model;
 public function __construct($response) {
   $this->model = new modelmarcas();
   $this->view = new viewmarcas($response->user);

}
function getmarcas(){
  $marcas=$this->model->obtenermarcas();
    $this->view->listarmarcas($marcas);
}
function insertarmarcas(){
  $marca=$_POST['nombre_de_marca'];
  $direccion=$_POST['direccion'];
  if (!empty($marca)&&!empty($direccion)) {
    $this->model->insertar($marca,$direccion);
  }
  if (empty($marca)||empty($direccion)) {
    $this->view->error();
  }
  header("Location: " . BASE_URL . "instrumentos");
}
function deletemarcas($id){
$this->model->borrarmarca($id);
header("Location: " . BASE_URL . "marcas");
}
function updatemarcas($id){
  require 'templates/form.updatemarcas.phtml';
}
function updatemarcas1() {
      if (isset($_POST['nombre_de_marca']) && !empty($_POST['nombre_de_marca'])&&isset($_POST['ID_MARCAS']) && !empty($_POST['ID_MARCAS'])) {
          $nuevonombre = $_POST['nombre_de_marca'];
          $direccion=$_POST['direccion'];
          $id=$_POST['ID_MARCAS'];
          // Llamar al método update del modelo
          $this->model->update($nuevonombre, $id,$direccion);
          header("Location: " . BASE_URL . "marcas");
       } // Redirigir a la lista de instrumentos
      }
function showitemspormarca($id){
  $items=$this->model->getItemsByMarca($id);
  $this->view->showitembymarca($items);
} 
}

?>