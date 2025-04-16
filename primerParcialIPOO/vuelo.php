<?php
include_once "aerolineas.php";
include_once "persona.php";
include_once "aeropuerto.php";


class Vuelo{

    private $numero;
    private $importe;
    private $fecha;
    private $destino;
    private $horaArribo;
    private $horaPartida;
    private $cantAsientosTotal;
    private $AsientosDisponibles;
    private $refPersona;


    public function __construct($nro,$importe,$fecha,$destino,$horaArribo,$horaPartida,$cantAsientosTotal,$AsientosDisponibles,$refPersona){
            $this->numero = $nro;
            $this->importe = $importe;
            $this->fecha = $fecha;
            $this->destino = $destino;
            $this->horaArribo = $horaArribo;
            $this->horaPartida = $horaPartida;
            $this->cantAsientosTotal = $cantAsientosTotal;
            $this->AsientosDisponibles = $AsientosDisponibles;
            $this->refPersona = $refPersona;
    }

    //getters(acceso)
    public function getNumero()
    {
        return $this->numero;
    }

    public function getImporte()
    {
        return $this->importe;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getDestino()
    {
        return $this->destino;
    }

    public function getHoraArribo()
    {
        return $this->horaArribo;
    }

    public function getHoraPartida()
    {
        return $this->horaPartida;
    }

    public function getCantAsientosTotal()
    {
        return $this->cantAsientosTotal;
    }

    public function getAsientosDisponibles()
    {
        return $this->AsientosDisponibles;
    }

    public function getRefPersona()
    {
        return $this->refPersona;
    }


    //SETTERS(modificar)s$this;
    public function setNumero($numero){
        $this->numero = $numero;
        return $this;
    }
    public function setImporte($importe){
        $this->importe = $importe;
        return $this;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
        return $this;
    }
    public function setDestino($destino){
        $this->destino = $destino;
        return $this;
    }    

    public function setHoraArribo($horaArribo){
        $this->horaArribo = $horaArribo;
        return $this;
    }    
    public function setHoraPartida($horaPartida){
        $this->horaPartida = $horaPartida;
        return $this;
    }
    
    public function setCantAsientosTotal($cantAsientosTotal)
    {
        $this->cantAsientosTotal = $cantAsientosTotal;

        return $this;
    }

    public function setAsientosDisponibles($AsientosDisponibles)
    {
        $this->AsientosDisponibles = $AsientosDisponibles;

        return $this;
    }


    public function setRefPersona($refPersona)
    {
        $this->refPersona = $refPersona;

        return $this;
    }

    public function asignarAsientosDisponibles($cantPasajeros){
        $disponibles = false;
        $cantAsientosDisp = $this->getAsientosDisponibles();
            if($cantAsientosDisp>= $cantPasajeros){
                $disponibles = true;
            }
            return $disponibles;
        }
        


    public function __toString() {
        return "Vuelo N°: " . $this->getNumero() . "\n" .
                "Fecha: " . $this->getFecha() . "\n" .
                "Destino: " . $this->getDestino() . "\n" .
                "Hora de Partida: " . $this->getHoraPartida() . "\n" .
                "Hora de Arribo: " . $this->getHoraArribo() . "\n" .
                "Asientos Disponibles: " . $this->getAsientosDisponibles() . "/" . $this->getCantAsientosTotal() . "\n" .
                "Importe: $" . $this->getImporte() . "\n" .
                "Persona Responsable: " . $this->getRefPersona();
    }
}    