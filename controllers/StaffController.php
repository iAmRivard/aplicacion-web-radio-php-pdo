<?php
class StaffController extends DB
{

    function __construct()
    {
    }
    function getStaff()
    {
        return $this->selectAll("SELECT * FROM staff");
    }

    public function eliminarStaff($id)
    {
        try {
            $result = $this->selectAll("DELETE FROM staff WHERE id_staff = '$id'");
            header("Location: conf-staffs.php");
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public function updatePublicacion()
    {
        //Obtener la informacion del formulario
        $nombre = $_REQUEST['nombre'];
        $clave = $_REQUEST['clave'];
        $imagen = $_REQUEST['imagen'];
        $id_staff = $_REQUEST['id_staff'];
        $descripcion = $_REQUEST['descripcion'];

        //Juntamos la informacion para poder hacer el update
        $data = [
            'nombre' => $nombre,
            'clave' => password_hash($clave, PASSWORD_BCRYPT),
            'imagen' => $imagen,
            'descripcion' => $descripcion,
            'id_staff' => $id_staff
        ];
        //Creamos la sentencia SQL para hacer el update
        $sql = "UPDATE staff SET nombre=:nombre, clave=:clave, imagen=:imagen,descripcion=:descripcion  WHERE id_staff=:id_staff";
        $this->setAll($sql, $data);
        header("Location: edit-staff.php?staff=$id_staff");
    }


    public function agregarStaff()
    {
        //Obtener la informacion del formulario
        $nombre = $_REQUEST['nombre'];
        $imagen = $_REQUEST['imagen'];
        $usuario = $_REQUEST['usuario'];
        $clave = $_REQUEST['clave'];
        $descripcion = $_REQUEST['descripcion'];

        //Juntamos la informacion para poder hacer el update
        $data = [
            'nombre' => $nombre,
            'imagen' => $imagen,
            'usuario' => $usuario,
            'clave' =>  password_hash($clave, PASSWORD_BCRYPT),
            'descripcion' => $descripcion
        ];
        //Creamos la sentencia SQL para hacer el update
        try {
            $sql = "INSERT INTO staff (nombre, imagen, usuario,clave,descripcion) 
                    VALUES (:nombre, :imagen, :usuario,:clave,:descripcion)";
            $this->setAll($sql, $data);
            header("Location: conf-staffs.php");
        } catch (\Throwable $th) {
           

            
        }
    }
}
