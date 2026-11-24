<?php require 'includes/bootstrap.php';$pageTitle='Servicios y paquetes';$active='servicios.php';require 'includes/header.php';
$packages=[
 ['id'=>'calendar','n'=>'01','name'=>'Calendar','sub'=>'Planeación estratégica de contenido','price'=>'$1,800','ideal'=>'Marcas con equipo interno que necesitan dirección estratégica.','features'=>['Objetivos: branding, ventas y comunidad','Pilares de contenido','Planeación estratégica semanal','Calendario semanal o mensual (4 semanas)','Ideas, formatos y objetivos por publicación','Copy sugerido y frecuencia recomendada','Hasta 2 rondas de ajustes al mes'],'note'=>'No incluye diseño gráfico ni publicación.'],
 ['id'=>'starter','n'=>'02','name'=>'Starter','sub'=>'Planeación y diseño de contenido','price'=>'$2,990','ideal'=>'Marcas que están comenzando y necesitan estructura en redes sociales.','features'=>['Objetivos de marca, crecimiento y comunidad','Pilares y calendario mensual (4 semanas)','Formato y objetivo por publicación','9 diseños mensuales: posts, carruseles e historias','Diseños alineados a la identidad de marca','Adaptación a formatos de post e historia','1 ronda de ajustes al mes'],'note'=>'No incluye grabación, edición, sesiones fotográficas ni pauta publicitaria.'],
 ['id'=>'premium','n'=>'03','name'=>'Premium','sub'=>'Planeación, diseño y seguimiento','price'=>'$4,250','ideal'=>'Marcas que desean mejorar sus resultados y constancia visual.','features'=>['Análisis de objetivos y pilares','Calendario semanal o mensual','16 a 20 piezas: feed, carruseles, historias y portadas','Copywriting con textos y llamadas a la acción','1 revisión mensual de resultados','Ajustes de enfoque basados en resultados','Hasta 2 rondas de cambios mensuales'],'note'=>'No incluye grabación, edición ni sesiones fotográficas.'],
 ['id'=>'diamante','n'=>'04','name'=>'Diamante','sub'=>'Marketing digital integral + community manager','price'=>'$7,500','ideal'=>'Marcas que desean delegar su presencia digital y la producción.','features'=>['Estrategia y calendario mensual','Grabación de reels y TikToks','Sesión fotográfica mensual y dirección creativa básica','Edición de videos y fotografía','16 a 20 piezas: reels, feed, historias y portadas','Publicación y programación del contenido','Gestión de pauta, mensajes, comentarios y comunidad','Seguimiento semanal y reporte de KPIs'],'note'=>'El alcance específico se acuerda al contratar.']
]; ?>
<section class="page-hero container-fluid site-width">
  <span class="eyebrow">OUR SERVICES / 2026</span>
  <h1>Todo empieza<br>con una <em>buena idea.</em></h1>
  <p class="body-lg max-text">Explora nuestros paquetes de marketing, servicios de diseño editorial y branding, y desarrollo de páginas web.</p>
  <nav class="d-flex flex-wrap gap-3 mt-4" aria-label="Acceso rápido a los servicios">
    <a class="primary-button" href="#marketing">Paquetes de marketing <span aria-hidden="true">↓</span></a>
    <a class="primary-button" href="#diseno">Servicios de diseño <span aria-hidden="true">↓</span></a>
    <a class="primary-button" href="#paginas-web">Páginas web <span aria-hidden="true">↓</span></a>
  </nav>
</section>
<section class="section-padding cream-section" id="marketing"><div class="container-fluid site-width"><div class="section-head"><span class="eyebrow">01 / PAQUETES DE MARKETING</span><span>INVERSIÓN EN PESOS MEXICANOS</span></div><h2 class="display-title smaller mb-5">Marketing para <em>tu marca.</em></h2><div class="row g-3 marketing-package-grid">
<?php foreach($packages as $i => $p): ?>
  <div class="col-12 col-lg-6" id="<?= e($p['id']) ?>">
    <article class="pricing-card marketing-package-card <?= in_array($i, [1, 2], true) ? 'marketing-package-wine' : 'marketing-package-light' ?> h-100">
      <div class="marketing-package-head"><span> <?= e($p['n']) ?> / MARKETING</span><span aria-hidden="true">↗</span></div>
      <h3><?= e($p['name']) ?></h3>
      <p class="package-sub"><?= e($p['sub']) ?></p>
      <p class="marketing-package-ideal"><?= e($p['ideal']) ?></p>
      <div class="marketing-package-price"><?= e($p['price']) ?> <small>MXN / MES</small></div>
      <div class="divider-line"></div>
      <h4>QUÉ INCLUYE</h4>
      <ul class="feature-list"><?php foreach($p['features'] as $f): ?><li><?= e($f) ?></li><?php endforeach; ?></ul>
      <p class="package-note">* <?= e($p['note']) ?></p>
      <a class="primary-button mt-auto" href="contacto.php?servicio=<?= urlencode($p['name']) ?>">Quiero este paquete <span aria-hidden="true">↗</span></a>
    </article>
  </div>
<?php endforeach; ?></div></div></section>

<section class="section-padding container-fluid site-width" id="diseno">
 <div class="section-head"><span class="eyebrow">02 / SERVICIOS DE DISEÑO</span><span>DISEÑO EDITORIAL + BRANDING</span></div>
 <h2 class="display-title smaller mb-4">Diseño con <em>identidad.</em></h2>
 <p class="body-lg max-text mb-5">Cada proyecto merece una propuesta visual con intención. Creamos piezas editoriales y desarrollamos identidades que transmiten la esencia de tu marca.</p>
 <div id="editorial" class="mb-5">
   <span class="eyebrow">DISEÑO EDITORIAL</span>
   <h3 class="statement mt-3 mb-3" style="font-size:clamp(32px,4vw,56px)">Ideas que toman <em>forma.</em></h3>
   <p class="body-lg max-text">Diseñamos materiales editoriales personalizados, cuidando la composición, la tipografía y cada detalle de presentación.</p>
   <div class="row g-3 mt-3">
      <?php foreach (['Revistas', 'Catálogos', 'Workbooks', 'Menús', 'Manuales', 'Stickers', 'Otros proyectos editoriales'] as $item): ?>
      <div class="col-6 col-md-4"><div class="experience-card" style="min-height:115px;padding:24px;justify-content:center"><h4 style="font-size:clamp(18px,2vw,24px);letter-spacing:-.04em;margin:0;font-weight:500"><?= e($item) ?></h4></div></div>
      <?php endforeach; ?>
   </div>
   <p class="package-note mt-3">Cada proyecto editorial se cotiza según sus características y alcance.</p>
   <a class="primary-button mt-3" href="contacto.php?servicio=Diseno%20editorial">Cotizar diseño editorial <span>↗</span></a>
 </div>
</section>
<section class="section-padding cream-section" id="branding">
 <div class="container-fluid site-width">
   <div class="section-head"><span class="eyebrow">BRANDING / PAQUETES</span><span>INVERSIÓN EN PESOS MEXICANOS</span></div>
   <h2 class="display-title smaller mb-4">Tu esencia, <em>tu identidad.</em></h2>
   <p class="body-lg max-text mb-5">Desde renovar tu identidad visual hasta construir una guía completa para tu marca: elige el nivel que mejor se adapte a tu proyecto.</p>
   <div class="row g-3 branding-package-grid">
   <?php
   $brandingPackages = [
     ['n'=>'01', 'name'=>'Básico', 'sub'=>'Rediseño de identidad visual', 'price'=>'$1,500', 'unit'=>'MXN', 'features'=>[
       'Rediseño de logotipo e isotipo, de ser necesario',
       'Versiones a color, en positivo y negativo',
       'Entrega en PNG con calidad HD'
     ], 'note'=>'No incluye entregables adicionales.'],
     ['n'=>'02', 'name'=>'Intermedio', 'sub'=>'Diseño de identidad visual', 'price'=>'$2,000 – $3,500', 'unit'=>'MXN', 'features'=>[
       'Diseño de logotipo e isotipo, de ser necesario',
       'Versiones a color, en positivo y negativo',
       'Entrega en PNG con calidad HD'
     ], 'note'=>'El costo varía según la investigación, desarrollo conceptual y número de revisiones. No incluye entregables adicionales.'],
     ['n'=>'03', 'name'=>'Avanzado', 'sub'=>'Identidad visual + manual de marca', 'price'=>'Desde $5,000', 'unit'=>'MXN', 'features'=>[
       'Logotipo e isotipo, de ser necesario, en calidad HD',
       'Versiones a color, positivo/negativo, vertical y horizontal',
       'Archivos PNG, JPG y editable de Illustrator',
       'Manual de marca (Brand Book): introducción, misión, visión, valores y personalidad',
       'Lineamientos del logotipo: variaciones, usos correctos e incorrectos, área de reserva y tamaños mínimos',
       'Paleta de colores y códigos RGB, CMYK, HEX y Pantone',
       'Tipografías principales y secundarias y pautas de uso',
       'Iconografía, elementos gráficos, patrones y texturas',
       'Ejemplos de aplicación en impresos, medios digitales y merchandising',
       'Tono de comunicación, mensaje clave y lineamientos para redes sociales'
     ], 'note'=>'El precio final depende del proceso de investigación, desarrollo conceptual y número de revisiones.']
   ];
   foreach ($brandingPackages as $i => $p): ?>
     <div class="col-lg-4" id="branding-<?= e($p['n']) ?>">
       <article class="pricing-card branding-package-card <?= $i === 1 ? 'branding-package-wine' : 'branding-package-light' ?> h-100">
         <div class="branding-package-head"><span>PAQUETE DE BRANDING <?= e($p['n']) ?></span><span aria-hidden="true">✳</span></div>
         <h3><?= e($p['name']) ?></h3>
         <p class="package-sub"><?= e($p['sub']) ?></p>
         <div class="price"><?= e($p['price']) ?> <small><?= e($p['unit']) ?></small></div>
         <div class="divider-line"></div>
         <h4>QUÉ INCLUYE</h4>
         <ul class="feature-list"><?php foreach ($p['features'] as $feature): ?><li><?= e($feature) ?></li><?php endforeach; ?></ul>
         <p class="package-note">* <?= e($p['note']) ?></p>
         <a class="primary-button mt-auto" href="contacto.php?servicio=<?= urlencode('Paquete de ' . $p['name']) ?>">Cotizar este paquete <span>↗</span></a>
       </article>
     </div>
   <?php endforeach; ?>
   </div>
 </div>
</section>
<section class="section-padding container-fluid site-width" id="paginas-web">
  <div class="section-head"><span class="eyebrow">03 / PÁGINAS WEB</span><span>DESARROLLO WEB</span></div>
  <div class="row align-items-center gy-4 mt-4">
    <div class="col-lg-7">
      <h2 class="display-title smaller">Tu negocio, <em>en línea.</em></h2>
      <p class="body-lg">También diseñamos y desarrollamos páginas web para empresas y negocios que buscan una presencia digital profesional, funcional y alineada con su identidad.</p>
      <p class="body-lg"><strong>Es un servicio independiente:</strong> el desarrollo de páginas web no está incluido en los paquetes de marketing ni en los paquetes de branding.</p>
    </div>
    <div class="col-lg-5 text-lg-end"><a class="primary-button" href="contacto.php?servicio=Pagina%20web">Cotizar mi página web <span>↗</span></a></div>
  </div>
</section>
<?php require 'includes/footer.php'; ?>
