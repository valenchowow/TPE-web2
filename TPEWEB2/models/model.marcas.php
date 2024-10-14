<?php
class modelmarcas{

function connect(){
    $db = new PDO('mysql:host=localhost;dbname=tienda_de_instrumentos;charset=utf8', 'root', '');
    return $db;
}
function obtenermarcas() {
$db=$this->connect();
$sentencia=$db->prepare("SELECT * FROM marcas_de_instrumento");
$sentencia->execute();
$marcas=$sentencia->fetchAll(PDO::FETCH_OBJ);
        return $marcas;
}
function insertar($marca,$direccion){
$db=$this->connect();
$sentencia=$db->prepare("INSERT INTO marcas_de_instrumento(nombre_de_marca,direccion)VALUES(?,?)");
$sentencia->execute([$marca,$direccion]);
return $db->lastInsertId();
}
function borrarmarca($id){
$db=$this->connect();
$sentencia=$db->prepare("DELETE FROM marcas_de_instrumento WHERE ID_MARCAS=?");
$sentencia->execute(array($id));
}
function update($nuevonombre, $id, $direccion) {
    if (isset($nuevonombre) && isset($id)) {
        try {
            $db = $this->connect();
            $sentencia = $db->prepare("UPDATE marcas_de_instrumento SET nombre_de_marca = ?, direccion = ? WHERE ID_MARCAS = ?");
            $sentencia->execute([$nuevonombre, $direccion, $id]);
            echo "Actualización exitosa.";
        } catch (PDOException $e) {
            echo "Error al actualizar la marca: " . $e->getMessage();
        }
    }
}

public function getItemsByMarca($id) { 
    $db=$this->connect();
    $query = $db->prepare("SELECT * FROM instrumentos WHERE ID_MARCAS = ?");
    $query->execute([$id]);
     $itemspormarca=$query->fetchAll(PDO::FETCH_OBJ);
     return $itemspormarca;
}
}
?>