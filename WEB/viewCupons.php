<?php
include("conexaoBD.php");

session_start();

$selectCupons = "SELECT * FROM tb_cupons WHERE id_cli2 = '$_SESSION[id_cli2]'";
$exec1 = sqlsrv_query($conn, $selectCupons);
if ($exec1 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$dado = sqlsrv_fetch_array($exec1);
?>
<!DOCTYPE html>
<html>

<head>
<title>Cupons</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/viewEstacionamento.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    .sidebar .icone {
        position: relative;
        float: right;
        color: transparent;
    }
    
    .sidebar .icone:hover {
        background-color: transparent;
        color: transparent;
    }
    
    @media screen and (max-width: 600px) {
        .sidebar a:not(:first-child) {
            display: none;
        }
        .sidebar a.icon {
            float: right;
            display: block;
        }
        .sidebar .icone {
            position: fixed;
            float: right;
            color: rgb(11, 19, 19);
        }
        .sidebar .icone:hover {
            background-color: #555;
            color: white;
        }
    }
    
    @media screen and (max-width: 600px) {
        .sidebar.responsive {
            position: relative;
        }
        .sidebar.responsive .icone {
            position: fixed;
            right: 0;
            top: 0;
        }
        .sidebar.responsive a {
            float: none;
            display: block;
            text-align: left;
        }
    }
</style>

<body>

    <div class="sidebar" id="navzao">
        <a href="javascript:void(0);" class="icone" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
        <a href="indexGerenciador.php">Início</a>
        <a href="viewEstacionamento.php">Estacionamento</a>
        <a href="viewFuncionario.php">Funcionário</a>
        <a href="viewVagas.php">Vagas</a>
        <a class="active" href="viewCupons.php">Cupons</a>
        <a  href="viewControle.php">Controle de Entrada e Saída</a>
        <a href="viewReserva.php">Reserva</a>
        <a href="#">Sair</a>
    </div>

    <div class="content">
        <h2>Cupons</h2>
        <table id="customers">
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Valor</th>
                <th>Descrição</th>
            </tr>
            <tr>
                <th><?php echo $dado['id_cupom']?></th>
                <th><?php
                if ($dado['status_cupons'] = 1) {
                    echo "Ativo";
                }else{
                    echo "Inativo";
                }

                ?></th>
                <th><?php echo $dado['valor']?></th>
                <th><?php echo $dado['descricao']?></th>
            </tr>
        </table>
    </div>
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