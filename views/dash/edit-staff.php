<?php
//Verificamos que el usuario se encuentre activo
require_once('session.php');
$session = new Session();
if ($session->getActivo()) {
    //Verificamos que envie el id de la staff a editar y que sea numero
    if ($_REQUEST['staff'] && is_numeric($_REQUEST['staff'])) {
        $id_staff = $_REQUEST['staff'];
        require_once('../../includes/head-dashboard.php');
        require_once('../../includes/menu-dashboard.php');
        //Importamos el model y PublicacionesControllerr
        require_once('../../model/database.php');
        require_once('../../controllers/StaffController.php');
        $view = new StaffController();
        $data = $view->staffById($id_staff);
        //Verifica que se modifico
        if (isset($_REQUEST['submit'])) {
            //Hace el update
           $view->updatePublicacion();
        }
?>

        <div class="container">
            <h2>Staff <small><?php echo $data['nombre'];?></small></h2>
            <hr>
            <?php echo $id_staff;?>
            <form action="edit-staff.php?staff=<?php echo $id_staff;?>" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nombre</label>
                            <input type="hidden" value="<?php echo $data['id_staff'];?>" name="id_staff">
                            <input type="text" class="form-control" value="<?php echo $data['nombre'];?>" name="nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label>URL de la imagen (verificar que sea url valido)</label>
                            <input type="text" class="form-control" value="<?php echo $data['imagen'];?>" name="imagen" required>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Cambiar Clave</label>
                            <input type="password" class="form-control" value="<?php echo $data['clave']; ?>" name="clave" required placeholder="********">
                        </div>
                        <div class="col-md-6">
                            <label>Tipo de usuario</label>
                            <input type="text" class="form-control" value="<?php echo $data['tipo_usuario'];?>" disabled name="imagen" required>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label>Descripcion del staff</label>
                    <textarea class="form-control" rows="8" name="descripcion" required><?php echo $data['descripcion']; ?></textarea>
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
        header("Location: conf-staffs.php");
    }
} else {
    header("Location: ../entrar.php");
}
?>