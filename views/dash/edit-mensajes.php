<?php
//Verificamos que el usuario se encuentre activo
require_once('session.php');
$session = new Session();
if ($session->getActivo()) {
    //Verificamos que envie el id de la publicacion a editar y que sea numero
    if ($_REQUEST['mensaje'] && is_numeric($_REQUEST['mensaje'])) {
        $id_publicacion = $_REQUEST['mensaje'];
        require_once('../../includes/head-dashboard.php');
        require_once('../../includes/menu-dashboard.php');
        //Importamos el model y PublicacionesControllerr
        require_once('../../model/database.php');
        require_once('../../controllers/ContactoController.php');
        $view = new ContactoController();
        $data = $view->getMensaje($id_publicacion);
        //Verifica que se envio
        if (isset($_REQUEST['submit'])) {
            $view->enviarMensaje($_REQUEST['correo'],$_REQUEST['respuesta']);
        }

?>

        <div class="container">
            <h2>Responder mensaje a <small><?php echo $data['correo']; ?></small></h2>
            <hr>
            <form method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Enviado por: </label>
                            <input type="hidden" value="<?php echo $data['id_mensaje']; ?>" name="id_contenido">
                            <input type="text" class="form-control" disabled value="<?php echo $data['nombre']; ?>" name="titulo" required>
                        </div>
                        <div class="col-md-6">
                            <label>Enviado desde: </label>
                            <input type="text" class="form-control" value="<?php echo $data['correo']; ?>" name="correo" required>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label>Asunto</label>
                    <textarea class="form-control" rows="5" name="asunto" required disabled><?php echo $data['asunto']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Respuesta</label>
                    <textarea class="form-control" rows="8" name="respuesta" required></textarea>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Responder">
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