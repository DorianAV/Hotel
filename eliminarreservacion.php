
<?php 
header("Access-Control-Allow-Origin: *");
$id = $_GET['ClvRes'];
$sql = "DELETE FROM reservaciones WHERE ClvRes = '$id'";
$con = mysqli_connect('localhost', 'root', '2004', 'proyectohotel');
$res = mysqli_query($con,$sql);
mysqli_close($con);

echo json_encode($res);
?>