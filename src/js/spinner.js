(function() {
    // formExcel = document.querySelector('#form_excel');
    // formExcel.addEventListener('submit', function(e) {

    //     e.preventDefault();
        
    //     inputExcelFile = document.querySelector('#inputExcelFile');

    //     if(inputExcelFile.files.length === 0) {

    //         Swal.fire({
    //             icon: "warning",
    //             title: "Sin archivo seleccionado",
    //             text: "Favor de seleccionar un archivo Excel"
    //         });
    //     } else {
    //         var extension_permitida = [".xls", ".xlsx"];
    //         var inputExcelFile;
    //         var exp_reg = new RegExp("([a-zA-Z0-9\s_\\-.\:])+(" + extension_permitida.join('|') + ")");

    //         console.log(exp_reg);
    //         console.log(e.inputExcelFile.target.value);
    //     }
    // });


    // function enviar(){
        document.getElementById("btnCarga").addEventListener("click", function() {
            const loader = document.getElementById("loader");
            
            // Muestra el icono de carga
            loader.style.display = "block";
        
            setTimeout(() => {
                // Oculta el icono de carga después de 3 segundos
                loader.style.display = "none";
                Swal.fire({
                    title: "Excel",
                    text: "Importación exitosa",
                    icon: "success"
                });
    
            }, 2000);
        });
    // }
})();