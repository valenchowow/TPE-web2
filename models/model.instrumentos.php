<?php
require_once 'models/model.php';
class instrumentosmodel extends model{
 
    function getinstrumentos(){
        //consultamos
        $sentencia = $this->db->prepare("SELECT * FROM instrumentos");
        $sentencia->execute();
        //obtenemos la respuesta
        $instrumentos=$sentencia->fetchAll(PDO::FETCH_OBJ);
        return $instrumentos;
    }
    public function insertar($instrumentos, $precio, $stock, $ID_MARCAS) {
    
        $sentencia = $this->db->prepare("INSERT INTO instrumentos (instrumento, precio, stock, ID_MARCAS) VALUES (?, ?, ?, ?)");
        
 
        $sentencia->execute([$instrumentos, $precio, $stock, $ID_MARCAS]);
    

        return $this->db->lastInsertId();
    }
    
    function borrar($id){
        $sentencia=$this->db->prepare("DELETE FROM instrumentos WHERE id=?");
        $sentencia->execute(array($id));
        }

    function update($instrumentoo,$precio,$stock,$id) {
            $sentencia = $this->db->prepare("UPDATE instrumentos SET instrumento = ?, precio = ? , stock = ? WHERE id=?");
            $update= $sentencia->execute([$instrumentoo,$precio,$stock,$id]);
            return $update;
    }
    function getdetalle($id){
        $sentencia = $this->db->prepare("SELECT * FROM instrumentos WHERE id=?");
        $sentencia->execute([$id]);
        //obtenemos la respuesta
        $detalle=$sentencia->fetchAll(PDO::FETCH_OBJ);
        return $detalle;
    }
    function getItemsByMarca($id) { 
        $query = $this->db->prepare("SELECT * FROM instrumentos WHERE ID_MARCAS = ?");
        $query->execute([$id]);
         $itemspormarca=$query->fetchAll(PDO::FETCH_OBJ);
         return $itemspormarca;
    }
    function getmarcas(){
        $query = $this->db->prepare("SELECT * FROM marcas_de_instrumento");
        $query->execute();
         $itemspormarca=$query->fetchAll(PDO::FETCH_OBJ);
         return $itemspormarca;
    }
}

?>