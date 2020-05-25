<?php // Se requiere el head del sitio.
require_once('../includes/shared/head.php'); ?>

<body>
	<div class="wrapper d-flex align-items-stretch">

		<?php
		//Incluimos el menu y el controlador de inicio
		require_once('../includes/shared/menu.php');
		require_once('../controllers/InicioController.php');
		$view = new InicioController();
		//Mandamos a llamar los metedos que necesitamos para inicio
		$data = $view->getInicio();
		$publicaciones = $view->getUltimasP();
		$artistas = $view->getArtistas();
		$listaSemana = $view->getListaById($data['id_lista']);
		$marquee = "Artistas: "; ?>
		
		<div id="content" class="p-4 p-md-5 pt-5">
			<div class="bg-light float-right" style="width: 50%">
				<?php foreach ($artistas as $a) {
					$id = $a['id_artista'];
					$nombre = $a['nombre'];
					$marquee = $marquee . " <a href='artista.php?artista=$id'>$nombre	</a> |";
				} ?>
				<marquee onmouseout="this.start()" onmouseover="this.stop()" style="cursor: pointer">
					<p class="lead"><?php echo $marquee ?></p>
				</marquee>
			</div>
			<!-- Contenido  -->
			<!-- Utilizamos la variable $data para traer la informacion de jumbotron  -->
			<h2 class="mb-4"><?php echo $data['titulo_inicio']; ?>
				<svg class="bi bi-music-note-beamed" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13c0-1.104 1.12-2 2.5-2s2.5.896 2.5 2zm9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2z" />
					<path fill-rule="evenodd" d="M14 11V2h1v9h-1zM6 3v10H5V3h1z" clip-rule="evenodd" />
					<path d="M5 2.905a1 1 0 01.9-.995l8-.8a1 1 0 011.1.995V3L5 4V2.905z" />
				</svg>
			</h2>
			<div class="row">
				<div class="col-md-8">
					<div class="jumbotron">

						<h1 class="display-4"><?php echo $data['encabezado_inicio']; ?></h1>
						<p class="lead"><?php echo $data['descripcion_inicio']; ?></p>
						<hr class="my-4">
						<p><?php echo $data['leyenda_inicio']; ?></p>
						<a class="btn btn-primary btn-lg" href="<?php echo $data['url_btn_inicio']; ?>" role="button"><?php echo $data['nombre_btn_inicio']; ?></a>

					</div>

				</div>
				<div class="col mb-3">
					<div class="card">
						<h5 class="card-title text-center mt-2 lead"> <strong><?php echo $listaSemana['nombre']; ?></strong></h5>
						<iframe src="https://open.spotify.com/embed/playlist/<?php echo $listaSemana['playlist']; ?>" width="100%" height="380px" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
					</div>
				</div>
			</div>

			<h2 class="mb-4">Ultimas publicaciones</h2>

			<div class="card-deck">
				<!-- Recorremos las publicaciones que tengamos -->
				<?php foreach ($publicaciones as $p) { ?>

					<div class="card">
						<a href="publicacion.php?publicacion=<?php echo $p['id_contenido'] ?>">
							<img src="<?php echo $p['imagen']; ?>" class="card-img-top"></a>
						<div class="card-body">
							<h5 class="card-title"><?php echo $p['titulo']; ?></h5>
							<p class="card-text text-justify"><?php echo substr($p['contenido'], 0, 100) . "..."; ?></p>
							<p class="card-text">Publicado por: <small class="text-muted">
									<?php
									//Buscamos el nombre del staff por id para poder imprimirlo
									$staff = $view->staffId($p['id_staff']);
									echo $staff['nombre'];
									?>
								</small></p>
						</div>
					</div>


				<?php } ?>
			</div>
		</div>
		<!-- Fin contenido  -->

		<?php // Se requiere los assets (archivos de JavaScript)
		require_once('../includes/shared/assets.php'); ?>
</body>

</html>