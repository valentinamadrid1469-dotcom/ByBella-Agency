<?php require 'includes/bootstrap.php';if(admin()) redirect('admin.php');$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 check_csrf();
 $password = getenv('BYBELLA_ADMIN_PASSWORD');

if (!$password) {
    http_response_code(503);
    exit('Acceso administrativo no configurado.');
}
 if(hash_equals($password, (string)($_POST['password']??''))){session_regenerate_id(true);$_SESSION['admin']=true;flash('success','Bienvenida al panel de solicitudes.');redirect('admin.php');}
 $error='Contraseña incorrecta.';
}
$pageTitle='Acceso administrativo';require 'includes/header.php';?>
<section class="page-hero container-fluid site-width"><span class="eyebrow">PRIVATE AREA</span><h1>Panel <em>interno.</em></h1><div class="row"><div class="col-md-6 col-lg-5"><div class="form-panel mt-4"><h2>Iniciar sesión</h2><p>Acceso reservado al equipo de ByBella.</p><?php if($error):?><div class="alert alert-danger" role="alert"><?=e($error)?></div><?php endif;?><form method="post"><input type="hidden" name="csrf" value="<?=e(csrf())?>"><label class="form-label" for="password">Contraseña</label><input id="password" class="form-control mb-4" type="password" name="password" required autocomplete="current-password"><button class="primary-button border-0" type="submit">Ingresar <span>↗</span></button></form></div></div></div></section>
<?php require 'includes/footer.php'; ?>
