<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function pagina_actual($path) : bool {
    return str_contains($_SERVER['PATH_INFO'] ?? '/', $path) ? true : false;
}

// Si esta autenticado el usuario
function is_auth() : bool {
    if(!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['nombre']) && !empty($_SESSION);
}

// Si esta autenticado el admin
function is_admin() : bool {
    if(!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['admin']) && !empty($_SESSION['admin']);
}

// Si esta autenticado el vendedor
function is_vendedor() : bool {
    if(!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['vendedor']) && !empty($_SESSION['vendedor']);
}

// animacion
function aos_animacion() : void{
    $efectos = ['zoom-in', 'zoom-in-up'];

    $efecto = array_rand($efectos, 1); // funcion de aletorio

    echo ' data-aos="' . ($efectos[$efecto]) . '" ';
}

// Funcion de Excel
function importarDatos($archivoExcel) {
    // cargar el archivo excel
    $documento = IOFactory::load($archivoExcel);

    // Vamos usar uso de la hoja 1 de excel
    $hojaExcel = $documento->getSheet(0);

    //Obtener la cantidad de filas o registros en la hoja
    $filasExcel = $hojaExcel->getHighestDataRow();
    for($fila = 2; $fila <= $filasExcel; $fila++) {
        $folio = $hojaExcel->getCellByColumnAndRow(1, $fila);
        $titulo = $hojaExcel->getCellByColumnAndRow(2, $fila);
        $precio = $hojaExcel->getCellByColumnAndRow(3, $fila);
        $descripcion = $hojaExcel->getCellByColumnAndRow(4, $fila);
        $habitaciones = $hojaExcel->getCellByColumnAndRow(5, $fila);
        $wc = $hojaExcel->getCellByColumnAndRow(6, $fila);
        $estacionamiento = $hojaExcel->getCellByColumnAndRow(7, $fila);
        $creado = $hojaExcel->getCellByColumnAndRow(8, $fila);
        $status = $hojaExcel->getCellByColumnAndRow(9, $fila);
        $usuarios_id = $hojaExcel->getCellByColumnAndRow(10, $fila);

        

        debuguear($folio . " " . $titulo . " " . $titulo . " " . $precio . " " . $descripcion . " " . $habitaciones . " " . $wc . " " . $estacionamiento . " " . $creado . " " . $status . " " . $usuarios_id);
    }
}
