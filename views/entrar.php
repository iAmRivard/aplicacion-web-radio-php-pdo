<?php
require_once('../includes/shared/head.php');
require_once('dash/session.php');
$session = new Session();
if ($session->getActivo()) {
    header("Location: dash/dashboard.php");
}else{
?>
<link rel="stylesheet" href="../css/login.css">
<div class="wrapper d-flex align-items-stretch">
    <?php require_once('../includes/shared/menu.php');  ?>
    <!-- Incluimos el menu -->

    <div id="content" class="p-4 p-md-5 pt-5">

    <?php require_once('../controllers/EntrarController.php');  ?>
  
        <h2 class="mb-4">Formulario de ingreso</h2>
        <div class="login-form">
            <form action="entrar.php" method="post">
                <h2 class="text-center">Ingresar</h2>
                <div class="form-group">
                    <input type="text" name="usuario" class="form-control" placeholder="Username" required="required">
                </div>
                <div class="form-group">
                    <input type="password" name="clave" class="form-control" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php // Se requiere los assets (archivos de JavaScript)
require_once('../includes/shared/assets.php'); ?>
</body>

</html>

<?php } ?>