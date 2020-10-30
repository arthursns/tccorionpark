<?php
include('conexaoBD.php');
include("protect.php");
protect();

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cargo = $_POST['cargo'];
$usuario = $_POST['usuario'];
$senha = md5(md5($_POST['senha']));
$id_cli2 = $_SESSION['id_cli2'];
$nivelAcesso = $_POST['nivelAcesso'];

// Função para consultar o último Id inserido
function idTemp($queryID) {
     		sqlsrv_next_result($queryID);
     		sqlsrv_fetch($queryID);
    		return sqlsrv_get_field($queryID, 0);
		}

// Telefone Usuario
		$insertTelefone = "INSERT INTO tb_telefone (numero)
		VALUES ($telefone); SELECT SCOPE_IDENTITY()";
		$exec1 = sqlsrv_query($conn, $insertTelUsuario);
		if ($exec1 === false) {
			die(print_r(sqlsrv_errors(), true));
		}else{
			$idTelefoneTmp = idTemp($exec1);
		}
//Inserção tabela Login
		 $insertLogin = "INSERT INTO tb_login (senha, usuario, id_nivel_acesso)
		 VALUES ('$senha', '$usuario', $nivelAcesso); SELECT SCOPE_IDENTITY()";
		 $exec2 = sqlsrv_query($conn, $insertLogin);
		 if ($exec2 === false) {
		 	die(print_r(sqlsrv_errors(), true));
		 }else{
		 	$idLoginTmp = idTemp($exec2);
		 }
// Cadastro usuario
		$insertResponsavel = "INSERT INTO tb_responsavek (nome, email, id_login, id_cli2, id_telefone, id_cargo)
		VALUES ('$nome', '$email', $idLoginTmp, $id_cli2, $idTelefoneTmp, $cargo";
		$exec3 = sqlsrv_query($conn, $insertResponsavel);
		if ($exec3 === false) {
			die(print_r(sqlsrv_errors(), true));
		}else{
			echo "<script>
			alert('Funcionário cadastrado com sucesso!'); window.location='viewFuncionario.php';
			</script>";
		}
?>