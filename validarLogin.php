<?php
header("Access-Control-Allow-Origin: *");

$usuario = $_GET['Usuario'];
$password = $_GET['ContraUsu'];

$sql = "SELECT * FROM usuarios WHERE Usuario='$usuario' AND ContraUsu='$password'";
$con = mysqli_connect('localhost', 'root', '2004', 'proyectohotel');
$res = mysqli_query($con, $sql);
$response = array();
if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $rol = $row['ClvRol'];
    $id = $row['ClvUsu'];
    $nombre = $row['NombreUsu'];
    $response['success'] = true;
    $response['rol'] = $rol;
    $response['id'] = $id;
    $response['nombre'] = $nombre;
} else {
    $response['success'] = false;
}
mysqli_close($con);
echo json_encode($response);
?>
