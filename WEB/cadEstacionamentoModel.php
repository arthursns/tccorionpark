<?php
include ("conexaoBD.php");

//Pegando os dados enviados pelo formulário de cadastro\\

		//Dados estacionamento
		$nome_fantasia = $_POST['nome_fantasia'];
		$razao_social = $_POST['razao_social'];
		$cnpj = $_POST['cnpj'];
		$telefoneEstacionamento = $_POST['telefoneEstacionamento'];

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
		$senha = $_POST['senha'];
		$telefoneUsuario = $_POST['telefoneUsuario'];

//Validação se não há estacionamentos cadastrados no mesmo CNPJ

	$consultaValidaEstacionamento = "SELECT (cnpj) FROM tb_cliente_estacionamento";
	$exec = sqlsrv_query($conn, $consultaValidaEstacionamento);
	if($exec === false) {
	     die(print_r(sqlsrv_errors(), true));
	 }else{
	 	$validaEstacionamento = sqlsrv_fetch_array($exec);
	 	if ($validaEstacionamento['cnpj'] == $cnpj) {
	 		echo "<script>
	 		alert('Já possui um estacionamento cadastrado nesse CNPJ!');
	 		windows.history.back();
	 		</script>";
	 	}
	 }

//Inserções

		 //Inserção tabela Login e coleta do ID inserido para inserção em tabelas dependentes
		 $insertLogin = "INSERT INTO tb_login (nivel_acesso, senha, usuario)
		 VALUES (0, HASHBYTES('md5','$senha'), '$usuario')";
		 $exec1 = sqlsrv_query($conn, $insertLogin);
		 if ($exec1 === false) {
		 	die(print_r(sqlsrv_errors(), true));
		 }else{
		 	$idLoginTemp = "SELECT SCOPE_IDENTITY()";
		 	$exec2 = sqlsrv_query($conn, $idLoginTmp);
		 	if($exec2 === false) {
		     die(print_r(sqlsrv_errors(), true));
		 }
		}

		//2 Inserções tabela telefone


				 //Primeira inserção: Telefone Estacionamento
				 $insertTelEstacionamento = "INSERT INTO tb_telefone (numero)
				 VALUES ($telefoneEstacionamento)";
				 $exec3 = sqlsrv_query($conn, $insertTelEstacionamento);
				 if ($exec3 === false) {
				 	die(print_r(sqlsrv_errors(), true));
				 }else{
				 	$idTelEstacionamentoTmp = "SELECT SCOPE_IDENTITY()";
				 	$exec4 = sqlsrv_query($conn, $idTelEstacionamentoTmp);
				 	if($exec4 === false) {
				     die(print_r(sqlsrv_errors(), true));
				 }
				}

				//Segunda inserção: Telefone Usuario
				  $insertTelUsuario = "INSERT INTO tb_telefone (numero)
				 VALUES ($telefoneUsuario)";
				 $exec5 = sqlsrv_query($conn, $insertTelUsuario);
				 if ($exec5 === false) {
				 	die(print_r(sqlsrv_errors(), true));
				 }else{
				 	$idTelUsuarioTmp = "SELECT SCOPE_IDENTITY()";
				 	$exec6 = sqlsrv_query($conn, $idTelEstacionamentoTmp);
				 	if($exec6 === false) {
				     die(print_r(sqlsrv_errors(), true));
				 }
				}

		//Inserção tabela endereço

		$insertEndereco = "INSERT INTO tb_endereco (bairro, cidade, numero, complemento, rua
		VALUES ('$bairro', '$cidade', $numero, '$complemento', '$rua')";//tenho que adicionar o estado ($UF) após atualização do SQL
		$exec7 = sqlsrv_query($conn, $insertEndereco);
		if ($exec7 === false) {
			die(print_r(sqlsrv_errors(), true));
		}else{
			$idEnderecoTmp = "SELECT SCOPE_IDENTITY()";
			$exec8 = sqlsrv_query($conn, $idEnderecoTmp);
			if ($exec8 === false) {
				die(print_r(sqlsrv_errors(), true));
			}
		}

		//Inserção tabela estacionamento

		$insertEstacionamento = "INSERT INTO tb_cliente_estacionamento (razao_social, nome_fantasia, cnpj, id_endereco, id_telefone)
		VALUES ('$razao_social', '$nome_fantasia', $cnpj, $idEnderecoTmp, $idTelEstacionamentoTmp)";
		$exec9 = sqlsrv_query($conn, $insertEstacionamento);
		if ($exec9 === false) {
			die(print_r(sqlsrv_errors(), true));
		}else{
			$idEstacionamentoTmp = "SELECT SCOPE_IDENTITY()";
			$exec10 = sqlsrv_query($conn, $idEstacionamentoTmp);
			if ($exec10 === false) {
				die(print_r(sqlsrv_errors(), true));
			}
		}


		//Inserção tabela responsável

		$insertResponsavel = "INSERT INTO tb_responsavel (nome, email, id_login, id_cli2)
		VALUES ('$nome', '$email', $idLoginTemp, $idEstacionamentoTmp)";//tenho que adicionar o telefone após atualização do SQL
		$exec11 = sqlsrv_query($conn, $insertResponsavel);
		if ($exec11 === false) {
			die(print_r(sqlsrv_errors(), true));
		}	
?>