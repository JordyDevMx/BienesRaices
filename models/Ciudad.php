<?php 

namespace Model;

class Ciudad extends ActiveRecord {
    protected static $tabla = 'ciudad';
    protected static $columnasDB = ['id','ciudad','direccion','contacto','maps', 'estados_id'];

    public $id;
    public $ciudad;
    public $direccion;
    public $contacto;
    public $maps;
    public $estados_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? NULL;
        $this->ciudad = $args['ciudad'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->contacto = $args['contacto'] ?? '';
        $this->maps = $args['maps'] ?? '';
        $this->estados_id = $args['estados_id'] ?? '';
    }

    public function validar() {
        if (!$this->ciudad) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Ciudad';
        }

        if (!$this->direccion) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Dirección';
        }

        if (!$this->contacto) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Contacto';
        }

        if (!$this->maps) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: URL para el mapa';
        }

        if (!$this->estados_id) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Estado';
        }

        return self::$alertas;
    }
}