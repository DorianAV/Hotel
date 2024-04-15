<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
    header('HTTP/1.1 200 OK');
    exit();
}
$json = json_decode(file_get_contents("php://input"));
$tarifa = $json->TarifaNoche;
$numero = $json->NumHab;
$piso = $json->PisoHab;
$tipo = $json->TipoHab;
$estatus = $json->Estatus;
$descripcion = $json->DescHab;

$sql = "INSERT INTO habitaciones(TarifaNoche, NumHab, PisoHab, TipoHab, Estatus, DescHab) VALUES ('$tarifa','$numero','$piso','$tipo','$estatus','$descripcion')";
$con = mysqli_connect('localhost','root','2004','proyectohotel');
$res = mysqli_query($con, $sql);
mysqli_close($con);

echo json_encode($res);
?>