<?php // Se requiere el head del sitio.
require_once('../includes/shared/head.php'); ?>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <?php require_once('../includes/shared/menu.php');
        //Se importa el model y el controlador
        require_once('../model/database.php');
        require_once('../controllers/ContactoController.php');
        $view = new ContactoController();

        ?>

        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Contacto</h2>
            <div class="row row-cols-1 row-cols-md-3">
                <div class="container">
                    <h2>Contacta con nosotros <small></small></h2>
                    <hr>
                    <form action="contacto.php" method="post">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Tu nombre</label>
                                    <input type="text" class="form-control" value="" name="nombre" required placeholder="Ingresa tu nombre">
                                </div>
                                <div class="col-md-6">
                                    <label>Tu correo</label>
                                    <input type="email" class="form-control" value="" name="correo" required placeholder="tucorreo@algo.com">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label>Asunto</label>
                                    <input type="text" class="form-control" value="" name="asunto" required placeholder="Ingresa un asunto">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Escribe tu mensae</label>
                            <textarea class="form-control" rows="8" name="mensaje" minlength="25" required placeholder="Ingresa tu mensaje"></textarea>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Enviar">
                    </form>
                    <?php if (isset($_REQUEST['submit'])) {
                        $view->nuevoMensaje();
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <?php // Se requiere los assets (archivos de JavaScript)
    require_once('../includes/shared/assets.php'); ?>
</body>

</html>