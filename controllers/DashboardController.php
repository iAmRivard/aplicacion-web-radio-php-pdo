<?php
require_once('../../model/database.php');
class DashboardController extends DB
{
    function __construct()
    {
    }
    // Funciones del Inicio
    public function getDataInicio()
    {
        return $this->selectAll("SELECT * FROM inicio")->fetch(PDO::FETCH_ASSOC);
    }

    public function getListas(){
        return $this->selectAll("SELECT * FROM listas_semanales");
    }


    public function updateInicio()
    {
        //Obtener la informacion del formulario
        $titulo_inicio = $_REQUEST['titulo_inicio'];
        $encabezado_inicio = $_REQUEST['encabezado_inicio'];
        $leyenda_inicio = $_REQUEST['leyenda_inicio'];
        $nombre_btn_inicio = $_REQUEST['nombre_btn_inicio'];
        $url_btn_inicio = $_REQUEST['url_btn_inicio'];
        $descripcion_inicio = $_REQUEST['descripcion_inicio'];
        $id_inicio = $_REQUEST['id_inicio'];
        $id_lista = $_REQUEST['id_lista'];


        //Juntamos la informacion para poder hacer el update
        $data = [
            'titulo_inicio' => $titulo_inicio,
            'encabezado_inicio' => $encabezado_inicio,
            'leyenda_inicio' => $leyenda_inicio,
            'nombre_btn_inicio' => $nombre_btn_inicio,
            'url_btn_inicio' => $url_btn_inicio,
            'descripcion_inicio' => $descripcion_inicio,
            'id_inicio' => $id_inicio,
            'id_lista' => $id_lista
        ];
        //Creamos la sentencia SQL para hacer el update
        $sql = "UPDATE inicio SET titulo_inicio=:titulo_inicio, encabezado_inicio=:encabezado_inicio, leyenda_inicio=:leyenda_inicio,
         nombre_btn_inicio=:nombre_btn_inicio, url_btn_inicio=:url_btn_inicio,descripcion_inicio=:descripcion_inicio,id_lista=:id_lista
         WHERE id_inicio=:id_inicio";
        $this->setAll($sql, $data);
        header("Location: conf-inicio.php");
    }
}
