<?php
include("conexaoBD.php");

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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/viewEstacionamento.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

    input[type="button"] {
        margin: 10px;
        background-color: #F7CE3E;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        transition: .3s;
    }

    input[type="submit"] {
        margin: 10px;
        background-color: #F7CE3E;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        transition: .3s;
    }

    .content a {
        text-decoration: none;
        color: black;
        margin: 10px;
        background-color: #F7CE3E;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        transition: .3s;
    }

    input[type="button"]:hover,
    .content a:hover,
    input[type="submit"]:hover {
        background-color: black;
        color: blanchedalmond;
    }

    input[type="text"] {
        padding: 10px 20px;
        border: none;
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

        input[type="button"] {
            width: 100%;
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
        <a class="active" href="viewCupons.php">Cupons</a>
        <a href="viewControle.php">Controle de Entrada e Saída</a>
        <a href="viewReserva.php">Reserva</a>
        <a href="#">Sair</a>
    </div>

    <div class="content">
        <h1>Adicione um novo Cupom</h1>
        <form action="cadCuponsModel.php" method="POST">
            <table id="customers">
                <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>status</th>
                </tr>
                <tr>
                    <td><input type="text" id="fname" name="descricao" placeholder="Descrição" maxlength="255"></td>
                    <td><input type="text" id="lname" name="valor" placeholder="R$ 999,99" maxlength="8"></td>
                    <td><input type="radio" name="status" value="1" placeholder="Ativo">Ativo  <br> <input type="radio" name="status" value="0">Inativo</td>
                </tr>
            </table>
            <input type="submit" value="Cadastrar">
        </form>
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