<?php
class Usuario
{
    public $id_usuario;
    public $nombre;
    public $num_telefono;
    public $email;
    public $contra;
    public $fecha_nacimiento;
    public $rfc;
    public $foto_perfil;
    public $tipo_usuario;

    public function __construct(
        $id_usuario,
        $nombre,
        $num_telefono,
        $email,
        $contra,
        $fecha_nacimiento,
        $rfc,
        $foto_perfil,
        $tipo_usuario,
    ) {
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->num_telefono = $num_telefono;
        $this->email = $email;
        $this->contra = $contra;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->rfc = $rfc;
        $this->foto_perfil = $foto_perfil;
        $this->tipo_usuario = $tipo_usuario;
    }
}
