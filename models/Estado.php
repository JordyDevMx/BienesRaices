<?php 

namespace Model;

class Estado extends ActiveRecord {
    protected static $tabla = 'estados';
    protected static $columnasDB = ['id','estado','abreviacion'];

    public $id;
    public $estado;
    public $abreviacion;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? NULL;
        $this->estado = $args['estado'] ?? '';
        $this->abreviacion = $args['abreviacion'] ?? '';
    }
}