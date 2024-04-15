<?php
header("Access-Control-Allow-Origin: *");
$id = $_GET['ClvUsu'];
$sql = "SELECT * FROM reservaciones WHERE ClvUsu='$id'";
$con = mysqli_connect('localhost','root','','proyectohotel');
$res = mysqli_query($con, $sql);
$lista = array();
while($row = mysqli_fetch_array($res)){
    $lista[]=$row;
}
echo json_encode($lista);
mysqli_close($con);
?>
