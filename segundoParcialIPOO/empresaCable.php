<?php

    
class EmpresaCable {

    private $planes;
    private $canales;
    private $clientes;
    private $contratos;

    public function __construct($planes = [], $canales = [], $clientes = [], $contratos = []) {
        $this->planes = $planes;
        $this->canales = $canales;
        $this->clientes = $clientes;
        $this->contratos = $contratos;
    }

    /**
     * Get the value of planes
     */ 
    public function getPlanes()
    {
        return $this->planes;
    }

    /**
     * Set the value of planes
     *
     * @return  self
     */ 
    public function setPlanes($planes)
    {
        $this->planes = $planes;

        return $this;
    }

    /**
     * Get the value of canales
     */ 
    public function getCanales()
    {
        return $this->canales;
    }

    /**
     * Set the value of canales
     *
     * @return  self
     */ 
    public function setCanales($canales)
    {
        $this->canales = $canales;

        return $this;
    }

    /**
     * Get the value of clientes
     */ 
    public function getClientes()
    {
        return $this->clientes;
    }

    /**
     * Set the value of clientes
     *
     * @return  self
     */ 
    public function setClientes($clientes)
    {
        $this->clientes = $clientes;

        return $this;
    }

    /**
     * Get the value of contratos
     */ 
    public function getContratos()
    {
        return $this->contratos;
    }

    /**
     * Set the value of contratos
     *
     * @return  self
     */ 
    public function setContratos($contratos)
    {
        $this->contratos = $contratos;

        return $this;
    }


    public function incorporarPlan($nuevoPlan){
        $i =0;
        $arrayPlanes = $this->getPlanes();
        $largoArrayPlanes = count($arrayPlanes);
        $encontro = false;

        while($i<$largoArrayPlanes && $encontro == false){
            $plan = $arrayPlanes[$i];
            if($plan->getCanalesOfrecidos() == $nuevoPlan->getCanalesOfrecidos() && $plan->getMGDatos() == $nuevoPlan->getMGDatos()){
                $encontro = true;
            }
            $i++;
        }
        if($encontro == false){
            $arrayPlanes[] = $nuevoPlan;
            $this->setPlanes($arrayPlanes); 
        }
    }

    public function buscarContrato($tipoDoc, $numDoc) {
    $contratos = $this->getContratos(); 
    $i = 0;
    $encontro = false;
    $contratoEncontrado = null;
    $cantidad = count($contratos);

    while ($i < $cantidad && !$encontro) {
        $contrato = $contratos[$i];
        $cliente = $contrato->getObjCliente();

        if ($cliente->getTipoDoc() == $tipoDoc && $cliente->getNumDoc() == $numDoc) {
            $contratoEncontrado = $contrato;
            $encontro = true;
        }
        $i++;
    }

    return $contratoEncontrado; // si no lo ecnontre va a devolverme null
}


public function incorporarContrato($plan, $cliente, $fechaInicio, $fechaVencimiento, $esWeb) {
    $contratos = $this->getContratos();
    $i = 0;
    $encontroActivo = false;

    while ($i < count($contratos) && !$encontroActivo) {
        $contrato = $contratos[$i];
        $clienteContrato = $contrato->getObjCliente();

        if ($clienteContrato->getTipoDoc() == $cliente->getTipoDoc() && $clienteContrato->getNumDoc() == $cliente->getNumDoc() && $contrato->getEstado() == "activo") {
            $contrato->setEstado("baja");
            $encontroActivo = true;
        }
        $i++;
    }

    $codigoContrato = count($contratos) + 1;
    $estado = "activo";
    $costo = $plan->getImporte();
    $renovacion = true;
    
    if ($esWeb) {
        $nuevoContrato = new ContratoWeb($codigoContrato,10, 500, $fechaInicio, $fechaVencimiento, $plan, $estado, $costo, $renovacion, $cliente);
    } else {
        $nuevoContrato = new Contrato($codigoContrato, $fechaInicio, $fechaVencimiento, $plan, $estado, $costo, $renovacion, $cliente);
    }

    $contratos[] = $nuevoContrato;
    $this->setContratos($contratos);

    return $nuevoContrato; 
}



public function  retornarPromImporteContratos($codigoPlan){
    $arrayContratos = $this->getContratos();
    $largoContrato = count($arrayContratos);
    $sumaImportes = 0;
    $cantidad = 0;
    $promedioImporte = -1;

    $i = 0;

    while($i<$largoContrato){
        $contrato = $arrayContratos[$i];

        if($contrato->getRefPlan()->getCodigo() ==$codigoPlan){
            $sumaImportes = $sumaImportes + $contrato->getCosto();
            $cantidad++;
        }
        $i++;
    }
    if($cantidad>0){
        $promedioImporte = $sumaImportes / $cantidad;
    }
    return $promedioImporte;
}




public function pagarContrato($codigoContrato) {
    $contratos = $this->getContratos(); // obtengo todos los contratos
    $i = 0;
    $importeFinal = null; // null si no se encuentra el contrato

    while ($i < count($contratos) && $importeFinal === null) {
        $contrato = $contratos[$i];

        if ($contrato->getCodigoContrato() == $codigoContrato) {
            // actualizo el estado del contrato
            $contrato->setEstado("finalizado");

            // retorno el costo del contrato
            $importeFinal = $contrato->getCosto();
        }

        $i++;
    }

    return $importeFinal;
}


public function __toString()
{
    $cadena = "===== Empresa Cable =====\n";

    $cadena .= "Planes:\n";
    foreach ($this->planes as $plan) {
        $cadena .= $plan . "\n";
    }

    $cadena .= "Canales:\n";
    foreach ($this->canales as $canal) {
        $cadena .= $canal . "\n";
    }

    $cadena .= "Clientes:\n";
    foreach ($this->clientes as $cliente) {
        $cadena .= $cliente . "\n";
    }

    $cadena .= "Contratos:\n";
    foreach ($this->contratos as $contrato) {
        $cadena .= $contrato . "\n";
    }

    return $cadena;
}


}