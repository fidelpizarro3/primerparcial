<?php
include_once "vuelo.php";
include_once "persona.php";
include_once "aeropuerto.php";


class Aerolineas{

    private $identificacion;
    private $nombre ;
    private $coleccionVuelosProgramados = [];

    public function __construct($id,$name)
    {
        $this->identificacion = $id;
        $this->nombre = $name;
        $this->coleccionVuelosProgramados = [];
    }

    /**
     * Get the value of identificacion
     */ 
    public function getIdentificacion()
    {
        return $this->identificacion;
    }

    /**
     * Set the value of identificacion
     *
     * @return  self
     */ 
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of coleccionVuelosProgramados
     */ 
    public function getColeccionVuelosProgramados()
    {
        return $this->coleccionVuelosProgramados;
    }

    /**
     * Set the value of coleccionVuelosProgramados
     *
     * @return  self
     */ 
    public function setColeccionVuelosProgramados($coleccionVuelosProgramados)
    {
        $this->coleccionVuelosProgramados = $coleccionVuelosProgramados;

        return $this;
    }

    public function darVueloADestino($destino,$cantAsientos){
        $coleccionVuelos = [];
        $vuelosProgramados = $this->getColeccionVuelosProgramados();

        foreach($vuelosProgramados as $objVuelo){
            $eldestino = $objVuelo->getDestino();
            $cantDisponible = $objVuelo->getAsientosDisponibles();
            if($eldestino == $destino && $cantDisponible >= $cantAsientos){
                $coleccionVuelos[] = $objVuelo;
            }
        }
        return $coleccionVuelos;
    }


    public function incorporarVuelo($vuelo) {
        $bandera = false;
        $coleccionVuelos = $this->getColeccionVuelosProgramados();
        $i = 0;
        $seIncorporo = false;
        $largoArray = count($coleccionVuelos);
    
        while ($bandera == false && $i < $largoArray) {
            $vueloExiste = $coleccionVuelos[$i];
            if (
                $vueloExiste->getDestino() == $vuelo->getDestino() && $vueloExiste->getFecha() == $vuelo->getFecha() && $vueloExiste->getHoraPartida() == $vuelo->getHoraPartida()
            ) {
                $bandera = true;
            }
            $i++;
        }
    
        if ($bandera == false) {
            $coleccionVuelos[] = $vuelo;
            $this->setColeccionVuelosProgramados($coleccionVuelos);
            $seIncorporo = true;
        } else {
            $seIncorporo = false;
        }
        return $seIncorporo;
    }
    

    public function venderVueloADestino($cantidadAsientos, $destino, $fecha) {
        $coleccionVuelos = $this->getColeccionVuelosProgramados();
        $i = 0;
        $encontrado = false;
        $largo = count($coleccionVuelos);
        $vueloSeleccionado = null;
    
        while (!$encontrado && $i < $largo) {
            $vuelo = $coleccionVuelos[$i];
    
            if (
                $vuelo->getDestino() == $destino && $vuelo->getFecha() == $fecha && $vuelo->getAsientosDisponibles() >= $cantidadAsientos
            ) {
                $vuelo->asignarAsientosDisponibles($cantidadAsientos);
                $vueloSeleccionado = $vuelo;
                $encontrado = true;
            }
    
            $i++;
        }
    
        return $vueloSeleccionado;
    }
    
    public function __toString()
{
    return "Identificación: " . $this->getIdentificacion() . "\n" . 
            "Nombre: " . $this->getNombre() . "\n" . 
            "Vuelos Programados: " . count($this->getColeccionVuelosProgramados()) . "\n";
}

}    