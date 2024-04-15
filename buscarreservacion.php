<?php 
header("Access-Control-Allow-Origin: *");
$id = $_GET['ClvRes'];
$sql = "SELECT * FROM reservaciones WHERE ClvRes='$id'";
$reservacion = array();

$con = mysqli_connect('localhost', 'root', '2004', 'proyectohotel');
$res = mysqli_query($con,$sql);
while($rear = mysqli_fetch_array($res)){
    $reservacion[] = $rear;
}
mysqli_close($con);
echo json_encode($reservacion);
?>

