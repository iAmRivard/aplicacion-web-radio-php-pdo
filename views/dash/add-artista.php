<?php
//Verificamos que el usuario se encuentre activo
require_once('session.php');
$session = new Session();
if ($session->getActivo()) {
    require_once('../../includes/head-dashboard.php');
    require_once('../../includes/menu-dashboard.php');
    //Importamos el model y PublicacionesControllerr
    require_once('../../model/database.php');
    require_once('../../controllers/ArtistasController.php');
    $view = new ArtistasController();
    //Verifica que se modifico
    if (isset($_REQUEST['submit'])) {
        //Hace el update
        $view->agregarArtista();
    }
?>

    <div class="container">
        <h2>Agregar un nuevo artista<small></small></h2>
        <hr>
        <form action="add-artista.php" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Nombre del artista</label>
                        <input type="text" class="form-control" value="" name="nombre" required>
                    </div>
                    <div class="col-md-6">
                        <label>URL de la imagen (verificar que sea url valido)</label>
                        <input type="text" class="form-control" value="" name="imagen" required>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label>Biografia del artista</label>
                <textarea class="form-control" rows="8" name="biografia" required></textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Agregar">
        </form>
    </div>
    <!-- Se manda a llamar a la tabla publicaciones para utilizar las datatables-->

    <?php // Se requiere los assets (archivos de JavaScript)
    require_once('../../includes/assets-dashboard.php'); ?>
    </body>

    </html>
<?php
} else {
    header("Location: ../entrar.php");
}
?>