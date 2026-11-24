<?php $pageTitle=$pageTitle??'ByBella Agency'; $active=$active??''; $flash=get_flash(); ?>
<!doctype html><html lang="es"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="ByBella Agency: branding, diseño gráfico, marketing, eventos y talleres para empresas."><title><?=e($pageTitle)?> | ByBella Agency</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
<link href="assets/css/styles.css" rel="stylesheet"><link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml"></head><body>
<a class="skip-link" href="#main">Saltar al contenido</a>
<?php if ($active === 'index.php'): ?>
<div class="home-banner"><img src="assets/img/bybella-banner.png" alt="ByBella Agency" width="1366" height="400"></div>
<?php else: ?>
<div class="announcement">CREATIVE THINKING, MEANINGFUL CONNECTIONS <span>✳</span> MÉXICO & WORLDWIDE</div>
<?php endif; ?>
<header class="site-header sticky-top"><nav class="navbar navbar-expand-lg navbar-light"><div class="container-fluid site-width"><a class="brand" href="index.php" aria-label="ByBella Agency, inicio"><img src="assets/img/bybella-icono.png" alt="ByBella Agency" width="58" height="58" style="display:block;width:58px;height:58px;object-fit:contain"></a><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Abrir menú"><span class="navbar-toggler-icon"></span></button><div class="collapse navbar-collapse" id="menu"><ul class="navbar-nav ms-auto align-items-lg-center gap-lg-4">
<?php foreach(['index.php'=>'Inicio','nosotras.php'=>'Nosotras','servicios.php'=>'Servicios','eventos.php'=>'Eventos & talleres','portafolio.php'=>'Portafolio'] as $href=>$label): ?><li class="nav-item"><a class="nav-link <?= $active===$href?'active':'' ?>" href="<?=$href?>"><?=$label?></a></li><?php endforeach; ?>
<li class="nav-item"><a class="nav-link btn-nav" href="contacto.php">Hablemos <span aria-hidden="true">↗</span></a></li></ul></div></div></nav></header>
<?php if($flash): ?><div class="container site-width pt-3"><div class="alert alert-<?=e($flash[0])?> alert-dismissible fade show" role="alert"><?=e($flash[1])?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button></div></div><?php endif; ?>
<main id="main">
