<?php 
header("Access-Control-Allow-Origin: *");
$id = $_GET['ClvHab'];
$sql = "SELECT * FROM habitaciones WHERE ClvHab='$id'";
$habitacion = array();

$con = mysqli_connect('localhost', 'root', '2004', 'proyectohotel');
$res = mysqli_query($con,$sql);
while($rear = mysqli_fetch_array($res)){
    $habitacion[] = $rear;
}
mysqli_close($con);
echo json_encode($habitacion);
?>

