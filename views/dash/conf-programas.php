<?php
require_once('session.php');
$session = new Session();
if ($session->getActivo()) {
    require_once('../../includes/head-dashboard.php');
    require_once('../../includes/menu-dashboard.php');
    //Importamos el model y ProgramasControllerProgramasControllerProgramasController
    require_once('../../model/database.php');
    require_once('../../controllers/ProgramasController.php');
    $view = new ProgramasController();
    $data = $view->getProgramas();
    if (isset($_REQUEST['eliminar'])) {
        $view->eliminarPrograma($_REQUEST['id']);
    }
?>

    <div class="container">
        <a href="add-programa.php"><button style="float: right;" class="btn btn-primary"> +</button></a>
        <h1 class="mt-2">Programas (<?php echo $data->rowCount(); ?>)</h2>
            <div class="table-responsive">
                <table class="table table-hover" id="publicaciones">
                    <thead>
                        <tr>
                            <th scope="col">Imagen</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Publicado por</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $d) { ?>
                            <tr>
                                <td><img src="<?php echo $d['imagen']; ?>" width="75px" height="auto"></td>
                                <td><?php echo $d['nombre']; ?></td>
                                <td>
                                    <?php //Buscamos el nombre del staff por id para poder imprimirlo
                                    $staff = $view->staffId($d['id_staff']);
                                    echo  $staff['nombre'] . ' (' . $staff['usuario']; ?>)
                                </td>
                                <td><a href="edit-programas.php?programa=<?php echo $d['id_programa']; ?>"><button class="btn btn-warning">Editar</button></a></td>
                                <td>
                                    <form action="conf-programas.php" method="post">
                                        <input type="hidden" value="<?php echo $d['id_programa']; ?>" name="id">
                                        <input type="submit" class="btn btn-danger" value="Eliminar" name="eliminar">
                                    </form>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
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