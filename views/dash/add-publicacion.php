<?php
//Verificamos que el usuario se encuentre activo
require_once('session.php');
$session = new Session();
if ($session->getActivo()) {
        require_once('../../includes/head-dashboard.php');
        require_once('../../includes/menu-dashboard.php');
        //Importamos el model y PublicacionesControllerr
        require_once('../../model/database.php');
        require_once('../../controllers/PublicacionesController.php');
        $view = new PublicacionesController();
        //Verifica que se modifico
        if (isset($_REQUEST['submit'])) {
            //Hace el update
            $view->agregarPublicacion();
        }
?>

        <div class="container">
            <h2>Agregar una nueva publicacion <small></small></h2>
            <hr>
            <form action="add-publicacion.php" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Titulo de la publicacion</label>
                            <input type="text" class="form-control" value="" name="titulo" required>
                        </div>
                        <div class="col-md-6">
                            <label>URL de la imagen (verificar que sea url valido)</label>
                            <input type="text" class="form-control" value="" name="imagen" required>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label>Contenido (tambien puede ingresar codigo html)</label>
                    <textarea class="form-control" rows="8" name="contenido" required></textarea>
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