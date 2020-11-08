<?php
include("conexaoBD.php");
include("protect.php");
protect();

$idFuncionario = $_POST['idFuncionario'];

$selectFuncionario = "SELECT * FROM tb_responsavel WHERE id_responsavel = $idFuncionario";
$exec1 = sqlsrv_query($conn, $selectFuncionario);
		 if ($exec1 === false) {
		 	die(print_r(sqlsrv_errors(), true));
		 }
$dadosFunc = sqlsrv_fetch_array($exec1);

$idLogin = $dadosFunc['id_login'];
$idTelefone = $dadosFunc['id_telefone'];


$delFuncionario = "DELETE FROM tb_responsavel WHERE id_responsavel = $idFuncionario";
$exec4 = sqlsrv_query($conn, $delFuncionario);
		 if ($exec4 === false) {
		 	die(print_r(sqlsrv_errors(), true));
		 }
$delTelefone = "DELETE FROM tb_telefone WHERE id_telefone = $idTelefone";
$exec2 = sqlsrv_query($conn, $delTelefone);
		 if ($exec2 === false) {
		 	die(print_r(sqlsrv_errors(), true));
		 }

$delLogin = "DELETE FROM tb_login WHERE id_login = $idLogin";
$exec3 = sqlsrv_query($conn, $delLogin);
		 if ($exec3 === false) {
		 	die(print_r(sqlsrv_errors(), true));
		 }

?>