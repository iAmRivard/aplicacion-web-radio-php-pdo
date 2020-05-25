<?php // Se requiere el head del sitio.
require_once('../includes/shared/head.php'); ?>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <?php require_once('../includes/shared/menu.php');
        //Importamos el modelo y publicaciones controller
        require_once('../model/database.php');
        require_once('../controllers/PublicacionesController.php');
        $view = new PublicacionesController();
        $data = $view->getPublicaciones()  ?>

        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Buscar</h2>
            <div class="md-form active-cyan active-cyan-2 mb-3">
                <input class="form-control" type="text" placeholder="Buscar" aria-label="Search" onkeyup="buscar()" id="buscador">
                <select class="form-control form-control-sm" id="select">
                    <option value="1">Listas semanales</option>
                    <option value="2">Artistas</option>
                    <option value="3">Publicaciones</option>
                </select>
            </div>
            <div class="row row-cols-1 row-cols-md-4" id="log">

            </div>
        </div>
    </div>

    <script src="../js/buscador.js"></script>

    <?php // Se requiere los assets (archivos de JavaScript)
    require_once('../includes/shared/assets.php'); ?>
</body>

</html>