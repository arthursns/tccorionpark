<?php
include("conexaoBD.php");
include("protect.php");
protect();

$selectCargos = "SELECT * FROM tb_cargo";
$exec1 = sqlsrv_query($conn, $selectCargos);
$cargos = sqlsrv_fetch_array($exec1);

$selectNivelAcesso = "SELECT * FROM tb_nivel_acesso";
$exec2 = sqlsrv_query($conn, $selectNivelAcesso);
$nivelAcesso = sqlsrv_fetch_array($exec2);

?>

<!DOCTYPE html>
<html>
<title>Cadastro de Cupons</title>
<link rel="icon" type="image/icon" href="img/logo.ico" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/viewEstacionamento.css">
<link rel="stylesheet" href="css/cadcupons.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/JQuery.js" type="text/javascript"></script>
<script src="js/mask.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
</head>

<body>
    <div class="sidebar" id="navzao">
        <a href="javascript:void(0);" class="icone" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
        <a href="indexGerenciador.php">Início</a>
        <a class="active"href="viewFuncionario.php">Funcionário > Cadastro Funcionário</a>
        <a href="viewVagas.php">Vagas</a>
        <a href="viewCupons.php">Cupons</a>
        <a href="viewControle.php">Controle de Entrada e Saída</a>
        <a href="viewReserva.php">Reserva</a>
        <a href="sairModel.php">Sair</a>
    </div>

    <div class="content">
        <h1>Dados Pessoais</h1>
    </div>
    <div class="content">
        <div class="row">
            <table id="customers">
                <form action="cadFuncionarioModel.php" method="POST">
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Cargo</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="fname" name="nome" placeholder="Nome" maxlength="255"></td>
                        <td>
                            <input type="text" id="lname" name="email" placeholder="Email" maxlength="100"></td>
                        <td>
                            <input type="text" id="telefoneUsuario" name="telefoneUsuario" placeholder="DDD + Telefone Ex: (1293456789)" class="telefoneUsuario"></td>
                        <td>
                            <select name="cargo" id="cargo">
                                <option value="">Selecione um cargo</option>
                                <?php while ($cargos = sqlsrv_fetch_array($exec1)) { ?>
                                    <option value="<?php echo $cargos['id_cargo']; ?>">
                                        <?php echo $cargos['descricao']; ?>
                                    </option>
                                <?php } ?>
                            </select></td>

                    </tr>
            </table>
            <a href="cadCargo.php" style="text-decoration: none; color: black; padding: 5px">Não encontrou o cargo? <b>Clique aqui</b> para cadastra-lo.</a>
            <h1>Conta para acesso ao Gerenciador</h1>
            <table id="customers">
                <tr>
                    <th>Usuario</th>
                    <th>Senha</th>
                    <th>Nível de acesso</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="fname" name="usuario" placeholder="Usuário" maxlength="255"></td>
                    <td>
                        <input type="password" id="fname" name="senha" placeholder="Senha"></td>
                    <td>
                        <select name="nivelAcesso" id="nivelAcesso">
                            <option value="">Selecione um Nível de Acesso</option>
                            <?php while ($nivelAcesso = sqlsrv_fetch_array($exec2)) { ?>
                                <option value="<?php echo $nivelAcesso['id_nivel_acesso']; ?>">
                                    <?php echo $nivelAcesso['descricao']; ?>
                                </option>
                            <?php } ?>
                        </select></td>
                </tr>
            </table>
            <input type="submit" value="Cadastrar">
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