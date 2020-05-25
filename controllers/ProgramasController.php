<?php

class ProgramasController extends DB
{

    function __construct()
    {
    }

    function getProgramas()
    {
        return $this->selectAll("SELECT * FROM programas");
    }

    function getPrograma($id)
    {
        return $this->selectAll("SELECT * FROM programas where id_programa = '$id'")->fetch(PDO::FETCH_ASSOC);
    }

    function staffId($id)
    {
        return $this->staffById($id);
    }


    public function updatePrograma()
    {
        //Obtener la informacion del formulario
        $id_programa = $_REQUEST['id_programa'];
        $nombre = $_REQUEST['nombre'];
        $imagen = $_REQUEST['imagen'];
        $hora_inicio = $_REQUEST['appt1'];
        $hora_final = $_REQUEST['appt2'];
        //Juntamos la informacion para poder hacer el update
        $data = [
            'nombre' => $nombre,
            'hora_inicio' => $hora_inicio,
            'hora_final' => $hora_final,
            'imagen' => $imagen,
            'id_programa' => $id_programa,
        ];
        //Creamos la sentencia SQL para hacer el update
        $sql = "UPDATE programas SET nombre=:nombre, hora_inicio=:hora_inicio,hora_final=:hora_final, imagen=:imagen WHERE id_programa=:id_programa";
        $this->setAll($sql, $data);
        header("Location: edit-programas.php?programa=$id_programa");
    }

    public function agregarPrograma()
    {
        //Buscamos al usuario en session(staff)
        $staff = $this->staffByUsername($_SESSION['usuario']);
        $id_staff = $staff['id_staff'];

        //Obtener la informacion del formulario
        $titulo = $_REQUEST['titulo'];
        $imagen = $_REQUEST['imagen'];
        $hora_inicio = $_REQUEST['appt1'];
        $hora_final = $_REQUEST['appt2'];

        //Juntamos la informacion para poder hacer el update
        $data = [
            'nombre' => $titulo,
            'hora_inicio' => $hora_inicio,
            'hora_final' => $hora_final,
            'imagen' => $imagen,
            'id_staff' => $id_staff
        ];
        //Creamos la sentencia SQL para hacer el update

        $sql = "INSERT INTO programas (nombre, imagen,hora_inicio,hora_final,id_staff) VALUES (:nombre,:imagen,:hora_inicio,:hora_final,:id_staff)";
        $this->setAll($sql, $data);
        header("Location: conf-programas.php");
    }

    public function eliminarPrograma($id)
    {
        $result = $this->selectAll("DELETE FROM programas WHERE id_programa= '$id'");
        header("Location: conf-programas.php");
    }
}
