<?php

require_once "EmpresaCable.php";
require_once "Canales.php";
require_once "Planes.php";
require_once "Cliente.php";
require_once "contrato.php";
require_once "contratoWeb.php";

// 1. Instancia de EmpresaCable
$empresa = new EmpresaCable();

// 2. Instancias de Canales
$canal1 = new Canales("Deportes", 1000, true);
$canal2 = new Canales("Películas", 1200, false);
$canal3 = new Canales("Noticias", 800, true);


$arrayCanales1 = [$canal1, $canal2];
$arrayCanales2 = [$canal2, $canal3];

$plan1 = new Planes(111, $arrayCanales1, 200); // código 111
$plan2 = new Planes(222, $arrayCanales2, 300);


$empresa->incorporarPlan($plan1);
$empresa->incorporarPlan($plan2);

// 4. Instancia de Cliente
$cliente = new Cliente("DNI", 12345678, "Juan", "Pérez");




echo $plan1;
echo $cliente;


$fechaHoy = date('Y-m-d');
$fechaVto = date('Y-m-d', strtotime('+30 days'));

$contrato1 = $empresa->incorporarContrato($plan1, $cliente, $fechaHoy, $fechaVto, false);
$contrato2 = $empresa->incorporarContrato($plan2, $cliente, $fechaHoy, $fechaVto, true);
$contrato3 = $empresa->incorporarContrato($plan1, $cliente, $fechaHoy, $fechaVto, true);
