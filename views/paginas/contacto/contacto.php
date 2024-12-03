
<h1 class="contactos__heading">Contáctanos</h1>

<section class="contacto">
    <div class="contacto__grid">
        <div class="contacto__flex">
            <h1 class="contacto__heading">¿Y tú ya tienes tu <span class="contacto__span">nuevo hogar</span>?</h1>
            <p class="contacto__descripcion"><span class="contacto__span">En BIENESRAICES tenemos lo que buscas.</span>
            <br>
            Contáctanos y obtén atención personalizada.</p>
        </div>

        <div class="contacto-formulario">
            <?php if($mensaje) { ?>
                <p class='contacto-formulario__mensaje contacto-formulario__mensaje--exito'>
                    ¡<?php echo $mensaje ?>!
                </p>
            <?php } ?>

            <form method="POST" action="/contacto" class="formulario">

                <?php include __DIR__ . '/../inicio/contacto.php'; ?>

                <input class="contacto-formulario__submit contacto-formulario__submit--registrar" type="submit" value="Enviar">
            </form>
        </div>
    </div>
</section>