<?php

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$restaurant = $_POST['restaurant'];
$personas = $_POST['personas'];
$observaciones = $_POST['observaciones'];

$mensaje = "Nombre: " . $nombre .  "<br>\n Teléfono: " . $telefono. "<br>\nFecha: " . $fecha . "<br>\nHora: " . $hora . "<br>\n Restaurant: " . $restaurant . "<br>\n Cant. Personas: " . $personas . "<br>\n Observaciones: " . $observaciones;

require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
$oMail= new PHPMailer();
$oMail->isSMTP();
$oMail->Host="smtp.gmail.com";
$oMail->Port=587;
$oMail->SMTPSecure="tls";
$oMail->SMTPAuth=true;
$oMail->Username="caneyburgerbar@gmail.com";
$oMail->Password="elcaney1234";
$oMail->setFrom("caneyburgerbar@gmail.com","Nueva Reserva");
$oMail->addAddress("caneyburgerbar@gmail.com","Nueva Reserva");
$oMail->Subject="Reserva";
$oMail->msgHTML($mensaje);
 
if(!$oMail->send())
  echo $oMail->ErrorInfo;  
  
echo "<script>alert('Reserva realizada exitosamente')</script>";
echo "<script> setTimeout(\"location.href='index.html'\",1000)</script>";
?>