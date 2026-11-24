
<?php
require 'includes/bootstrap.php';
$pageTitle = 'Nosotras';
$active = 'nosotras.php';
require 'includes/header.php';
?>

<section class="page-hero container-fluid site-width">
    <span class="eyebrow">THE PEOPLE BEHIND BYBELLA</span>

    <h1>
        Dos hermanas.<br>
        Una misma <em>visión.</em>
    </h1>


    <p class="body-lg max-text">
        <strong>¿Por qué ByBella?</strong>
        Porque las dos compartimos algo más que una visión:
        Isabella es nuestro segundo nombre. De ahí nace “Bella”,
        un detalle que nos une desde siempre y que hoy se convierte
        en nuestra firma. ByBella representa nuestra historia,
        dos personalidades que se complementan y una misma intención:
        crear marcas con identidad, propósito y algo auténtico que contar.
    </p>
</section>

<section class="section-padding cream-section">
    <div class="container-fluid site-width">
        <div class="row gy-4">

            <div class="col-lg-6">
                <article class="founder-card">
                    <div class="founder-art founder-one">
                        <img
                            class="founder-photo"
                            src="assets/img/valeria-madrid.jpg"
                            alt="Valeria Madrid"
                            loading="lazy"
                        >
                        <small>CREATIVE MIND</small>
                    </div>

                    <div class="d-flex justify-content-between align-items-baseline">
                        <h2>Valeria Madrid</h2>
                        <span>FOUNDER</span>
                    </div>

                    <p>
                        Diseñadora y fundadora. Su enfoque está en la
                        identidad visual, el diseño gráfico y la dirección
                        creativa, transformando ideas en propuestas
                        con personalidad.
                    </p>
                </article>
            </div>

            <div class="col-lg-6">
                <article class="founder-card">
                    <div class="founder-art founder-two">
                        <img
                            class="founder-photo"
                            src="assets/img/valentina-madrid.jpg"
                            alt="Valentina Madrid"
                            loading="lazy"
                        >
                        <small>STRATEGIC MIND</small>
                    </div>

                    <div class="d-flex justify-content-between align-items-baseline">
                        <h2>Valentina Madrid</h2>
                        <span>CO-FOUNDER</span>
                    </div>

                    <p>
                        Cofundadora enfocada en estrategia, organización
                        y tecnología. Aporta estructura a las ideas
                        creativas para construir proyectos funcionales
                        y experiencias para las marcas.
                    </p>
                </article>
            </div>

        </div>
    </div>
</section>

<section class="section-padding container-fluid site-width">
    <div class="row gy-4">
        <div class="col-lg-4">
            <span class="eyebrow">OUR PHILOSOPHY</span>
        </div>

        <div class="col-lg-8">
            <h2 class="statement">
                Estrategia sin creatividad es solo un plan.
                Creatividad sin estrategia es solo una idea.
                <em>Nosotras hacemos ambas.</em>
            </h2>

            <a class="primary-button mt-4" href="contacto.php">
                Trabaja con nosotras <span>↗</span>
            </a>
        </div>
    </div>
</section>

<?php require 'includes/footer.php'; ?>
