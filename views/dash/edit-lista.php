<?php
//Verificamos que el usuario se encuentre activo
require_once('session.php');
$session = new Session();
if ($session->getActivo()) {
    //Verificamos que envie el id de la publicacion a editar y que sea numero
    if ($_REQUEST['lista'] && is_numeric($_REQUEST['lista'])) {
        $id_lista = $_REQUEST['lista'];
        require_once('../../includes/head-dashboard.php');
        require_once('../../includes/menu-dashboard.php');
        //Importamos el model y ListasController
        require_once('../../model/database.php');
        require_once('../../controllers/ListasController.php');
        $view = new ListasController();
        $data = $view->getLista($id_lista);
        //Verifica que se modifico
        if (isset($_REQUEST['submit'])) {
            //Hace el update
            $view->updateLista();
        }
?>

        <div class="container">
            <h2>Lista <small> <?php echo $data['nombre'];?> </small></h2>
            <hr>
            <form action="edit-lista.php?lista=<?php echo $data['id_lista'];?>" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Titulo de la lista</label>
                            <input type="hidden" value="<?php echo $data['id_lista'];?>" name="id_lista">
                            <input type="text" class="form-control" value="<?php echo $data['nombre'];?>" name="nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label>URL Embled de Spotify</label>
                            <input type="text" class="form-control" value="<?php echo $data['playlist'];?>" name="playlist" required>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Modficar">
            </form>
        </div>
        <!-- Se manda a llamar a la tabla publicaciones para utilizar las datatables-->

        <?php // Se requiere los assets (archivos de JavaScript)
        require_once('../../includes/assets-dashboard.php'); ?>
        </body>

        </html>
<?php
    } else {
        header("Location: conf-publicaciones.php");
    }
} else {
    header("Location: ../entrar.php");
}
?>