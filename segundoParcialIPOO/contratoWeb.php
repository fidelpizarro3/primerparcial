<?php

class ContratoWeb extends Contrato {

    private $porcentajeDescuento;
    private $costoWeb;

    public function __construct($porcentajeDescuento,$costoWeb,$codigoContrato,$fechaInicio,$fechaVencimiento,$refPlan,$estado,$costo,$renovacion,$objCliente){
        parent::__construct($codigoContrato,$fechaInicio,$fechaVencimiento,$refPlan,$estado,$costo,$renovacion,$objCliente);
        $this->porcentajeDescuento = $porcentajeDescuento;
        $this->costoWeb = $costoWeb;
    }


    public function getPorcentajeDescuento()
    {
        return $this->porcentajeDescuento;
    }


    public function setPorcentajeDescuento($porcentajeDescuento)
    {
        $this->porcentajeDescuento = $porcentajeDescuento;

        return $this;
    }


    public function getCostoWeb()
    {
        return $this->costoWeb;
    }


    public function setCostoWeb($costoWeb)
    {
        $this->costoWeb = $costoWeb;

        return $this;
    }


public function calcularImporte() {
    // use el metodo del padre para que me traiga el descuento
    $importeTotal = parent::calcularImporte();

    $descuento = $this->getPorcentajeDescuento();

    if ($descuento == null) {
        $descuento = 10;  // el valoor por defecto esd el 10%
    }

    $importeConDescuento = $importeTotal - ($importeTotal * $descuento / 100);

    return $importeConDescuento;
}



    public function __toString()
    {
        return parent::__toString() . " Porcentaje de descuento: " . $this->getPorcentajeDescuento() . " Costo en web: " . $this->getCostoWeb();
    }
}