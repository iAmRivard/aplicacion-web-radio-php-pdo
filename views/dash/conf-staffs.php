<?php
require_once('session.php');
$session = new Session();
if ($session->getActivo()) {
    require_once('../../includes/head-dashboard.php');
    require_once('../../includes/menu-dashboard.php');
    //Importamos el model y al controllerr
    require_once('../../model/database.php');
    require_once('../../controllers/StaffController.php');
    $view = new StaffController();
    $data = $view->getStaff();
    if(isset($_REQUEST['eliminar'])){
        $resp = $view->eliminarStaff($_REQUEST['id']);
        if($resp == 0){echo "<p class='text-center text-danger'> No se puede eliminar debido a que tiene algo asignado.</p>";}
    }
?>

    <div class="container">
        <a href="add-staff.php"><button style="float: right;" class="btn btn-primary"> +</button></a>
        <h1 class="mt-2">Staff (<?php echo $data->rowCount(); ?>)</h2>
            <table class="table table-hover" id="publicaciones">
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Tipo Usuario</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $d) { ?>
                        <tr>
                            <td><img src="<?php echo $d['imagen']; ?>" width="75px" height="auto"></td>
                            <td><?php echo substr($d['nombre'], 0, 25); ?></td>
                            <td><?php echo substr($d['usuario'], 0, 25); ?></td>
                            <td><?php echo $d['tipo_usuario'] ?></td>
                            <td><a href="edit-staff.php?staff=<?php echo $d['id_staff'] ?>"><button class="btn btn-warning">Editar</button></a></td>
                            <td>
                                <form action="conf-staffs.php" method="post">
                                    <input type="hidden"  value="<?php echo $d['id_staff']; ?>" name="id">
                                    <input type="submit" class="btn btn-danger" value="Eliminar" name="eliminar">
                                </form>
                            </td>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
    </div>
    <!-- Se manda a llamar a la tabla publicaciones para utilizar las datatables-->

    <!-- Modal -->
    <?php // Se requiere los assets (archivos de JavaScript)
    require_once('../../includes/assets-dashboard.php'); ?>
    <script>
        $(document).ready(function() {
            $('#publicaciones').DataTable();
        });
    </script>
    </body>

    </html>
<?php
} else {
    header("Location: ../entrar.php");
}
?>