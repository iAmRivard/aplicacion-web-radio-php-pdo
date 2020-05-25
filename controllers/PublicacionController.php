<?php 
require_once('../model/database.php'); 
class PublicacionController extends DB {
    function __construct(){
    }
    //Buscamos contenidos por ID
    function getPublicacion($id){
        try {
            return $this->selectAll("SELECT * FROM contenido where id_contenido = $id")->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            //Si no encuentra la contenidos retorna null
            return null;
        }
    } 
    //Busca el Staff por ID
    function staffId($id){
        return $this->staffById($id);
    }

}

?>