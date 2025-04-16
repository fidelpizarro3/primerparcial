<?php
include_once "aerolineas.php";
include_once "aeropuerto.php";
include_once "vuelo.php";

class Persona{
    private $nombrePersona;
    private $apellidoPersona;
    private $direccionPersona;
    private $mailPersona;
    private $telefonoPersona;

    public function __construct($nombre,$apellido,$direccion,$mail,$telefono)
    {
        $this->nombrePersona = $nombre;
        $this->apellidoPersona = $apellido;
        $this->direccionPersona = $direccion;
        $this->mailPersona = $mail;
        $this->telefonoPersona = $telefono;

    }

    public function __toString()
    {
        return 
        "Nombre: " . $this->getNombrePersona() . "\n" .
        " Apellido: " . $this->getApellidoPersona() . "\n" . 
        " direccion: " . $this->getDireccionPersona() . "\n" .
        " mail: " . $this->getMailPersona() . "\n" . 
        " telefono: " . $this->getTelefonoPersona() . "\n";
    }
}