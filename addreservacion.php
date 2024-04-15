<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
    header('HTTP/1.1 200 OK');
    exit();
}

$json = json_decode(file_get_contents("php://input"));
$fecha = $json->FechaRes;
$hora = $json->HoraRes;
$idusu = $json->ClvUsu;
$idhab = $json->ClvHab;

$con = mysqli_connect('localhost','root','2004','proyectohotel');
$sqlVerificarEstatus = "SELECT Estatus FROM habitaciones WHERE ClvHab = '$idhab'";
$resVerificarEstatus = mysqli_query($con, $sqlVerificarEstatus);
$row = mysqli_fetch_assoc($resVerificarEstatus);
$estatusHabitacion = $row['Estatus'];

if ($estatusHabitacion == 'Ocupada') {
    echo json_encode(array("success" => false, "message" => "Habitación ocupada. Por favor, seleccione otra opción."));
} else {
    $sqlReservacion = "INSERT INTO reservaciones(FechaRes, HoraRes, ClvUsu, ClvHab) VALUES ('$fecha', '$hora', '$idusu', '$idhab')";
    $sqlActualizarEstatus = "UPDATE habitaciones SET Estatus = 'Ocupada' WHERE ClvHab = '$idhab'";

    $resReservacion = mysqli_query($con, $sqlReservacion);
    $resActualizarEstatus = mysqli_query($con, $sqlActualizarEstatus);

    if ($resReservacion && $resActualizarEstatus) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "message" => "Error al reservar la habitación."));
    }
}

mysqli_close($con);
?>
