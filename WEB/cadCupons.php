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
        <a class="active" href="viewCupons.php">Cupons > Cadastrar Cupom</a>
        <a href="viewControle.php">Controle de Entrada e Saída</a>
        <a href="viewReserva.php">Reserva</a>
        <a href="#">Sair</a>
    </div>

    <div class="content">
        <h2>Cadastrar Cupom</h2>
    </div>
    <div class="content">
        <div class="row">
            <form action="cadCuponsModel.php" method="POST">
                <table id="customers">
                    <tr>
                        <td>Descrição</td>
                        <td>Valor</td>
                        <td>Status</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="fname" name="descricao" placeholder="Descrição" maxlength="255"></td>
                        <td>
                            <input type="text" id="dinheiro" name="dinheiro" placeholder="R$ 999,99" class="dinheiro"></td>
                        <td>
                            <input type="radio" name="status" value="1">Ativo<br>
                            <input type="radio" name="status" value="0">Inativo</td>
                    </tr>
                    <tr>
                    </tr>
                </table>
                <input type="submit" value="Cadastrar">
            </form>
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