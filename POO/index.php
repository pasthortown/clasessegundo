<?php
include_once ('./Contacto.php');

$c1 = new Contacto("Luis","0998600661");

echo $c1->nombre . ' ' . $c1->telefono;