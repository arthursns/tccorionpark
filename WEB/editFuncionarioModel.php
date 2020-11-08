<?php
include("conexaoBD.php");
include("protect.php");
protect();

$cargo = $_POST['cargoId'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefoneSemTratar = $_POST['telefone'];
$telefone = preg_replace('/[^0-9]/', '', $telefoneSemTratar);
$usuario = $_POST['usuario'];
$id_cli2 = $_SESSION['id_cli2'];
$nivelAcesso = $_POST['nivelAcesso'];
$id_responsavel = $_POST['id_responsavel'];
$id_telefone = $_POST['id_telefone'];
$id_login = $_POST['id_login'];

$editResponsavel = "UPDATE tb_responsavel SET nome = '$nome', email = '$email', id_cargo = $cargo WHERE id_responsavel = $id_responsavel";
$exec1 = sqlsrv_query($conn, $editResponsavel);
if ($exec1 === false) {
	die(print_r(sqlsrv_errors(), true));
}else{
	$editTelefone = "UPDATE tb_telefone SET numero = $telefone WHERE id_telefone = $id_telefone";
	$exec2 = sqlsrv_query($conn, $editTelefone);
	if ($exec2 === false) {
		die(print_r(sqlsrv_errors(), true));
	}else{
		if (!empty($_POST['senha'])) {
			$editLogin = "UPDATE tb_login SET usuario = '$usuario',id_nivel_acesso = $nivelAcesso WHERE id_login = $id_login";
		}else{
			$senha = md5(md5($_POST['senha']));
			$editLogin = "UPDATE tb_login SET usuario = '$usuario', id_nivel_acesso = $nivelAcesso, senha = '$senha' WHERE id_login = $id_login";
		}
		
		$exec3 = sqlsrv_query($conn, $editLogin);
		if ($exec3 === false) {
			die(print_r(sqlsrv_errors(), true));
		}else{
			echo "<script>
			alert('Funcionário editado com sucesso!');
			window.location='viewFuncionario.php';
			</script>";
		}
	}
}	
?>