<?php 
class Session{
    private $session;
    function __construct()
    {   
       
        session_start(); 
        if (isset($_SESSION["activo"])) {
           $this->session = true;
        }
    }

    public function getActivo(){
        return $this->session;
    }
}
?>