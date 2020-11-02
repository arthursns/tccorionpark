<?php
include("protect.php");
protect();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Reserva</title>
    <link rel="icon" type="image/icon" href="img/logo.ico" />
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
        <a  href="viewCupons.php">Cupons</a>
        <a  href="viewControle.php">Controle de Entrada e Saída</a>
        <a class="active"href="viewReserva.php">Reserva</a>
        <a href="sairModel.php">Sair</a>
    </div>

    <div class="content">
        <h2>Reserva</h2>
        <table id="customers">
                    <tr>
                        <th>ID</th>
                        <th>CPF do Cliente</th>
                        <th>Vaga</th>
                        <th>Valor da Vaga p/Hora</th>
                        <th>Carro</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>134.211.330-69</td>
                        <td>14</td>
                        <td>R$ 14,99</td>
                        <td>Volkswagen Gol</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>100.769.720-20</td>
                        <td>19</td>
                        <td>R$ 5,99</td>
                        <td>Fiat Palio</td>
                    </tr>
        </table>
    </div>
    <div class="content">
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