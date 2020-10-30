<?php
include("protect.php");
protect();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Vagas</title>
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
        <a class="active"href="viewVagas.php">Vagas</a>
        <a  href="viewCupons.php">Cupons</a>
        <a  href="viewControle.php">Controle de Entrada e Saída</a>
        <a href="viewReserva.php">Reserva</a>
        <a href="sairModel.php">Sair</a>
    </div>

    <div class="content">
        <h2>Vagas</h2>
        <table id="customers">
            <tr>
                <th>Vaga</th>
                <th>Status</th>
                <th>Carro</th>
                <th>Tipo de vaga</th>
            </tr>
            <tr>
                <td>01-A</td>
                <td><select name="Status" id="">
                    <option value="Ocupada">Ocupada</option>
                    <option value="Livre">Livre</option>
                </select></td>
                <td>Fox - GTX-3080</td>
                <td>Normal</td>
            </tr>
            <tr>
                <td>01-B</td>
                <td><select name="Status" id="">
                    <option value="Ocupada">Ocupada</option>
                    <option value="Livre">Livre</option>
                </select></td>
                <td>(se tiver ocupado, o carro aparece aqui, se n fica branco)</td>
                <td>Deficiente</td>
            </tr>
            <tr>
                <td>01-C</td>
                <td><select name="Status" id="">
                    <option value="Ocupada">Ocupada</option>
                    <option value="Livre">Livre</option>
                </select></td>
                <td>Saveiro - 666-7777</td>
                <td>Deficiente</td>
            </tr>
            <tr>
                <td>02-A</td>
                <td><select name="Status" id="">
                    <option value="Ocupada">Ocupada</option>
                    <option value="Livre">Livre</option>
                </select></td>
                <td></td>
                <td>Normal</td>
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