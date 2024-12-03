<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información General</legend>

    <div class="formulario__campo">
        <label class="formulario__label" for="titulo">Titulo:</label>
        <input
            class="formulario__input" 
            type="text" 
            id="titulo" 
            name="titulo" 
            placeholder="Titulo Propiedad" 
            value="<?php echo $propiedad->titulo ?? '';?>"
        >
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="precio">Precio:</label>
        <input
            class="formulario__input" 
            type="number" 
            id="precio" 
            name="precio" 
            placeholder="Precio Propiedad" 
            value="<?php echo $propiedad->precio ?? '';?>"
        >
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="imagen">Imagen:</label>
        <input
            class="formulario__input--file" 
            type="file" 
            id="imagen" 
            accept="image/jpeg, image/png" 
            name="imagen"
        >
    </div>

    <?php if(isset($propiedad->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/propiedades/' . $propiedad->imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/propiedades/' . $propiedad->imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['HOST'] . '/img/propiedades/' . $propiedad->imagen; ?>.png" alt="Imagen propiedad">
            </picture>
        </div>
    <?php } ?>

    <div class="formulario__campo">
        <label class="formulario__label" for="descripcion">Descripción:</label>
        <textarea
            class="formulario__input"
            id="descripcion" 
            name="descripcion"><?php echo $propiedad->descripcion ?? '';?></textarea
        >
    </div>

    <div class="formulario__campo">
            <label class="formulario__label" for="status">Estatus:</label>

            <select 
                class="formulario__input" 
                name="status" 
                id="status"
            >
                <option disabled selected >-Seleccione-</option>
                <option <?php echo $propiedad->status === 'Disponible' ? 'selected' : ''; ?> value="Disponible">Disponible</option>
                <option <?php echo $propiedad->status === 'Vendido' ? 'selected' : ''; ?> value="<?php echo $propiedad->id ? 'Vendido' : ''; ?>">Vendido</option>
            </select>
        </div>

</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Propiedad</legend>

    <div class="formulario__campo">
        <label class="formulario__label" for="habitaciones">Habitaciones:</label>
        <input
            class="formulario__input"
            type="number" 
            id="habitaciones" 
            name="habitaciones" 
            placeholder="Ej: 2" 
            value="<?php echo $propiedad->habitaciones ?? '';?>" min="1" max="9"
        >
    </div>
    
    <div class="formulario__campo">
        <label class="formulario__label" for="wc">Baños:</label>
        <input
            class="formulario__input"
            type="number" 
            id="wc" 
            name="wc" 
            placeholder="Ej: 1" 
            value="<?php echo $propiedad->wc ?? '';?>" min="1" max="9"
        >
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="estacionamiento">Estacionamiento:</label>
        <input
            class="formulario__input"
            type="number" 
            id="estacionamiento" 
            name="estacionamiento" 
            placeholder="Ej: 1" 
            value="<?php echo $propiedad->estacionamiento ?? '';?>" min="1" max="9"
        >
    </div>

</fieldset>