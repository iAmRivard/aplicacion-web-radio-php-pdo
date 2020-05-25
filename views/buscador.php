<?php

$param =  $_REQUEST['parametro'];
$tipo =  $_REQUEST['tipo'];
if ($tipo == 1) {
    require_once('../model/database.php');
    require_once('../controllers/ListasController.php');
    $view = new ListasController();
    $data = $view->getListasByParametro($param);

    $resultados = array();
    foreach ($data as $d) {
        array_push($resultados, array('id' => $d['id_lista'], 'nombre' => $d['nombre'], 'playlist' => $d['playlist']));
    }
    $a = array($resultados);
    echo json_encode($a);
}

if ($tipo == 2) {
    require_once('../model/database.php');
    require_once('../controllers/ArtistasController.php');
    $view = new ArtistasController();
    $data = $view->getArtistasByParametro($param);

    $resultados = array();
    foreach ($data as $d) {
        array_push($resultados, array('id' => $d['id_artista'], 'nombre' => $d['nombre'], 'imagen' => $d['imagen']));
    }
    $a = array($resultados);
    echo json_encode($a);
}

if ($tipo == 3) {
    require_once('../model/database.php');
    require_once('../controllers/PublicacionesController.php');
    $view = new PublicacionesController();
    $data = $view->getPublicacionesByParametro($param);

    $resultados = array();
    foreach ($data as $d) {
        array_push($resultados, array('id' => $d['id_contenido'], 'nombre' => $d['titulo'], 'imagen' => $d['imagen']));
    }
    $a = array($resultados);
    echo json_encode($a);
}
