<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información</legend>

    <div class="formulario__campo">
        <label class="formulario__label" for="titulo">Titulo:</label>
        <input
            class="formulario__input" 
            type="text" 
            id="titulo" 
            name="titulo" 
            placeholder="Titulo Propiedad" 
            value="<?php echo $compromiso->titulo ?? '';?>"
        >
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="imagen">Imagen:</label>
        <input
            class="formulario__input--file" 
            type="file" 
            id="imagen" 
            accept="image/jpeg, image/jpg, image/png" 
            name="imagen"
        >
    </div>

    <?php if(isset($compromiso->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/compromisos/' . $compromiso->imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/compromisos/' . $compromiso->imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['HOST'] . '/img/compromisos/' . $compromiso->imagen; ?>.png" alt="Imagen propiedad">
            </picture>
        </div>
    <?php } ?>

    <div class="formulario__campo">
        <label class="formulario__label" for="descripcion">Descripción:</label>
        <textarea
            class="formulario__input"
            id="descripcion" 
            name="descripcion"><?php echo $compromiso->descripcion ?? '';?></textarea
        >
    </div>
</fieldset>
