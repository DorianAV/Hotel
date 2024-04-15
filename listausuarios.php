<?php
header("Access-Control-Allow-Origin: *");
$sql = "SELECT * FROM usuarios";
$lista = array();
$con = mysqli_connect('localhost','root','2004','proyectohotel');
$res = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($res)){
    $lista[]=$row;
}
mysqli_close($con);
echo json_encode($lista);
?>