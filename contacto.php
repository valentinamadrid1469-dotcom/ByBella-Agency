<?php require 'includes/bootstrap.php';
$groups = service_groups();
$selected = selected_services($_GET['servicio'] ?? []);
$values=['nombre'=>'','email'=>'','empresa'=>'','telefono'=>'','servicio'=>'','mensaje'=>''];
$errors=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
 check_csrf();
 $selected = selected_services($_POST['servicio'] ?? []);
 [$values,$errors]=validate_request($_POST);
 if(!$errors){$q=db()->prepare('INSERT INTO solicitudes(nombre,email,empresa,telefono,servicio,mensaje) VALUES (:nombre,:email,:empresa,:telefono,:servicio,:mensaje)');$q->execute($values);flash('success','¡Gracias! Tu solicitud fue registrada correctamente. Nos pondremos en contacto contigo.');redirect('contacto.php?enviado=1');}
}
$pageTitle='Contacto';$active='contacto.php';require 'includes/header.php'; ?>
<section class="page-hero container-fluid site-width pb-4"><span class="eyebrow">LET'S MAKE IT HAPPEN</span><h1>Tu próxima gran idea<br>empieza <em>aquí.</em></h1><p class="body-lg max-text">Cuéntanos qué tienes en mente. Cotiza un paquete, un evento, un taller o un proyecto hecho a la medida.</p></section>
<section class="section-padding pt-4"><div class="container-fluid site-width"><div class="row gy-5"><div class="col-lg-4"><div class="contact-panel"><span class="eyebrow">GET IN TOUCH</span><h2>Hablemos de<br><em>tu marca.</em></h2><p>Estamos en México y trabajamos de forma remota con marcas de cualquier lugar.</p><div class="divider-line"></div><a href="https://www.instagram.com/bybellagency/" target="_blank" rel="noopener">@bybellagency ↗</a><p class="small mt-4">Todos los campos con * son obligatorios. La información se guarda en la base de datos del proyecto para gestionar tu solicitud.</p></div></div><div class="col-lg-8"><div class="form-panel"><span class="eyebrow">PROJECT INQUIRY / FORM</span><h2>Cuéntanos tu proyecto.</h2>
<?php if($errors):?><div class="alert alert-danger" role="alert"><strong>Revisa lo siguiente:</strong><ul class="mb-0"><?php foreach($errors as $error):?><li><?=e($error)?></li><?php endforeach;?></ul></div><?php endif; ?>
<form method="post" id="contact-form" class="needs-validation" novalidate><input type="hidden" name="csrf" value="<?=e(csrf())?>"><div class="row g-4"><div class="col-md-6"><label class="form-label" for="nombre">Tu nombre *</label><input id="nombre" name="nombre" type="text" class="form-control" minlength="2" maxlength="100" required value="<?=e($values['nombre'])?>"><div class="invalid-feedback">Escribe tu nombre (mínimo 2 letras).</div></div><div class="col-md-6"><label class="form-label" for="email">Correo electrónico *</label><input id="email" name="email" type="email" class="form-control" maxlength="150" required value="<?=e($values['email'])?>"><div class="invalid-feedback">Escribe un correo válido.</div></div><div class="col-md-6"><label class="form-label" for="empresa">Nombre de tu empresa</label><input id="empresa" name="empresa" class="form-control" maxlength="120" value="<?=e($values['empresa'])?>"></div><div class="col-md-6"><label class="form-label" for="telefono">Teléfono (opcional)</label><input id="telefono" name="telefono" type="tel" class="form-control" maxlength="40" value="<?=e($values['telefono'])?>"></div><div class="col-12">
<fieldset class="service-picker" id="servicios-grupo" aria-describedby="servicios-ayuda">
<legend class="form-label">¿Qué servicios te interesan? *</legend>
<p class="small text-muted mb-3" id="servicios-ayuda">Puedes elegir uno o varios servicios.</p>
<div class="row g-3">
<?php foreach ($groups as $category => $options): ?>
<div class="col-md-6"><div class="service-group-card">
<h3><?= e($category) ?></h3>
<?php foreach ($options as $option): ?>
<label class="service-choice"><input class="form-check-input service-checkbox" type="checkbox" name="servicio[]" value="<?= e($option) ?>" <?= in_array($option, $selected, true) ? 'checked' : '' ?>><span><?= e($option) ?></span></label>
<?php endforeach; ?>
</div></div>
<?php endforeach; ?>
</div><p class="invalid-feedback service-error" id="servicios-error" hidden>Selecciona al menos un servicio.</p>
</fieldset></div><div class="col-12"><label class="form-label" for="mensaje">Háblanos de tu idea *</label><textarea id="mensaje" name="mensaje" class="form-control" rows="5" minlength="10" maxlength="2500" required placeholder="Cuéntanos tus objetivos, fechas y lo que imaginas..."><?=e($values['mensaje'])?></textarea><div class="d-flex justify-content-between"><div class="invalid-feedback">Escribe al menos 10 caracteres.</div><small class="ms-auto" id="char-count">0 / 2500</small></div></div><div class="col-12"><button class="primary-button border-0" type="submit">Enviar solicitud <span>↗</span></button></div></div></form></div></div></div></div></section>
<?php require 'includes/footer.php'; ?>
