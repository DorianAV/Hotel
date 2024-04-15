<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$json = json_decode(file_get_contents("php://input"));
$id = $json->ClvRes;
$fecha = $json->FechaRes;
$hora = $json->HoraRes;
$idusu = $json->ClvUsu;
$idhab = $json->ClvHab;
$sql = "UPDATE reservaciones SET FechaRes='$fecha', HoraRes='$hora', ClvUsu='$idusu', ClvHab='$idhab' WHERE ClvRes='$id'";
$con = mysqli_connect('localhost', 'root', '2004', 'proyectohotel');
$res = mysqli_query($con,$sql);
mysqli_close($con);

echo json_encode($res);
?>

