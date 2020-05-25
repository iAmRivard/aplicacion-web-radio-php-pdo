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
            <h2 class="mb-4">Publicaciones</h2>
            <div class="row row-cols-1 row-cols-md-4">
            <?php  foreach ($data as $d) { ?>
                <div class="col mb-4">
                    <div class="card">
                        <img 
                        src="<?php 
                        if($d['imagen']){echo $d['imagen'];}else{
                        echo "https://pngimage.net/wp-content/uploads/2018/06/locutor-png-2.png"; }  ?>" 
                        class="card-img-top" >
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $d['titulo']; ?></h5>
                            <p class="card-text"><?php echo substr($d['contenido'],0,75) . ".."; ?></p>
                            <a href="publicacion.php?publicacion=<?php echo $d['id_contenido']; ?>">
                                <button class="btn btn-primary btn-sm text-justify">Leer todo</button>
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