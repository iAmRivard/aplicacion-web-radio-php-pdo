<?php
//Verificamos que el usuario se encuentre activo
require_once('session.php');
$session = new Session();
if ($session->getActivo()) {
    //Verificamos que envie el id de la publicacion a editar y que sea numero
    if ($_REQUEST['programa'] && is_numeric($_REQUEST['programa'])) {
        $id_programa = $_REQUEST['programa'];
        require_once('../../includes/head-dashboard.php');
        require_once('../../includes/menu-dashboard.php');
        //Importamos el model y PublicacionesControllerr
        require_once('../../model/database.php');
        require_once('../../controllers/ProgramasController.php');
        $view = new ProgramasController();
        $data = $view->getPrograma($id_programa);
        //Verifica que se modifico
        if (isset($_REQUEST['submit'])) {
            //Hace el update
            $view->updatePrograma();
        }
?>

        <div class="container">
            <h2>Programa <small><?php echo $data['nombre']; ?></small></h2>
            <hr>
            <form action="edit-programas.php?programa=<?php echo $data['id_programa']; ?>" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Titulo del programa</label>
                            <input type="hidden" value="<?php echo $data['id_programa']; ?>" name="id_programa">
                            <input type="text" class="form-control" value="<?php echo $data['nombre']; ?>" name="nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label>URL de la imagen (verificar que sea url valido)</label>
                            <input type="text" class="form-control" value="<?php echo $data['imagen']; ?>" name="imagen" required>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Hora de inicio del programa: </label>
                            <input type="time" id="appt" name="appt1" required value="<?php echo $data['hora_inicio']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label>Hora del final del programa: </label>
                            <input type="time" id="appt" name="appt2" required value="<?php echo $data['hora_final']; ?>">
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