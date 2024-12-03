<?php 

namespace Model;

class Cliente extends ActiveRecord {
    protected static $tabla = 'clientes';
    protected static $columnasDB = ['id', 'folio','nombre','apellido','nacimiento','email','telefono','comentarios','tramite','createdt','status','propiedades_id', 'estados_id', 'ciudad_id', 'usuarios_id'];

    public $id;
    public $folio;
    public $nombre;
    public $apellido;
    public $nacimiento;
    public $email;
    public $telefono;
    public $comentarios;
    public $tramite;
    public $createdt;
    public $status;
    public $propiedades_id;
    public $estados_id;
    public $ciudad_id;
    public $usuarios_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? NULL;
        $this->folio = $args['folio'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->nacimiento = $args['nacimiento'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->comentarios = $args['comentarios'] ?? '';
        $this->tramite = $args['tramite'] ?? '';
        $this->createdt = $args['createdt'] ?? '';
        $this->status = $args['status'] ?? '';
        $this->propiedades_id = $args['propiedades_id'] ?? '';
        $this->estados_id = $args['estados_id'] ?? '';
        $this->ciudad_id = $args['ciudad_id'] ?? '';
        $this->usuarios_id = $args['usuarios_id'] ?? '';
    }

    public function validar() {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Nombre';
        }

        if (!$this->apellido) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Apellidos';
        }

        if (!$this->nacimiento) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Fecha de Nacimiento';
        }

        if (!$this->email) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Correo Electrónico';
        }

        if (!$this->telefono) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Teléfono o Celular';
        }

        if (!$this->comentarios) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Comentarios';
        }

        if (!$this->tramite) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Fecha de Tramite';
        }

        if (!$this->status) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Estatus';
        }

        if (!$this->propiedades_id) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Propiedad';
        }

        if (!$this->estados_id) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Estado';
        }

        if (!$this->ciudad_id) {
            self::$alertas['error'][] = 'Es Obligatorio el campo: Ciudad';
        }

        return self::$alertas;
    }
}