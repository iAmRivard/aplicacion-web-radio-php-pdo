

<?php

class PublicacionesController extends DB
{

    function __construct()
    {
    }

    function getPublicaciones()
    {
        return $this->selectAll("SELECT * FROM contenido");
    }
    function getPublicacionesByParametro($param)
    {
        return $this->selectAll("SELECT * FROM contenido where contenido Like '%$param%'");
    }

    function getPublicacion($id)
    {
        return $this->selectAll("SELECT * FROM contenido where id_contenido = '$id'")->fetch(PDO::FETCH_ASSOC);
    }

    function staffId($id)
    {
        return $this->staffById($id);
    }


    public function updatePublicacion()
    {
        //Obtener la informacion del formulario
        $titulo = $_REQUEST['titulo'];
        $contenido = $_REQUEST['contenido'];
        $imagen = $_REQUEST['imagen'];
        $id_contenido = $_REQUEST['id_contenido'];

        //Juntamos la informacion para poder hacer el update
        $data = [
            'titulo' => $titulo,
            'contenido' => $contenido,
            'imagen' => $imagen,
            'id_contenido' => $id_contenido,
        ];
        //Creamos la sentencia SQL para hacer el update
        $sql = "UPDATE contenido SET titulo=:titulo, contenido=:contenido, imagen=:imagen WHERE id_contenido=:id_contenido";
        $this->setAll($sql, $data);
        header("Location: edit-publicacion.php?publicacion=$id_contenido");
    }

    public function agregarPublicacion()
    {
        //Buscamos al usuario en session(staff)
        $staff = $this->staffByUsername($_SESSION['usuario']);
        $id_staff = $staff['id_staff'];

        //Obtener la informacion del formulario
        $titulo = $_REQUEST['titulo'];
        $contenido = $_REQUEST['contenido'];
        $imagen = $_REQUEST['imagen'];

        //Juntamos la informacion para poder hacer el update
        $data = [
            'titulo' => $titulo,
            'contenido' => $contenido,
            'imagen' => $imagen,
            'id_staff' => $id_staff
        ];
        //Creamos la sentencia SQL para hacer el update

        $sql = "INSERT INTO contenido (titulo, contenido, imagen,id_staff) VALUES (:titulo, :contenido, :imagen,:id_staff)";
        $this->setAll($sql, $data);
        header("Location: conf-publicaciones.php");
    }

    public function eliminarPublicacion($id)
    {
        $result = $this->selectAll("DELETE FROM contenido WHERE id_contenido = '$id'");
        header("Location: conf-publicaciones.php");
    }
}

