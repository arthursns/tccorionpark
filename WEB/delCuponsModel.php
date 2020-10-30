<?php
include("conexaoBD.php");
include("protect.php");
protect();

$idCupom = $_POST['idCupom'];

$deleteCupons = "DELETE FROM tb_cupons WHERE id_cupom = $idCupom";
$exec1 = sqlsrv_query($conn, $deleteCupons);
		 if ($exec1 === false) {
		 	die(print_r(sqlsrv_errors(), true));
		 }
?>