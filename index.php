<?php
include_once 'lib/nusoap.php';
//require 'clases/conexion.php';
require 'constructor/local.php';
$consultalic = new consulta_JNE();

$servicio = new soap_server();
$ns = "urn:WebService_MDPP_Deuda_por_Contribuyente";
$servicio->configureWSDL("Webservice Total de Deuda por Contribuyente",$ns);
$servicio->schemaTargetNamespace = $ns;

$servicio->register('consulta_JNE.listar', array('codigoProc' => 'xsd:integer', 'nroSol' => 'xsd:integer', 'dniConsul' => 'xsd:integer'), array('return' => 'xsd:string'), $ns );
/*
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$servicio->service($HTTP_RAW_POST_DATA); */
  $servicio->service(file_get_contents("php://input"));


?>