<?php

$respuesta=getClientWS("http://10.0.0.3/pg9/jonier.cabrera/ws/servicio.php?wsdl", "miFuncion", 10, 5);

echo"<pre>Consultando El servicio Respuesta ----->:<br>";
var_dump($respuesta);
echo"</pre>";

function getClientWS($url, $nombreMetodo, $n1, $n2) {
    try {
        $client = new SOAPClient($url, array('trace' => 1, 'encoding' => 'ISO-8859-1', 'exceptions' => 1));
        return $client->{$nombreMetodo}($n1, $n2);
    } catch (Exception $exc) {
        echo "Error WS " . $exc->getMessage();
    }
}


?>