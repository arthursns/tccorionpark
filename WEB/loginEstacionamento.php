<!DOCTYPE html>
<html>
<?php

include("conexao.php");

//Verificação se usuário já acessou
if(isset($_POST['user']) && strlen($_POST['user']) > 0){
	if(!isset($_SESSION))
		session_start();

	$_SESSION['user'] = $_POST['user'];
	$_SESSION['password'] = md5(md5($_POST['password']));

	//Selecionar usuário para verificar se há usuarios cadastrados 
	$sqlcode1 = "SELECT senha_usuario, id_usuario FROM usuario WHERE login_usuario = '$_SESSION[user]'";
	$sqlcode2 = $mysqli->query($sqlcode1) or die($mysqli->error);
	$dado = $sqlcode2->fetch_assoc();
	$total = $sqlcode2->num_rows;
	$erro = [];
	$idlogado = $dado['id_usuario'];
	$_SESSION['idlogado'] = $idlogado;
	$sql1 = "SELECT nivelacesso FROM usuario WHERE id_usuario = '$idlogado'";
	$sql1exec = $mysqli->query($sql1) or die($mysqli->error);
	$dado1 = $sql1exec->fetch_assoc();
	$_SESSION['nivelacesso'] =  $dado1['nivelacesso'];

	if ($total ==0) {
		$erro[] = "<script>alert('Este usuário não existe.')</script>";
	}else{

		if ($dado['senha_usuario'] == $_SESSION['password']) {

			$_SESSION['usuario'] = $dado['id_usuario']; 
			
		}else{
			$erro[]="<script>alert('Senha incorreta')</script>";
		}
}
	if (count($erro) == 0 || !isset($erro)) {
		echo "<script>alert('Logado com sucesso'); location.href='index.php'</script>";
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
	<a>Usuário:</a>
	<input type="text" name="cnpj" placeholder="CNPJ do estacionamento">
	<br>
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