<?php
require_once('../model/database.php'); 
class InicioController extends DB {
    function __construct() {
    }

    function getInicio(){
        return $this->selectAll("SELECT * FROM inicio")->fetch(PDO::FETCH_ASSOC);
    }
    //Optiene las ultimas publicacion 
    function getUltimasP(){
        return $this->selectAll("SELECT * FROM contenido order by id_contenido desc limit 3");
    }
    //Busca el Staff por ID
    function staffId($id){
        return $this->staffById($id);
    }

    function getListaSemana(){
        return $this->selectAll("SELECT * FROM listas_semanales limit 1")->fetch(PDO::FETCH_ASSOC);
    }
    function getListaById($id){
        return $this->selectAll("SELECT * FROM listas_semanales where id_lista = '$id'")->fetch(PDO::FETCH_ASSOC);
    }

    public function getArtistas(){
        return $this->selectAll("SELECT * FROM artistas limit 10");
    }

}


?>