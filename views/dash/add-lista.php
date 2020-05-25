<?php
//Verificamos que el usuario se encuentre activo
require_once('session.php');
$session = new Session();
if ($session->getActivo()) {
        require_once('../../includes/head-dashboard.php');
        require_once('../../includes/menu-dashboard.php');
        //Importamos el model y PublicacionesControllerr
        require_once('../../model/database.php');
        require_once('../../controllers/ListasController.php');
        $view = new ListasController();
        //Verifica que se modifico
        if (isset($_REQUEST['submit'])) {
            //Hace el update
            $view->agregarLista();
        }
?>

        <div class="container">
            <h2>Agregar una nueva lista <small></small></h2>
            <hr>
            <form action="add-lista.php" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Titulo de la lista</label>
                            <input type="text" class="form-control" value="" name="nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label>URL Embled de Spotify</label>
                            <input type="text" class="form-control" value="" name="playlist" required>
                        </div>
                    </div>

                </div>
                <input style="float: right" type="submit" name="submit" class="btn btn-primary" value="Agregar">
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