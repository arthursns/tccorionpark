<!DOCTYPE html>
<html>
<?php

include("conexaoBD.php");

//Verificação se usuário já acessou
if(isset($_POST['user']) && strlen($_POST['user']) > 0){
	if(!isset($_SESSION))
		session_start();

	$_SESSION['user'] = $_POST['user'];
	$_SESSION['password'] = md5(md5($_POST['password']));
	$_SESSION['cnpj'] = $_POST['cnpj'];

	//Selecionar usuário para verificar se há usuarios cadastrados com o mesmo inserido pelo usuário
	$selectLogin = "SELECT senha, usuario FROM tb_login INNER JOIN tb_responsavel ON tb_responsavel.id_login = tb_login.id_login INNER JOIN tb_cliente_estacionamento ON tb_cliente_estacionamento.id_cli2 = tb_responsavel.id_cli2 WHERE usuario = '$_SESSION[user]' AND tb_cliente_estacionamento.cnpj LIKE '$_SESSION[cnpj]'";
	$exec1 = sqlsrv_query($conn, $selectLogin);
	if ($exec1 === false) {
			 	die(print_r(sqlsrv_errors(), true));
			 }
	$dado = sqlsrv_fetch_array($exec1);
	$verificaConsulta = sqlsrv_has_rows($exec1);
	$erro = [];
	if ($verificaConsulta === false) {
		$erro[] = "<script>alert('Este usuário não existe.')</script>";
	}else{

		if ($dado['senha'] == $_SESSION['password']) {
		}else{
			$erro[]="<script>alert('Senha incorreta')</script>";
		}
}
	if (count($erro) == 0 || !isset($erro)) {
		echo "<script>alert('Logado com sucesso'); location.href='indexGerenciador.php'</script>";
	}
}
?>
<head>
	<title>Login</title>
</head>
<body>
	<?php if(isset($erro) > 0)
		foreach ($erro as $msg) {
			echo "<p>$msg</p>";
		}
	?>
	<p id="titulo">Entre para continuar</p>
	<form name="formlogin" method="POST">
	<a>CNPJ do estacionamento:</a>
	<input type="text" name="cnpj" placeholder="CNPJ do estacionamento">
	<br>
	<br>
	<a>Usuario</a>
	<input value="<?php if(isset($_SESSION)) echo $_SESSION['user'] ?>" type="text" name="user">
	<br>
	<br>
	<a>Senha:</a>
	<br>
	<input type="password" name="password">
	<br>
	<br>
	<input type="submit" value="Entrar">
</form>
</body>
</html>