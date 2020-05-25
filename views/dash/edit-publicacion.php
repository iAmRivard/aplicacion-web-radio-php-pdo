<?php
//Verificamos que el usuario se encuentre activo
require_once('session.php');
$session = new Session();
if ($session->getActivo()) {
    //Verificamos que envie el id de la publicacion a editar y que sea numero
    if ($_REQUEST['publicacion'] && is_numeric($_REQUEST['publicacion'])) {
        $id_publicacion = $_REQUEST['publicacion'];
        require_once('../../includes/head-dashboard.php');
        require_once('../../includes/menu-dashboard.php');
        //Importamos el model y PublicacionesControllerr
        require_once('../../model/database.php');
        require_once('../../controllers/PublicacionesController.php');
        $view = new PublicacionesController();
        $data = $view->getPublicacion($id_publicacion);
        //Verifica que se modifico
        if (isset($_REQUEST['submit'])) {
            //Hace el update
            $view->updatePublicacion();
        }
?>

        <div class="container">
            <h2>Publicacion <small></small></h2>
            <hr>
            <form action="edit-publicacion.php?publicacion=<?php echo $data['id_contenido'];?>" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Titulo de la publicacion</label>
                            <input type="hidden" value="<?php echo $data['id_contenido'];?>" name="id_contenido">
                            <input type="text" class="form-control" value="<?php echo $data['titulo'];?>" name="titulo" required>
                        </div>
                        <div class="col-md-6">
                            <label>URL de la imagen (verificar que sea url valido)</label>
                            <input type="text" class="form-control" value="<?php echo $data['imagen'];?>" name="imagen" required>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label>Contenido (tambien puede ingresar codigo html)</label>
                    <textarea class="form-control" rows="8" name="contenido" required><?php echo $data['contenido']; ?></textarea>
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