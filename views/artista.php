<?php
//Valida que el parametro enviado sea numerico y exista
if ($_GET['artista'] && is_numeric($_GET['artista'])) {
    require_once('../model/database.php');
    require_once('../controllers/ArtistasController.php');
    $id = $_GET['artista'];
    //Instanciamos al controlador
    $view = new ArtistasController();
    //Verifica si existe el contenido
    if ($view->getArtista($id)) {
        //Guardamos en la variable $data la informacion del contenido
        $data = $view->getArtista($id);
        //Incluimos el head
        require_once('../includes/shared/head.php');
?>
        <div class="wrapper d-flex align-items-stretch">
            <!-- Incluimos el menu -->
            <?php require_once('../includes/shared/menu.php'); ?>
            <!-- Inicio del contenido -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4"><?php echo $data['nombre']; ?> </h2>

                <div class="card mb-3">
                    <img src="<?php echo $data['imagen']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['nombre']; ?></h5>
                        <p class="card-text"><?php echo $data['biografia']; ?></p>
                        <a href="artistas.php">
                            <button class="btn btn-outline-danger float-lg-right"> Regresar </button>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Fin del contenido del contenido -->
        </div>
        <?php // Se requiere los assets (archivos de JavaScript)
        require_once('../includes/shared/assets.php'); ?>
        </body>

        </html>

<?php
    } else {
        //Si no existe el contenido lo devuelve al inicio
        header("Location: inicio.php");
    }
} else {
    header("Location: inicio.php");
}
?>