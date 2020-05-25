<?php
//Valida que el parametro enviado sea numerico y exista
if ($_GET['publicacion'] && is_numeric($_GET['publicacion'])) {

    require_once('../controllers/PublicacionController.php');
    $id = $_GET['publicacion'];
    //Instanciamos al controlador
    $view = new PublicacionController();
    //Verifica si existe el contenido
    if ($view->getPublicacion($id)) {
        //Guardamos en la variable $data la informacion del contenido
        $data = $view->getPublicacion($id);
        //Buscamps al staff por id
        $staff = $view->staffId($data['id_staff']);
        //Incluimos el head
        require_once('../includes/shared/head.php');
?>
        <div class="wrapper d-flex align-items-stretch">
            <!-- Incluimos el menu -->
            <?php require_once('../includes/shared/menu.php'); ?>
            <!-- Inicio del contenido -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4"><?php echo $data['titulo']; ?> </h2>

                <div class="card mb-3">
                    <img src="<?php echo $data['imagen']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['titulo']; ?></h5>
                        <p class="card-text"><?php echo $data['contenido']; ?></p>
                        <a href="publicaciones.php">
                            <button class="btn btn-outline-danger float-lg-right"> Regresar </button>
                        </a>
                        <p class="card-text"><small class="text-muted">Publicado por:
                                <?php echo $staff['nombre']; ?></small></p>
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