<?php // Se requiere el head del sitio.
require_once('../includes/shared/head.php'); ?>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <?php require_once('../includes/shared/menu.php');
        //Importamos el model y PublicacionesControllerr
        require_once('../model/database.php');
        require_once('../controllers/ArtistasController.php');
        $view = new ArtistasController();
        $data = $view->getArtistas();  ?>

        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Publicaciones</h2>
            <div class="row row-cols-1 row-cols-md-4">
                <?php foreach ($data as $d) { ?>
                    <div class="col mb-4">
                        <div class="card">
                            <img src="<?php
                                        if ($d['imagen']) {
                                            echo $d['imagen'];
                                        } else {
                                            echo "https://pngimage.net/wp-content/uploads/2018/06/locutor-png-2.png";
                                        }  ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $d['nombre']; ?></h5>
                                <p class="card-text"><?php echo substr($d['biografia'], 0, 75) . ".."; ?></p>
                                <a href="artista.php?artista=<?php echo $d['id_artista']; ?>">
                                    <button class="btn btn-primary btn-sm text-justify">Ver biografia completa</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php // Se requiere los assets (archivos de JavaScript)
    require_once('../includes/shared/assets.php'); ?>
</body>

</html>