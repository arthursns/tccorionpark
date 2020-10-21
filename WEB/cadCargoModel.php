<?php
include ("conexaoBD.php");

$descricao = $_POST['descricao'];

$insertCargo = "INSERT INTO tb_cargo (descricao) VALUES ('$descricao')";
$exec1 = sqlsrv_query($conn, $insertCargo);
if ($exec1 === false) {
	die(print_r(sqlsrv_errors(), true));
}else{
	echo "<script>
	alert('Cargo cadastrado com sucesso!');
	window.location='cadCargo.php'
	</script>";
}
?>