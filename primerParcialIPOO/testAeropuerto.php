
<?php
include_once "aerolineas.php";
include_once "persona.php";
include_once "vuelo.php";
include_once "aeropuerto.php";

//  instancias de aerolíneas
$objAerolinea1 = new Aerolineas(3,"LAN");
$objAerolinea2 = new Aerolineas(2,"Aerolineas Argentinas");

//  instancias de personas
$persona1 = new Persona("juan", "perez", "av lugones", "dir@mail.com", "2994533443" );
$persona2 = new Persona("jose", "fernandez", "av luguercio", "dir@mail.com", "299454443");
$persona3 = new Persona("mariela", "falcioni", "av libertador", "dir@mail.com", "299434545");
$persona4 = new Persona("esteba", "perez", "av sanmartin", "dir@mail.com", "2994453635");

// vuelos
$vuelo1 = new Vuelo(32,20000,"21/10/25","brasil", "12:30","9:30",360,200,$persona1);
$vuelo2 = new Vuelo(23,20000,"21/11/25","jamaica", "12:30","9:30",360,120,$persona2);
$vuelo3 = new Vuelo(342,20000,"21/12/25","peru", "12:30","9:30",360,43,$persona3);
$vuelo4 = new Vuelo(322,20000,"21/4/25","dakota", "12:30","9:30",360,10,$persona4);

// Incorporar los vuelos a las aerolíneas
$objAerolinea1->incorporarVuelo($vuelo1);
$objAerolinea1->incorporarVuelo($vuelo2);

$objAerolinea2->incorporarVuelo($vuelo3);
$objAerolinea2->incorporarVuelo($vuelo4);

$objAeropuerto = new Aeropuerto("Aeropuerto Internacional", "Ciudad Genérica");


$objAeropuerto->setColeccionAerolineas([$objAerolinea1, $objAerolinea2]);

$vueloAsignado = $objAeropuerto->ventaAutomatica(32, "brasil", "21/10/25");




echo $vueloAsignado;
?>
