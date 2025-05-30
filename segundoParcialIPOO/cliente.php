<?php


class Cliente {
    private $nombre;
    private $apellido;
    private $tipoDoc;
    private $numDoc;

    public function __construct($nombre, $apellido, $tipoDoc, $numDoc) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDoc = $tipoDoc;
        $this->numDoc = $numDoc;
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
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of tipoDoc
     */ 
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }

    /**
     * Set the value of tipoDoc
     *
     * @return  self
     */ 
    public function setTipoDoc($tipoDoc)
    {
        $this->tipoDoc = $tipoDoc;

        return $this;
    }

    /**
     * Get the value of numDoc
     */ 
    public function getNumDoc()
    {
        return $this->numDoc;
    }

    /**
     * Set the value of numDoc
     *
     * @return  self
     */ 
    public function setNumDoc($numDoc)
    {
        $this->numDoc = $numDoc;

        return $this;
    }

    
    public function __toString() {
        return $this->getNombre() . " " . $this->getApellido() . " (" . $this->getTipoDoc() . ": " . $this->getNumDoc() . ")";
    }
}

