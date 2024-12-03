<fieldset class="contacto-formulario__fieldset">
    <div class="contacto-formulario__grid">
        <div class="contacto-formulario__campo">
            <label for="nombre" class="contacto-formulario__label">Nombre</label>
            <input 
                type="text"
                class="contacto-formulario__input"
                id="nombre"
                name="contacto[nombre]"
                placeholder="Nombre"
            >
        </div>

        <div class="contacto-formulario__campo">
            <label for="apellido" class="contacto-formulario__label">Apellidos</label>
            <input 
                type="text"
                class="contacto-formulario__input"
                id="apellido"
                name="contacto[apellido]"
                placeholder="Apellidos"
            >
        </div>

        <div class="contacto-formulario__campo">
            <label for="celular" class="contacto-formulario__label">Celular</label>
            <input 
                type="tel"
                class="contacto-formulario__input"
                id="celular"
                name="contacto[celular]"
                placeholder="Celular"
            >
        </div>

        <div class="contacto-formulario__campo">
            <label for="email" class="contacto-formulario__label">Correo Electrónico</label>
            <input 
                type="email"
                class="contacto-formulario__input"
                id="email"
                name="contacto[email]"
                placeholder="Correo Electrónico"
            >
        </div>

        <div class="contacto-formulario__campo">
            <label for="ciudad" class="contacto-formulario__label">Ciudad</label>
            <input 
                type="text"
                class="contacto-formulario__input"
                id="ciudad"
                name="contacto[ciudad]"
                placeholder="Ciudad"
            >
        </div>

        <div class="contacto-formulario__campo">
            <label for="estado" class="contacto-formulario__label">Estado</label>
            <input 
                type="text"
                class="contacto-formulario__input"
                id="estado"
                name="contacto[estado]"
                placeholder="Estado"
            >
        </div>

        <div class="contacto-formulario__campo">
            <label for="presupuesto" class="contacto-formulario__label">Presupuesto</label>
            <input 
                type="number"
                class="contacto-formulario__input"
                id="presupuesto"
                name="contacto[presupuesto]"
                placeholder="Ej. 1000000.00"
            >
        </div>

        <div class="contacto-formulario__campo">
            <label for="mensaje" class="contacto-formulario__label">Mensaje</label>
            <textarea 
                class="contacto-formulario__input"
                id="mensaje"
                name="contacto[mensaje]"
                placeholder="Mensaje"
                rows="4"
            ></textarea>
        </div>
    </div>
</fieldset>