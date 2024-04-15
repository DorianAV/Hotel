<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
    header('HTTP/1.1 200 OK');
    exit();
}
$json = json_decode(file_get_contents("php://input"));
$nombre = $json->NombreUsu;
$paterno = $json->ApePatUsu;
$materno = $json->ApeMatUsu;
$edad = $json->EdadUsu;
$sexo = $json->SexoUsu;
$usuario = $json->Usuario;
$contrasena = $json->ContraUsu;

$sql = "INSERT INTO usuarios (NombreUsu,ApePatUsu,ApeMatUsu,EdadUsu,SexoUsu,Usuario,ContraUsu,ClvRol) VALUES ('$nombre','$paterno','$materno','$edad','$sexo','$usuario','$contrasena','3')";
$con = mysqli_connect('localhost','root','2004','proyectohotel');
$res = mysqli_query($con,$sql);
mysqli_close($con);

echo json_encode($res);
?>