<?php
require_once('session.php');
$session = new Session();
if ($session->getActivo()) {
    require_once('../../includes/head-dashboard.php');
    require_once('../../includes/menu-dashboard.php');
    //Se importa el model y el controlador
    require_once('../../model/database.php');
    require_once('../../controllers/ContactoController.php');
    $view = new ContactoController();
    $mensajes = $view->getMensajes();

    if (isset($_REQUEST['eliminar'])) {
        $view->eliminarMensaje($_REQUEST['id']);
    }
?>

    <div class="container">
        <h1 class="mt-2">Bienvenido <?php echo $_SESSION['usuario']; ?> </h2>
            <div>
                <div class="card-group">
                    <div class="card text-dark bg-light  mb-3 ml-2" style="max-width: 18rem;">
                        <div class="card-header text-center">Contenido de Inicio</div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="conf-inicio.php">
                                    <button class="btn btn-outline-success btn-bg btn-block">Modificar Inicio</button>
                                </a>
                            </h5>
                            <p class="card-text text-center">Puedes modificar todo el contenido del inicio desde esta seccion.</p>
                        </div>
                    </div>
                    <div class="card text-dark bg-light  mb-3 ml-2" style="max-width: 18rem;">
                        <div class="card-header text-center">Agregar publicaciones</div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="conf-publicaciones.php">
                                    <button class="btn btn-outline-success btn-bg btn-block">Publicaciones</button>
                                </a>
                            </h5>
                            <p class="card-text text-center">Puedes agregar publicaciones al sitio desde desde esta seccion.</p>
                        </div>
                    </div>
                    <div class="card text-dark bg-light  mb-3 ml-2" style="max-width: 18rem;">
                        <div class="card-header text-center">Staff</div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="conf-staffs.php">
                                    <button class="btn btn-outline-success btn-bg btn-block">Ver Staff</button>
                                </a></h5>
                            <p class="card-text text-center">Puedes ver todo el staff registrrado desde esta seccion.</p>
                        </div>
                    </div>
                    <div class="card text-dark bg-light  mb-3 ml-2" style="max-width: 18rem;">
                        <div class="card-header text-center">Artistas</div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="conf-artistas.php">
                                <button class="btn btn-outline-success btn-bg btn-block">Modificar Artistas</button>
                            </a></h5>
                            <p class="card-text text-center">Puedes modificar todo el contenido de los artistas desde esta seccion.</p>
                        </div>
                    </div>
                </div>

                <hr>
                <h2>Mensajes enviados</h2>
                <div class="table-responsive-lg mb-5">
                    <table class="table table-striped" id="publicaciones">
                        <caption>Mensajes enviados desde el contacto</caption>
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Nombre</th>
                                <th scope="col">Asunto</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Ver</th>
                                <th scope="col">Mensaje</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($mensajes as $m) { ?>
                                <tr class="text-center">
                                    <th><?php echo $m['nombre']; ?></th>
                                    <th><?php echo $m['asunto']; ?></th>
                                    <th><?php echo $m['correo']; ?></th>
                                    <th>
                                        <a href="edit-mensajes.php?mensaje=<?php echo $m['id_mensaje']; ?>">
                                            <button class="btn btn-success">Ver</button>
                                        </a>
                                    </th>
                                    <th>
                                        <form action="dashboard.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $m['id_mensaje']; ?>" >
                                            <input class="btn btn-danger" type="submit" name="eliminar" value="Eliminar">
                                        </form>
                                        </a>
                                    </th>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
    </div>


    <?php // Se requiere los assets (archivos de JavaScript)
    require_once('../../includes/assets-dashboard.php'); ?>
    </body>
    <script>
        $(document).ready(function() {
            $('#publicaciones').DataTable();
        });
    </script>

    </html>
<?php
} else {
    header("Location: ../entrar.php");
}
?>