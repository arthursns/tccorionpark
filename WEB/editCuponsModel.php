<?php
include ("conexaoBD.php");
include("protect.php");
protect();

//Pegando os outros dados pelo POST

$id = $_POST['idCupom'];
$descricao = $_POST['descricao'];
$valor = str_replace(',', '.', $_POST['dinheiro']); 
$status = $_POST['status'];
//Inserção tabela cupons

$editCupons = "UPDATE tb_cupons SET valor = $valor, descricao = '$descricao', status_cupons = $status WHERE id_cupom = $id";
$exec1 = sqlsrv_query($conn, $editCupons);
if ($exec1 === false) {
	die(print_r(sqlsrv_errors(), true));
}else{
	echo "<script>
	alert('Cupom editado com sucesso!');
	window.location='viewCupons.php';
	</script>";
}
?>