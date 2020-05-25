<?php
require_once('session.php');
$session = new Session();
if ($session->getActivo()) {
    require_once('../../includes/head-dashboard.php');
    require_once('../../includes/menu-dashboard.php');
    require_once('../../controllers/DashboardController.php');
    $view = new DashboardController();
    $data = $view->getDataInicio();
    $listas = $view->getListas();
    //Verifica que se modifico
    if (isset($_REQUEST['submit'])) {
        //Hace el update
        $view->updateInicio();
    }
?>

    <div class="container mb-5">
        <h1 class="mt-2">Modifica el inicio del sitio</h2>
            <form action="conf-inicio.php" method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Titulo Inicio</label>
                            <input type="hidden" value="<?php echo $data['id_inicio']; ?>" name="id_inicio">
                            <input type="text" class="form-control" value='<?php echo $data['titulo_inicio']; ?>' name="titulo_inicio" required>
                        </div>
                        <div class="col-md-6">
                            <label>Encabezado Inicio</label>
                            <input type="text" class="form-control" value="<?php echo $data['encabezado_inicio']; ?>" name="encabezado_inicio" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label>Leyenda Inicio</label>
                            <input type="text" class="form-control" value="<?php echo $data['leyenda_inicio']; ?>" name="leyenda_inicio" required>
                        </div>
                        <div class="col-md-6">

                            <label>Lista de Inicio</label>
                            <select class="form-control" name="id_lista">
                                <?php foreach ($listas as $l) {
                                    if ($data['id_lista'] == $l['id_lista']) { ?>
                                        <option value="<?php echo $l['id_lista']; ?>" selected="selected"><?php echo $l['nombre']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $l['id_lista']; ?>"><?php echo $l['nombre']; ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label>Boton Inicio</label>
                            <input type="text" class="form-control" value="<?php echo $data['nombre_btn_inicio']; ?>" name="nombre_btn_inicio" required maxlength="20">
                        </div>
                        <div class="col-md-6">
                            <label>URL del boton Inicio</label>
                            <input type="text" class="form-control" value="<?php echo $data['url_btn_inicio']; ?>" name="url_btn_inicio" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Descripcion Inicio</label>
                    <textarea class="form-control" rows="6" name="descripcion_inicio" required><?php echo $data['descripcion_inicio']; ?></textarea>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Modficar">
            </form>
    </div>
    </div>
    <?php // Se requiere los assets (archivos de JavaScript)
    require_once('../../includes/assets-dashboard.php'); ?>
    </body>

    </html>
<?php
} else {
    header("Location: ../entrar.php");
}
?>