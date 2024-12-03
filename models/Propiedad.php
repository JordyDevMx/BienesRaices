<?php 

namespace Model;

use PhpOffice\PhpSpreadsheet\IOFactory;

class Propiedad extends ActiveRecord {
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'folio','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','creado', 'status', 'usuarios_id'];

    public $id;
    public $folio;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $status;
    public $usuarios_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? NULL;
        $this->folio = $args['folio'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = $args['creado'] ?? '';
        $this->status = $args['status'] ?? '';
        $this->usuarios_id = $args['usuarios_id'] ?? '';
    }

    public function validar() {
        if (!$this->titulo) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Titulo';
        }

        if (!$this->precio) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Precio';
        }

        if (!$this->imagen) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Imagen';
        }

        if (!$this->descripcion) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Descripcion';
        }

        if (!$this->habitaciones) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Habitaciones';
        }

        if (!$this->wc) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: WC/Baños';
        }

        if (!$this->estacionamiento) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Estacionamiento';
        }

        if (!$this->status) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Estatus';
        }

        return self::$alertas;
    }

    // Importacion de datos excel
    public function importarDatos($archivoExcel) {
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
}