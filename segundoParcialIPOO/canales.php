<?php

class Canales{

    private $tipoCanal;
    private $importe;
    private $esHD;


    public function __construct($tipoCanal,$importe,$esHD){
        $this->tipoCanal = $tipoCanal;
        $this->importe = $importe;
        $this->esHD = $esHD;
    }
    

    /**
     * Get the value of tipoCanal
     */ 
    public function getTipoCanal()
    {
        return $this->tipoCanal;
    }

    /**
     * Set the value of tipoCanal
     *
     * @return  self
     */ 
    public function setTipoCanal($tipoCanal)
    {
        $this->tipoCanal = $tipoCanal;

        return $this;
    }

    /**
     * Get the value of importe
     */ 
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set the value of importe
     *
     * @return  self
     */ 
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get the value of esHD
     */ 
    public function getEsHD()
    {
        return $this->esHD;
    }

    /**
     * Set the value of esHD
     *
     * @return  self
     */ 
    public function setEsHD($esHD)
    {
        $this->esHD = $esHD;

        return $this;
    }

    public function __toString()
{
    $hdTexto = $this->esHD ? "Sí" : "No";

    return "Tipo de Canal: " . $this->tipoCanal . "\n" .
            "Importe: $" . $this->importe . "\n" .
            "¿Es HD?: " . $hdTexto . "\n";
}

}