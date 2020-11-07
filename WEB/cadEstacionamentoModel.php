<?php
include ("conexaoBD.php");

//Pegando os dados enviados pelo formulário de cadastro\\

		//Dados estacionamento
		$nome_fantasia = $_POST['nome_fantasia'];
		$razao_social = $_POST['razao_social'];
		$cnpjSemTratar = $_POST['cnpj'];
		$cnpj = preg_replace('/[^0-9]/', '', $cnpjSemTratar);
		$telefoneEstacionamentoSemTratar = $_POST['telefoneEstacionamento'];
		$telefoneEstacionamento = preg_replace('/[^0-9]/', '', $telefoneEstacionamentoSemTratar);

		//Dados endereço do estacionamento
		$rua = $_POST['rua'];
		$cidade = $_POST['cidade'];
		$bairro = $_POST['bairro'];
		$UF = $_POST['estado'];
		$numero = $_POST['numero'];
		$complemento = $_POST['complemento'];

		//Dados Administrador
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$usuario = $_POST['usuario'];
		$senha = md5(md5($_POST['senha']));
		$telefoneUsuarioSemTratar = $_POST['telefoneUsuario'];
		$telefoneUsuario = preg_replace('/[^0-9]/', '', $telefoneUsuarioSemTratar);
		$cargo = $_POST['cargo'];

//Validação se não há estacionamentos cadastrados no mesmo CNPJ
	$consultaValidaEstacionamento = "SELECT (cnpj) FROM tb_cliente_estacionamento";
	$params = array();
	$options =  array('Scrollable' => SQLSRV_CURSOR_KEYSET);
	$exec = sqlsrv_query($conn, $consultaValidaEstacionamento, $params, $options);
	if($exec === false) {
	     die(print_r(sqlsrv_errors(), true));
	 }else{
	 	$numEstacionamentos = sqlsrv_num_rows($exec);
	 	$validaEstacionamento = sqlsrv_fetch_array($exec);
		}if ($numEstacionamentos > 0) {
			if ($validaEstacionamento['cnpj'] === $cnpj) {
			echo "<script>
	 		alert('Já possui um estacionamento cadastrado nesse CNPJ!');
	 		window.history.back();
	 		</script>";
			}
	 	}
	 	else {


// Função para consultar o último Id inserido
function idTemp($queryID) {
     		sqlsrv_next_result($queryID);
     		sqlsrv_fetch($queryID);
    		return sqlsrv_get_field($queryID, 0);
		}

//Inserções

		 //Inserção tabela Login e coleta do ID inserido para inserção em tabelas dependentes
		 $insertLogin = "INSERT INTO tb_login (senha, usuario, id_nivel_acesso)
		 VALUES ('$senha', '$usuario', 1); SELECT SCOPE_IDENTITY()";
		 $exec1 = sqlsrv_query($conn, $insertLogin);
		 if ($exec1 === false) {
		 	die(print_r(sqlsrv_errors(), true));
		 }else{
		 	$idLoginTmp = idTemp($exec1);
		 }

//2 Inserções tabela telefone

		//Primeira inserção: Telefone Estacionamento
		$insertTelEstacionamento = "INSERT INTO tb_telefone (numero)
		VALUES ('$telefoneEstacionamento'); SELECT SCOPE_IDENTITY()";
		$exec2 = sqlsrv_query($conn, $insertTelEstacionamento);
		if ($exec2 === false) {
			die(print_r(sqlsrv_errors(), true));
		}else{
			$idTelEstacionamentoTmp = idTemp($exec2);
		}

		//Segunda inserção: Telefone Usuario
		$insertTelUsuario = "INSERT INTO tb_telefone (numero)
		VALUES ($telefoneUsuario); SELECT SCOPE_IDENTITY()";
		$exec3 = sqlsrv_query($conn, $insertTelUsuario);
		if ($exec3 === false) {
			die(print_r(sqlsrv_errors(), true));
		}else{
			$idTelUsuarioTmp = idTemp($exec3);
		}		
				
//Inserção tabela endereço

$insertEndereco = "INSERT INTO tb_endereco (bairro, cidade, numero, complemento, rua, UF)
VALUES ('$bairro', '$cidade', $numero, '$complemento', '$rua', '$UF'); SELECT SCOPE_IDENTITY()";//tenho que adicionar o estado ($UF) após atualização do SQL
$exec4 = sqlsrv_query($conn, $insertEndereco);
if ($exec4 === false) {
	die(print_r(sqlsrv_errors(), true));
}else{
	$idEnderecoTmp = idTemp($exec4);
}
		
//Inserção tabela estacionamento

$insertEstacionamento = "INSERT INTO tb_cliente_estacionamento (razao_social, nome_fantasia, cnpj, id_endereco, id_telefone)
VALUES ('$razao_social', '$nome_fantasia', $cnpj, $idEnderecoTmp, $idTelEstacionamentoTmp); SELECT SCOPE_IDENTITY()";
$exec5 = sqlsrv_query($conn, $insertEstacionamento);
if ($exec5 === false) {
	die(print_r(sqlsrv_errors(), true));
}else{
	$idEstacionamentoTmp = idTemp($exec5);
}		
		
//Inserção tabela cargo

$insertCargo = "INSERT INTO tb_cargo (descricao)
VALUES ('$cargo'); SELECT SCOPE_IDENTITY()";
$exec6 = sqlsrv_query($conn, $insertCargo);
if ($exec6 === false) {
	die(print_r(sqlsrv_errors(), true));
}else{
	$idCargoTmp = idTemp($exec6);
}

//Inserção tabela responsável
$insertResponsavel = "INSERT INTO tb_responsavel (nome, email, id_login, id_cli2, id_telefone, id_cargo)
VALUES ('$nome', '$email', $idLoginTmp, $idEstacionamentoTmp, $idTelUsuarioTmp, $idCargoTmp)";
$exec7 = sqlsrv_query($conn, $insertResponsavel);
if ($exec7 === false) {
	die(print_r(sqlsrv_errors(), true));
}else{
	echo "<script>
	alert('Estacionamento cadastrado com sucesso!'); window.location='loginEstacionamento.php';
	</script>";
}
}
?>