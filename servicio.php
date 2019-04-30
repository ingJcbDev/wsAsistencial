<?php

include_once 'nusoap/lib/nusoap.php';

$ns = getObtenerUrl();

//Setup del WSDL 
$server = new soap_server();
$server->configureWSDL('MiWS', 'urn:wsServicio');

$server->wsdl->schemaTargetNamespace = $ns;


$server->register('miFuncion', // nombre del metodo o funcion
        array('N1' => 'xsd:int', 'N2' => 'xsd:int'), // parametros de entrada        
        array('result' => 'xsd:int'), // parametros de salida
        'urn:wsServicio', // namespace
        'urn:wsServicio#miFuncion', // soapaction debe ir asociado al nombre del metodo
        'rpc', // style
        'encoded', // use
        'Webservice: **' // documentation
);

function miFuncion($n1, $n2) {
    $r = $n1 + $n2;
    return $r;
}

function getObtenerUrl() {
    $url = "http://" . $_SERVER['HTTP_HOST'] . ":" . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
    return $url;
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
