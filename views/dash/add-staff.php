<?php
//Verificamos que el usuario se encuentre activo
require_once('session.php');
$session = new Session();
if ($session->getActivo()) {
        require_once('../../includes/head-dashboard.php');
        require_once('../../includes/menu-dashboard.php');
        //Importamos el model y Controllerr
        require_once('../../model/database.php');
        require_once('../../controllers/StaffController.php');
        $view = new StaffController();
        //Verifica que se modifico
        if (isset($_REQUEST['submit'])) {
            //Hace el update
            $view->agregarStaff();
        }
?>

        <div class="container">
            <h2>Agregar staff <small></small></h2>
            <hr>
            <form action="add-staff.php" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nombre del Staff</label>
                            <input type="text" class="form-control" value="" name="nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label>URL de la imagen (verificar que sea url valido)</label>
                            <input type="text" class="form-control" value="" name="imagen" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label>Usuario del staff</label>
                            <input type="text" class="form-control" value="" name="usuario" required>
                        </div>
                        <div class="col-md-6">
                            <label>Clave</label>
                            <input type="password" class="form-control" value="" name="clave" required>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label>Descripcion del staff</label>
                    <textarea class="form-control" rows="8" name="descripcion" required></textarea>
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