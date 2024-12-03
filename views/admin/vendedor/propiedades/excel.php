<!-- <div class="dashboard__excel">
    <form class="formulario" action="/vendedor/propiedad/excel" method="POST" enctype="multipart/form-data" id="form_excel">
        <div class="formulario__excel">
            <input
                class="formulario__input formulario__input--excel" 
                type="file" 
                id="inputExcelFile" 
                name="inputExcelFile"
                accept=".xls, .xlsx"
            >
            <input 
                class="formulario__submit-excel formulario__submit-excel--registrar"
                type="submit"
                value="Importar Excel"
                id="btnCarga"
            >
        </div>
    </form>

    Spinner
     <div class="dashboard__spinner" id="loader">
        <i class="fa-solid fa-spinner dashboard__icono--excel"></i>
     </div>
</div> -->

<div class="dashboard__excel">
    <form class="formulario" action="/vendedor/propiedad/excel" method="POST" enctype="multipart/form-data">
        <div class="formulario__excel">
            <input
                class="formulario__input formulario__input--excel" 
                type="file" 
                id="excel" 
                name="excel"
                accept=".xls, .xlsx"
            >

            <button class="formulario__submit-excel formulario__submit-excel--registrar" name="send" type="submit">Importar Excel</button>
        </div>
    </form>

    <!-- Spinner -->
    <div class="dashboard__spinner" id="loader">
        <i class="fa-solid fa-spinner dashboard__icono--excel"></i>
     </div>
</div>