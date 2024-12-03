<?php 

namespace Model;

class Compromiso extends ActiveRecord {
    protected static $tabla = 'compromisos';
    protected static $columnasDB = ['id','titulo','descripcion', 'imagen'];

    public $id;
    public $titulo;
    public $descripcion;
    public $imagen;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? NULL;
        $this->titulo = $args['titulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }

    public function validar() {
        if (!$this->titulo) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Titulo';
        }

        if (!$this->descripcion) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: descripcion';
        }

        if (!$this->imagen) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Imagen';
        }

        return self::$alertas;
    }
}