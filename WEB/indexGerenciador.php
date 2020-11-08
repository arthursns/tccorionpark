<?php
include("conexaoBD.php");
include("protect.php");
protect();


?>
<!DOCTYPE html>
<html>

<head>
    <title>Página inicial</title>
    <link rel="icon" type="image/icon" href="img/logo.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sistema.css">
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
        <a class="active" href="indexGerenciador.php">Início</a>
        <a href="viewFuncionario.php">Funcionário</a>
        <a href="viewVagas.php">Vagas</a>
        <a href="viewCupons.php">Cupons</a>
        <a href="viewControle.php">Controle de Entrada e Saída</a>
        <a href="viewReserva.php">Reserva</a>
        <a href="sairModel.php">Sair</a>
    </div>

    <div class="contentindex">
        <div class="row">
            <h2>Bem vindo <?php echo $_SESSION['nome']?>.</h2>
        </div>
    </div>

    <div class="content">
        <div class="rowconteudo" >
            <h2><?php echo $_SESSION['razao_social']?></h2>
            <div class="rowconteudo">
                <p>Seu estacionamento tem atualmente (vagas) disponíveis, sendo (vagas) ocupadas.</p>
            </div>
            <div class="rowconteudo">
                <p>Horário de funcionamento</p>
                <table id="customers">
                    <tr>
                        <th>Semana</th>
                        <th>Abre</th>
                        <th>Fecha</th>
                    </tr>
                    <tr>
                        <td>Segunda</td>
                        <td>08:00</td>
                        <td>18:00</td>
                    </tr>
                    <tr>
                        <td>Terça</td>
                        <td>10:00</td>
                        <td>16:00</td>
                    </tr>
                    <tr>
                        <td>Quarta</td>
                        <td>10:00</td>
                        <td>16:00</td>
                    </tr>
                    <tr>
                        <td>Quinta</td>
                        <td>08:00</td>
                        <td>18:00</td>
                    </tr>
                    <tr>
                        <td>Sexta</td>
                        <td>08:00</td>
                        <td>18:00</td>
                    </tr>
                    <tr>
                        <th>Fechado aos Sábados e Domingos</th>
                        <th></th>
                        <th></th>
                    </tr>
                </table>
            </div>
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