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
    
        //Verificação se o usuário digitado pelo usuário confere ao cadastrado no Banco de dados
        if ($verificaConsulta === false) {
            $erro[] = "<script>alert('Este usuário não existe.')</script>";
        }else{
    
            //Verificação se a senha digitada pelo usuário confere com a cadastrada no Banco de dados
            if ($dado['senha'] == $_SESSION['password']) {
            }else{
                $erro[]="<script>alert('Senha incorreta')</script>";
            }
    }
        // Não constando nenhum erro, logado com sucesso
        if (count($erro) == 0 || !isset($erro)) {
            echo "<script>alert('Logado com sucesso'); location.href='indexGerenciador.php'</script>";
        }
    }
    ?>

<!DOCTYPE html>
<html>


    <head>
        <title>Login</title>
        <link rel="icon" type="image/icon" href="img/logo.ico" />
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="css/login.css?ts=<?=time()?>">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    </head>

    <body>

	<?php if(isset($erro) > 0)
					foreach ($erro as $msg) {
						echo "<p>$msg</p>";
					}
				?>
        <div class="login-page">
            <div class="form">
                <H1 class="orion">Orion Park</H1>
                <form class="login-form" name="formlogin" method="">
                    <input type="text" name="cnpj" placeholder="CNPJ do estacionamento">
                    <input value="<?php if(isset($_SESSION)) echo $_SESSION['user'] ?>" type="text" name="user" placeholder="Usuário">
                    <input type="password" placeholder="Senha" />
                    <button type="submit">Entrar</button>
                    <p class="message">Não está registrado? <a href="cadEstacionamento.php">Criar conta.</a></p>
                    <p class="message"><a href="index.html">Voltar ao ínicio</a></p>

                </form>
            </div>
        </div>



    </body>

</html>