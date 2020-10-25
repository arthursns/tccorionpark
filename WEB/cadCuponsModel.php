<?php
include ("conexaoBD.php");

//Iniciando a session

session_start();

//Pegando o ID do estacionamento logado na session

$id_cli2 = $_SESSION['id_cli2'];

//Pegando os outros dados pelo POST

$descricao = $_POST['descricao'];
$valor = str_replace(',', '.', $_POST['valor'] );
$status = $_POST['status'];
//Inserção tabela cupons

$insertCupons = "INSERT INTO tb_cupons (descricao, status_cupons, id_cli2, valor)
VALUES ('$descricao', $valor, $id_cli2, $status)";
$exec1 = sqlsrv_query($conn, $insertCupons);
if ($exec1 === false) {
	die(print_r(sqlsrv_errors(), true));
}else{
	echo "<script>
	alert('Cupom cadastrado com sucesso!'); 
	</script>";
}
?>