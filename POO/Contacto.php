<?php

class Contacto {
    public $nombre;
    public $telefono;

    function __construct ($nombre, $telefono){
        $this->nombre = $nombre;
        $this->telefono = $telefono;
    }
}