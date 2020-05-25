<?php // Se requiere el head del sitio.
require_once('../includes/shared/head.php'); ?>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <?php require_once('../includes/shared/menu.php');
        //Importamos el model y PublicacionesControllerr
        require_once('../model/database.php');
        require_once('../controllers/ListasController.php');
        $view = new ListasController();
        $data = $view->getListas(); ?>

        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">
                <svg class="bi bi-music-note-list" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 13c0 1.105-1.12 2-2.5 2S7 14.105 7 13s1.12-2 2.5-2 2.5.895 2.5 2z" />
                    <path fill-rule="evenodd" d="M12 3v10h-1V3h1z" clip-rule="evenodd" />
                    <path d="M11 2.82a1 1 0 01.804-.98l3-.6A1 1 0 0116 2.22V4l-5 1V2.82z" />
                    <path fill-rule="evenodd" d="M0 11.5a.5.5 0 01.5-.5H4a.5.5 0 010 1H.5a.5.5 0 01-.5-.5zm0-4A.5.5 0 01.5 7H8a.5.5 0 010 1H.5a.5.5 0 01-.5-.5zm0-4A.5.5 0 01.5 3H8a.5.5 0 010 1H.5a.5.5 0 01-.5-.5z" clip-rule="evenodd" />
                </svg> Todas las listas </h2>
            <div class="row row-cols-1 row-cols-md-4">
                <?php foreach ($data as $d) { ?>
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"> <strong><?php echo $d['nombre']; ?></strong></h5>
                                <iframe src="https://open.spotify.com/embed/playlist/<?php echo $d['playlist']; ?>" width="100%" height="320" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>

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