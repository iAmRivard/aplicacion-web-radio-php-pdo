<?php

class ListasController extends DB
{

    function __construct()
    {
    }

    function getListas()
    {
        return $this->selectAll("SELECT * FROM listas_semanales");
    }

    function getListasByParametro($param)
    {
        return $this->selectAll("SELECT * FROM listas_semanales where nombre Like '%$param%'");
    }

    function getLista($id)
    {
        return $this->selectAll("SELECT * FROM listas_semanales where id_lista = '$id'")->fetch(PDO::FETCH_ASSOC);
    }

    function staffId($id)
    {
        return $this->staffById($id);
    }


    public function updateLista()
    {
        //Obtener la informacion del formulario
        $nombre = $_REQUEST['nombre'];
        $playlist = $_REQUEST['playlist'];
        $id_lista = $_REQUEST['id_lista'];


        //Juntamos la informacion para poder hacer el update
        $data = [
            'nombre' => $nombre,
            'playlist' => $playlist,
            'id_lista' => $id_lista
        ];
        //Creamos la sentencia SQL para hacer el update
        $sql = "UPDATE listas_semanales SET nombre=:nombre, playlist=:playlist WHERE id_lista=:id_lista";
        $this->setAll($sql, $data);
        header("Location: edit-lista.php?lista=$id_lista");
    }

    public function agregarLista()
    {

        //Obtener la informacion del formulario
        $nombre = $_REQUEST['nombre'];
        $playlist = $_REQUEST['playlist'];

        //Juntamos la informacion para poder hacer el update
        $data = [
            'nombre' => $nombre,
            'playlist' => $playlist,
        ];
        //Creamos la sentencia SQL para hacer el update

        $sql = "INSERT INTO listas_semanales (nombre, playlist) VALUES (:nombre, :playlist)";
        $this->setAll($sql, $data);
        header("Location: conf-listas.php");
    }

    public function eliminarLista($id)
    {

        try {
            $result = $this->selectAll("DELETE FROM listas_semanales WHERE id_lista = '$id'");
            header("Location: conf-listas.php");
        } catch (\Throwable $th) {
            header("Location: conf-listas.php?err");

        }
    }
}
