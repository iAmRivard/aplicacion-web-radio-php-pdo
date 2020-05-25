<?php
class DB
{
    const DBHOSTNAME = "localhost";
    const DBUSER = "root";
    const DBPASS = "";
    const DBDATABASE = "radio";
    const CHARSET = "utf8";

    public function create_connection()
    {
        try {
            @$connection = new PDO("mysql:host=" . self::DBHOSTNAME . ";dbname=" . self::DBDATABASE . ";charset=" . self::CHARSET, self::DBUSER, self::DBPASS);
            //Configuramos que PDO pueda lanzar exepciones
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            echo "Error en la conexión: ", $e->getMessage();
        }
    }
    //Metodo para enviarle consultas SQL
    public function selectAll($sql)
    {
        $statement = $this->create_connection()->prepare($sql);
        $statement->execute();
        return $statement;
    }
    //Metodo para enviarle consultas sql y data
    public function setAll($sql,$data)
    {
        $statement = $this->create_connection()->prepare($sql)->execute($data);
        return $statement;
    }

    //Metodo general para obtener el staff por id
    public function staffById($id)
    {
        return $this->selectAll("SELECT * FROM staff where id_staff = $id")->fetch(PDO::FETCH_ASSOC);
    }
    //Metedo general para obtener el staff por user
    public function staffByUsername($user)
    {
        return $this->selectAll("SELECT * FROM staff where usuario = '$user'")->fetch(PDO::FETCH_ASSOC);
    }
    //Metodo parar cerrar la conexion
    public function close_connection($connection)
    {
        $connection = null;
    }
}
