<?php
//Verificamos que el usuario se encuentre activo
require_once('session.php');
$session = new Session();
if ($session->getActivo()) {
    require_once('../../includes/head-dashboard.php');
    require_once('../../includes/menu-dashboard.php');
    //Importamos el model y PublicacionesControllerr
    require_once('../../model/database.php');
    require_once('../../controllers/ProgramasController.php');
    $view = new ProgramasController();
    //Verifica que se modifico
    if (isset($_REQUEST['submit'])) {
        //Hace el update
        $view->agregarPrograma();
    }
?>

    <div class="container">
        <h2>Agrega un nuevo programa <small></small></h2>
        <hr>
        <form action="add-programa.php" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Nombre del programa</label>
                        <input type="text" class="form-control" value="" name="titulo" required>
                    </div>
                    <div class="col-md-6">
                        <label>URL de la imagen (verificar que sea url valido)</label>
                        <input type="text" class="form-control" value="" name="imagen" required>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Hora de inicio del programa: </label>
                        <input type="time" id="appt" name="appt1" required>
                    </div>
                    <div class="col-md-6">
                        <label>Hora del final del programa: </label>
                        <input type="time" id="appt" name="appt2" required>
                    </div>
                </div>
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