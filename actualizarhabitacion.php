<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$json = json_decode(file_get_contents("php://input"));

$id = $json->ClvHab;
$tarifa = $json->TarifaNoche;
$numero = $json->NumHab;
$piso = $json->PisoHab;
$tipo = $json->TipoHab;
$estatus = $json->Estatus;
$descripcion = $json->DescHab;

$sql = "UPDATE habitaciones SET TarifaNoche='$tarifa', NumHab='$numero', PisoHab='$piso', TipoHab='$tipo', Estatus='$estatus', DescHab='$descripcion' WHERE ClvHab='$id'";
$con = mysqli_connect('localhost', 'root', '2004', 'proyectohotel');
$res = mysqli_query($con,$sql);
mysqli_close($con);

echo json_encode($res);
?>

