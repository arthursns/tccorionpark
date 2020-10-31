<?php

    include("conexaoBD.php");
    
    
    //Verificação se usuário já acessou
    if(isset($_POST['user']) && strlen($_POST['user']) > 0){
        if(!isset($_SESSION))
            session_start();
    
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['password'] = md5(md5($_POST['password']));
        $_SESSION['cnpj'] = preg_replace('/[^0-9]/', '', $_POST['cnpj']);
    
        //Selecionar usuário para verificar se há usuarios cadastrados com o mesmo inserido pelo usuário
        $selectLogin = "SELECT * FROM tb_login INNER JOIN tb_responsavel ON tb_responsavel.id_login = tb_login.id_login INNER JOIN tb_cliente_estacionamento ON tb_cliente_estacionamento.id_cli2 = tb_responsavel.id_cli2 WHERE usuario = '$_SESSION[user]' AND tb_cliente_estacionamento.cnpj LIKE '$_SESSION[cnpj]'";
        $exec1 = sqlsrv_query($conn, $selectLogin);
        if ($exec1 === false) {
                     die(print_r(sqlsrv_errors(), true));
                 }
        $dado = sqlsrv_fetch_array($exec1);
        $verificaConsulta = sqlsrv_has_rows($exec1);
        $erro = [];
    
        //Verificação se o usuário digitado pelo usuário confere ao cadastrado no Banco de dados
        if ($verificaConsulta === false) {
            $erro[] = "<script>alert('CNPJ ou usuário incorreto.')</script>";
        }else{
    
            //Verificação se a senha digitada pelo usuário confere com a cadastrada no Banco de dados
            if ($dado['senha'] == $_SESSION['password']) {
            }else{
                $erro[]="<script>alert('Senha incorreta')</script>";
            }
    }
        // Não constando nenhum erro, logado com sucesso
        if (count($erro) == 0 || !isset($erro)) {
            $_SESSION['id_login'] = $dado['id_login'];
            echo "<script>alert('Logado com sucesso'); location.href='indexGerenciador.php'</script>";
            //Pegando o ID do estacionamento e registrando na Session
        $selectIdCli2 = "SELECT id_cli2 FROM tb_cliente_estacionamento WHERE cnpj LIKE '$_SESSION[cnpj]'";
        $exec2 = sqlsrv_query($conn, $selectIdCli2);
        if ($exec2 === false) {
                     die(print_r(sqlsrv_errors(), true));
                 }
        $dadoIdCli2 = sqlsrv_fetch_array($exec2);
        $_SESSION['id_cli2'] = $dadoIdCli2['id_cli2'];

        //Pegando o nome do usuário e registrando na session
        $selectNome = "SELECT nome FROM tb_responsavel WHERE id_cli2 = '$_SESSION[id_cli2]' AND  id_login = '$_SESSION[id_login]'";
        $exec3 = sqlsrv_query($conn, $selectNome);
        if (exec3 === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        $dadoNome = sqlsrv_fetch_array($exec3);
        $_SESSION['nome'] = $dadoNome['nome'];
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
        <script src="js/JQuery.js" type="text/javascript" ></script>
        <script src="js/mask.js" type="text/javascript" ></script>
        <script src="js/script.js" type="text/javascript" ></script>

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
                <form class="login-form" name="formlogin" method="POST">
                    <input type="text" name="cnpj" placeholder="CNPJ do estacionamento" id="cnpj" class="cnpj">
                    <input value="<?php if(isset($_SESSION)) echo $_SESSION['user'] ?>" type="text" name="user" placeholder="Usuário">
                    <input type="password" name="password" placeholder="Senha"/>
                    <input type="submit" placeholder="Entrar">
                    <p class="message">Não está registrado? <a href="cadEstacionamento.php">Criar conta.</a></p>
                    <p class="message"><a href="index.php">Voltar ao ínicio</a></p>
                </form>
            </div>
        </div>



    </body>

</html>