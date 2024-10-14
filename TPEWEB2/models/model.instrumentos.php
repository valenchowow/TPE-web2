<?php
class instrumentosmodel{
   private function connect(){
        $db = new PDO('mysql:host=localhost;dbname=tienda_de_instrumentos;charset=utf8', 'root', '');
    return $db;
    }
    function getinstrumentos(){
        //abro la conexion
        $db = $this-> connect();
        //consultamos
        $sentencia = $db->prepare("SELECT * FROM instrumentos");
        $sentencia->execute();
        //obtenemos la respuesta
        $instrumentos=$sentencia->fetchAll(PDO::FETCH_OBJ);
        return $instrumentos;
    }
    function insertar($instrumentos,$precio,$stock, $ID_MARCAS) {
        $db = $this->connect();
        // Prepara la consulta
        $sentencia = $db->prepare("INSERT INTO instrumentos (instrumento,precio,stock, ID_MARCAS) VALUES (?, ?, ?, ?)");
        $sentencia->execute([$instrumentos,$precio,$stock,$ID_MARCAS]);
        //devuelvo el id
        return $db->lastInsertId();
    }
    function borrar($id){
        $db = $this->connect();
        $sentencia=$db->prepare("DELETE FROM instrumentos WHERE id=?");
        $sentencia->execute(array($id));
        }

    function update($instrumentoo,$precio,$stock,$id) {
        var_dump($id,$instrumentoo,$precio,$stock);
            $db = $this->connect();
            $sentencia = $db->prepare("UPDATE instrumentos SET instrumento = ?, precio = ? , stock = ? WHERE id=?");
            $update= $sentencia->execute([$instrumentoo,$precio,$stock,$id]);
            return $update;
    }
    function getdetalle($id){
        //abro la conexion
        $db = $this-> connect();
        //consultamos
        $sentencia = $db->prepare("SELECT * FROM instrumentos WHERE id=?");
        $sentencia->execute([$id]);
        //obtenemos la respuesta
        $detalle=$sentencia->fetchAll(PDO::FETCH_OBJ);
        return $detalle;
    }
    function getItemsByMarca($id) { 
        $db=$this->connect();
        $query = $db->prepare("SELECT * FROM instrumentos WHERE ID_MARCAS = ?");
        $query->execute([$id]);
         $itemspormarca=$query->fetchAll(PDO::FETCH_OBJ);
         return $itemspormarca;
    }
    function getmarcas(){
        $db=$this->connect();
        $query = $db->prepare("SELECT * FROM marcas_de_instrumento");
        $query->execute();
         $itemspormarca=$query->fetchAll(PDO::FETCH_OBJ);
         return $itemspormarca;
    }
}

?>