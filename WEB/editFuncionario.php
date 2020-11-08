<?php
include("conexaoBD.php");
include("protect.php");
protect();

$idFuncionario = $_POST['radioSelecaoFuncionario'];

$selectFuncionarioEdit = "SELECT * FROM tb_responsavel WHERE id_responsavel = $idFuncionario";
$exec1 = sqlsrv_query($conn, $selectFuncionarioEdit);
if ($exec1 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$dado = sqlsrv_fetch_array($exec1);

$selectTelefoneEdit = "SELECT * FROM tb_telefone WHERE id_telefone = $dado[id_telefone]";
$exec2 = sqlsrv_query($conn, $selectTelefoneEdit);
if ($exec2 ===  false) {
    die(print_r(sqlsrv_errors(), true));
}
$dado2 = sqlsrv_fetch_array($exec2);

$selectLoginEdit = "SELECT * FROM tb_login WHERE id_login = $dado[id_login]";
$exec3 = sqlsrv_query($conn, $selectLoginEdit);
if ($exec3 ===  false) {
    die(print_r(sqlsrv_errors(), true));
}
$dado3 = sqlsrv_fetch_array($exec3);

$selectCargos = "SELECT * FROM tb_cargo";
$exec4 = sqlsrv_query($conn, $selectCargos);

$selectNivelAcesso = "SELECT * FROM tb_nivel_acesso";
$exec5 = sqlsrv_query($conn, $selectNivelAcesso);
?>

<!DOCTYPE html>
<html>
<title>Editar Funcionário</title>
<link rel="icon" type="image/icon" href="img/logo.ico" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/viewEstacionamento.css">
<link rel="stylesheet" href="css/cadcupons.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/JQuery.js" type="text/javascript" ></script>
<script src="js/mask.js" type="text/javascript" ></script>
<script src="js/script.js" type="text/javascript" ></script>
</head>

<body>
    <div class="sidebar" id="navzao">
        <a href="javascript:void(0);" class="icone" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
        <a href="indexGerenciador.php">Início</a>
        <a href="viewEstacionamento.php">Estacionamento</a>
        <a href="viewFuncionario.php">Funcionário</a>
        <a href="viewVagas.php">Vagas</a>
        <a class="active" href="viewCupons.php">Cupons > Editar Cupom</a>
        <a href="viewControle.php">Controle de Entrada e Saída</a>
        <a href="viewReserva.php">Reserva</a>
        <a href="sairModel.php">Sair</a>
    </div>

    <div class="content">
        <h2>Edição Cupom</h2>
    </div>
    <div class="content">
        <div class="row">
            <form action="editFuncionarioModel.php" method="POST">
                    <h1>Dados Pessoais</h1>
                    <label for="fname">Nome</label>
                    <input type="text" id="fname" name="nome" placeholder="Nome" maxlength="255" value="<?php echo $dado['nome'] ?>">
                    <label for="email">Email</label>
                    <input type="text" id="lname" name="email" placeholder="Email" maxlength="100" value="<?php echo $dado['email']?>">
                    <label>Telefone</label>
                    <input type="text" id="telefoneUsuario" name="telefone" placeholder="DDD + Telefone Ex: (1293456789)" value="<?php echo $dado2['numero']?>">
                    <label>Cargo</label>
                    <select name="cargoId" id="cargo">
                        <option value="">Selecione um cargo</option>
                        <?php while($cargos = sqlsrv_fetch_array($exec4)){?>
                        <option <?php if($dado['id_cargo'] == $cargos['id_cargo']){echo 'selected';}?> value="<?php echo $cargos['id_cargo']; ?>">
                            <?php echo $cargos['descricao']; ?>
                        </option>
                    <?php }?>
                    </select>
                    <a href="cadCargo.php">Não encontrou o cargo? Clique aqui para cadastra-lo</a>
                    <h1>Conta para acesso ao Gerenciador</h1>
                    <label>Usuario</label>
                    <input type="text" id="fname" name="usuario" placeholder="Usuário" maxlength="255" value="<?php echo $dado3['usuario']; ?>">
                    <label>Senha</label>
                    <br>
                    <input type="password" id="fname" name="senha" placeholder="Deixar vazio se não for alterar">
                    <br>
                    <br>
                    <label>Nível de Acesso</label>
                    <select name="nivelAcesso" id="nivelAcesso">
                        <option value="">Selecione um Nível de Acesso</option>
                                            <?php while ($nivelAcesso = sqlsrv_fetch_array($exec5)) { ?>
                        <option <?php if($dado3['id_nivel_acesso'] == $nivelAcesso['id_nivel_acesso']) {echo 'selected'; } ?> value="<?php echo $nivelAcesso['id_nivel_acesso']; ?>">
                            <?php echo $nivelAcesso['descricao']; ?>
                        </option>
                        <?php } ?>
                    </select>
                    <input type="hidden" name="id_login" value="<?php echo $dado['id_login']?>">
                    <input type="hidden" name="id_telefone" value="<?php echo $dado['id_telefone']?>">
                    <input type="hidden" name="id_responsavel" value="<?php echo $idFuncionario ?>">
                    <input type="submit" value="Editar">
                </form>
        </div>
    </div>

    </div>

    <script src="https://www.w3schools.com/lib/w3codecolor.js"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("navzao");
            if (x.className === "sidebar") {
                x.className += " responsive";
            } else {
                x.className = "sidebar";
            }
        }
    </script>


</body>

</html>