<?php
include("protect.php");
protect();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Controle de entrada e saida</title>
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

    input[type="text"] {
        padding: 10px 20px;
        border: none;
    }

    button[type="submit"] {
        background-color: #F7CE3E;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
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

        input[type="text"] {
            margin: 5px;
            width: 91%;
            margin-left: 0;
        }

        button[type="submit"] {
            width: 100%;
            margin: 5px;
            margin-left: 0;
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
        <a href="viewCupons.php">Cupons</a>
        <a class="active" href="viewControle.php">Controle de Entrada e Saída</a>
        <a href="viewReserva.php">Reserva</a>
        <a href="sairModel.php">Sair</a>
    </div>

    <div class="content">
        <h2>Controle de Entrada e Saida</h2>
    </div>
    <div class="content">
        <div class="row">
            <h3>Cadastrar Carro</h3>
        </div>
        <div class="row">
            <form action="" method="" class="cadcarro">
                <input type="text" placeholder="Cliente">
                <input type="text" placeholder="Plcaca">
                <button type="submit">Cadastrar</button>
            </form>
        </div>
        <div class="row" style="padding-top: 10px;">

            <table id="customers">
                <tr>
                    <th>Nome do cliente</th>
                    <th>Placa</th>
                    <th></th>
                </tr>
                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>19</td>
                    <td><button type="submit">Remover</button></td>
                </tr>
            </table>
        </div>
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