<?php
include_once "aerolineas.php";
include_once "persona.php";
include_once "vuelo.php";

class Aeropuerto{

    private $denominacion;
    private $direccion;
    private $coleccionAerolineas = [];

    public function __construct($denominacion,$direccion)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionAerolineas = [];
    }



    public function getColeccionAerolineas()
    {
        return $this->coleccionAerolineas;
    }
    
    public function getDenominacion()
    {
        return $this->denominacion;
    }
    
    public function getDireccion()
    {
        return $this->direccion;
    }
    
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
        
        return $this;
    }
    
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
        
        return $this;
    }
    
        public function setColeccionAerolineas($coleccionAerolineas)
        {
            $this->coleccionAerolineas = $coleccionAerolineas;
            return $this;
        }

        public function __toString() {
            $textoAerolineas = "";
            $coleccion = $this->getColeccionAerolineas();
            $i = 0;
            $largo = count($coleccion);
        
            while ($i < $largo) {
                $textoAerolineas .= $coleccion[$i] . "\n";
                $i++;
            }
        
            return "Denominación: " . $this->getDenominacion() . "\n" .
                    "Dirección: " . $this->getDireccion() . "\n" .
                    "Aerolíneas:\n" . $textoAerolineas;
        }
        
        public function retornarVuelosAerolinea($aerolineaBuscada) {
            $coleccion = $this->getColeccionAerolineas();
            $i = 0;
            $largo = count($coleccion);
            $vuelos = [];
        
            while ($i < $largo) {
                $aerolinea = $coleccion[$i];
                if ($aerolinea == $aerolineaBuscada) {
                    $vuelos = $aerolinea->getColeccionVuelosProgramados(); 
                }   
                $i++;
            }
        
            return $vuelos;
        }
        
        public function ventaAutomatica($cantidadAsientos, $fecha, $destino) {
            $coleccionAerolineas = $this->getColeccionAerolineas();
            $vueloAsignado = null;
            $i = 0;
            $largo = count($coleccionAerolineas);
        
            while ($i < $largo && $vueloAsignado === null) {
                $aerolinea = $coleccionAerolineas[$i];
                // yo llame al metodo venderVueloADestino que lo use en clase aerolineas
                $vueloAsignado = $aerolinea->venderVueloADestino($cantidadAsientos, $destino, $fecha);
                $i++;
            }
        
            return $vueloAsignado;
        }
        
        public function promedioRecaudadoXaerolinea($idAerolinea){
            $coleccionAerolineas = $this->getColeccionAerolineas();
            
        }
}
