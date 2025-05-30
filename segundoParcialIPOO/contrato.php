<?php


class Contrato{

    private $codigoContrato;
    private $fechaInicio;
    private $fechaVencimiento;
    private $refPlan;
    private $estado;
    private $costo;
    private $renovacion;
    private $objCliente;

    public function __construct($codigoContrato,$fechaInicio,$fechaVencimiento,$refPlan,$estado,$costo,$renovacion,$objCliente){
        $this->codigoContrato = $codigoContrato;
        $this->fechaInicio = $fechaInicio;
        $this->fechaVencimiento = $fechaVencimiento;
        $this->refPlan = $refPlan;
        $this->estado = $estado;
        $this->costo = $costo;
        $this->renovacion = $renovacion;
        $this->objCliente = $objCliente;
    }

    

    /**
     * Get the value of fechaInicio
     */ 
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set the value of fechaInicio
     *
     * @return  self
     */ 
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get the value of fechaVencimiento
     */ 
    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    /**
     * Set the value of fechaVencimiento
     *
     * @return  self
     */ 
    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }

    /**
     * Get the value of refPlan
     */ 
    public function getRefPlan()
    {
        return $this->refPlan;
    }

    /**
     * Set the value of refPlan
     *
     * @return  self
     */ 
    public function setRefPlan($refPlan)
    {
        $this->refPlan = $refPlan;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of costo
     */ 
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set the value of costo
     *
     * @return  self
     */ 
    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }

    /**
     * Get the value of renovacion
     */ 
    public function getRenovacion()
    {
        return $this->renovacion;
    }

    /**
     * Set the value of renovacion
     *
     * @return  self
     */ 
    public function setRenovacion($renovacion)
    {
        $this->renovacion = $renovacion;

        return $this;
    }

    /**
     * Get the value of objCliente
     */ 
    public function getObjCliente()
    {
        return $this->objCliente;
    }

    /**
     * Set the value of objCliente
     *
     * @return  self
     */ 
    public function setObjCliente($objCliente)
    {
        $this->objCliente = $objCliente;

        return $this;
    }
        /**
     * Get the value of codigoContrato
     */ 
    public function getCodigoContrato()
    {
        return $this->codigoContrato;
    }
    /**
     * Set the value of codigoContrato
     *
     * @return  self
     */ 
    public function setCodigoContrato($codigoContrato)
    {
        $this->codigoContrato = $codigoContrato;

        return $this;
    }







    public function diasContratoVencido($contrato){
        $hoy = new DateTime();
        if($hoy>$this->getFechaVencimiento()){

        }
    }

    public function actualizarEstadoContrato() {
    $diasVencidos = $this->diasContratoVencido($this);

    if ($diasVencidos == 0) {
        $this->setEstado("al dia");
    } elseif ($diasVencidos <= 10) {
        $this->setEstado("moroso");
    } else {
        $this->setEstado("suspendido");
    }
}

    public function calcularImporte(){
        $plan = $this->getRefPlan();
        $importePlan = $plan->getImporte();  // importe base del plan
        $importeCanales = 0;

        $canales = $plan->getCanalesOfrecidos();

        foreach($canales as $canal){
            $importeCanales += $canal->getImporte();
        }
        
        $importeTotal = $importePlan + $importeCanales;

        
        return $importeTotal;   
    }





    public function __toString()
    {
        return "Fecha de inicio de contrato: " . $this->getFechaInicio() . " fecha de Vencimiento: " . $this->getFechaVencimiento() . " Plan: " . $this->getRefPlan() . " estado: " . $this->getEstado() . " costo: " . $this->getCosto() . " Renovacion: " . $this->getRenovacion() . " Cliente: " . $this->getObjCliente();
    }




}