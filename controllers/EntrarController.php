<?php
if (isset($_POST["submit"])) {
    require_once('../model/database.php');
    class EntrarController extends DB
    {
        private $login;
        private $usuario;
        private $clave;

        function __construct()
        {
        }


        function validarLogin()
        {
            $this->usuario = trim($_POST['usuario']);
            $this->clave = $_POST['clave'];

            $sql = "SELECT * FROM staff where usuario = :usuario";
            $statement = $this->create_connection()->prepare($sql);
            $statement->bindParam(":usuario", $this->usuario);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);
 
            if (password_verify($this->clave,$user['clave'])) {
                $_SESSION["activo"] = true;
                $_SESSION["usuario"] = $this->usuario;
                header("Location: dash/dashboard.php");
            } else {
                $_SESSION["activo"] = false;
                session_destroy();
                echo "<p class='alert alert-danger float-lg-right'> Credenciales incorrectas.</p>";
            }
        }
    }

    function setLogin($l)
    {
        $this->login = $l;
    }


    $view = new EntrarController();
    $view->validarLogin();
}
