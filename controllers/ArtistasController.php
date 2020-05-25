<?php 
class ArtistasController extends DB{

    function __construct()
    {
        
    }
    function getArtistas(){
        return $this->selectAll("SELECT * FROM artistas");
    }
    function getArtistasByParametro($param)
    {
        return $this->selectAll("SELECT * FROM artistas where nombre Like '%$param%'");
    } 

    function getArtista($id){
        return $this->selectAll("SELECT * FROM artistas where id_artista = '$id'")->fetch(PDO::FETCH_ASSOC);
    }
    public function agregarArtista()
    {
        //Obtener la informacion del formulario
        $nombre = $_REQUEST['nombre'];
        $imagen = $_REQUEST['imagen'];
        $biografia = $_REQUEST['biografia'];

        //Juntamos la informacion para poder hacer el update
        $data = [
            'nombre' => $nombre,
            'imagen' => $imagen,
            'biografia' => $biografia
        ];
        //Creamos la sentencia SQL para hacer el update
        $sql = "INSERT INTO artistas (nombre, imagen, biografia) VALUES (:nombre, :imagen, :biografia)";
        $this->setAll($sql, $data);
        header("Location: conf-artistas.php");
    }

    public function eliminarArtista($id){
        $result = $this->selectAll("DELETE FROM artistas WHERE id_artista = '$id'");
        header("Location: conf-artistas.php");
     }

}
