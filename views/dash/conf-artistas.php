<?php
require_once('session.php');
$session = new Session();
if ($session->getActivo()) {
    require_once('../../includes/head-dashboard.php');
    require_once('../../includes/menu-dashboard.php');
    //Importamos el model y PublicacionesControllerr
    require_once('../../model/database.php');
    require_once('../../controllers/ArtistasController.php');
    $view = new ArtistasController();
    $data = $view->getArtistas();
    if (isset($_REQUEST['eliminar'])) {
        $view->eliminarArtista($_REQUEST['id']);
    }
?>

    <div class="container">
        <a href="add-artista.php"><button style="float: right;" class="btn btn-primary"> +</button></a>
        <h1 class="mt-2">Artistas (<?php echo $data->rowCount(); ?>)</h2>
            <div class="table-responsive">
                <table class="table table-hover" id="publicaciones">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Biografia</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $d) { ?>
                            <tr>
                                <td><img src="<?php echo $d['imagen']; ?>" width="75px" height="auto"></td>
                                <td><?php echo $d['nombre'] ?></td>
                                <td><?php echo substr($d['biografia'], 0, 25);  ?></td>
                                <!--    <td><a href="edit-artista.php?publicacion=<?php ?>"><button class="btn btn-warning">Editar</button></a></td>-->
                                <td></td>
                                <td>
                                    <form action="conf-artistas.php" method="post">
                                        <input type="hidden" value="<?php echo $d['id_artista']; ?>" name="id">
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