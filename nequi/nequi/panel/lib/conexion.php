<?php

$servername = "sql10.freesqldatabase.com";
$database = "sql10684428";
$username = "sql10684428";
$password = "x9mHbg3ew4";

$path = "http://192.168.1.77:8080/newpaneltrico/";


function conectar (){
	$conn = mysqli_connect($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["database"]);	
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	return $conn;
}

function sentencia($conn, $sql){
	$rst = mysqli_query($conn, $sql);
	return $rst;
}

function contarfilas ($rst){
	$nRows = mysqli_num_rows($rst);
	return $nRows;
}

function traerdatos($rst){
	$filas = mysqli_fetch_assoc($rst);	
	return $filas;
}



function desconectar ($conn){
	mysqli_close($conn);
}


?>
