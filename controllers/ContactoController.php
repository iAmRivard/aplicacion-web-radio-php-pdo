<?php
class ContactoController extends DB
{
    function __construct()
    {
    }

    public function getMensajes()
    {
        return $this->selectAll("SELECT * FROM contacto");
    }

    function getMensaje($id)
    {
        return $this->selectAll("SELECT * FROM contacto where id_mensaje = '$id'")->fetch(PDO::FETCH_ASSOC);
    }

    public function nuevoMensaje()
    {
        //Obtener la informacion del formulario
        $nombre = $_REQUEST['nombre'];
        $correo = $_REQUEST['correo'];
        $asunto = $_REQUEST['asunto'];
        $mensaje = $_REQUEST['mensaje'];

        //Juntamos la informacion para poder hacer el update
        $data = [
            'nombre' => $nombre,
            'correo' => $correo,
            'asunto' => $asunto,
            'mensaje' => $mensaje
        ];
        //Creamos la sentencia SQL para hacer el update
        try {
            $sql = "INSERT INTO contacto (nombre, correo, asunto,mensaje) 
                    VALUES (:nombre, :correo, :asunto,:mensaje)";
            $this->setAll($sql, $data);
            echo "<div class='alert alert-succes float-lg-right'> Correo enviado con extito porfavor espera la respuesta en 
           <strong> $correo </strong> , las respuestas se suelen dar en un transcurso de 24hrs.</div>";
        } catch (\Throwable $th) {
        }
    }

    public function eliminarMensaje($id)
    {
        $result = $this->selectAll("DELETE FROM contacto WHERE id_mensaje = '$id'");
        header("Location: dashboard.php");
    }

    public function enviarMensaje($to,$message)
    {
        $subject = "Asunto del email";
        $headers = "From: radio@gmail.com" . "\r\n" . "CC: $to";

       // mail($to, $subject, $message, $headers);
       echo "<p class='text-center'>Correo enviado exitosamente.</p>";

    }
}
