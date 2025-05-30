<?php


class Planes{

    private $codigo;
    private $canalesOfrecidos;
    private $importe;
    private $MGDatos;

    public function __construct($codigo,$canalesOfrecidos,$importe,$MGDatos = 100){
        $this->codigo = $codigo;
        $this->canalesOfrecidos = $canalesOfrecidos;
        $this->importe = $importe;
        $this->MGDatos = $MGDatos;
    }

    /**
     * Get the value of codigo
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */ 
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of canalesOfrecidos
     */ 
    public function getCanalesOfrecidos()
    {
        return $this->canalesOfrecidos;
    }

    /**
     * Set the value of canalesOfrecidos
     *
     * @return  self
     */ 
    public function setCanalesOfrecidos($canalesOfrecidos)
    {
        $this->canalesOfrecidos = $canalesOfrecidos;

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
     * Get the value of MGDatos
     */ 
    public function getMGDatos()
    {
        return $this->MGDatos;
    }

    /**
     * Set the value of MGDatos
     *
     * @return  self
     */ 
    public function setMGDatos($MGDatos)
    {
        $this->MGDatos = $MGDatos;

        return $this;
    }

    public function __toString()
{
    $cadena = "Código: " . $this->codigo . "\n";
    $cadena .= "Importe: $" . $this->importe . "\n";
    $cadena .= "MG de Datos: " . $this->MGDatos . "MB\n";
    $cadena .= "Canales ofrecidos:\n";

    foreach ($this->canalesOfrecidos as $canal) {
        $cadena .= "  - " . $canal . "\n";
    }

    return $cadena;
}

}