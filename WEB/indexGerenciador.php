<?php
include("conexaoBD.php");
        
        session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sistema.css">
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
        <a href="viewEstacionamento.php">Estacionamento</a>
        <a href="viewFuncionario.php">Funcionário</a>
        <a href="viewVagas.php">Vagas</a>
        <a href="viewCupons.php">Cupons</a>
        <a href="viewControle.php">Controle de Entrada e Saída</a>
        <a href="viewReserva.php">Reserva</a>
        <a href="#">Sair</a>
    </div>

    <div class="contentindex">
        <div class="row">
            <h2>Bem vindo @user.</h2>
        </div>
    </div>

    <div class="content">
        <div class="rowconteudo" style="
        border: 1px solid rgba(128, 128, 128, 0.158);">
            <h2>Titulo de alguma coisa</h2>
            <div class="rowconteudo">
                <p>Aqui vemalgum texto para conteudo, to sem ideia aindaAqui vemalgum texto para conteudo, to sem ideia aindaAqui vemalgum texto para conteudo, to sem ideia ainda</p>
            </div>
            <div class="rowconteudo">
                <p>Aqui vemalgum texto para conteudo, to sem ideia aindaAqui vemalgum texto para conteudo, to sem ideia aindaAqui vemalgum texto para conteudo, to sem ideia ainda</p>
            </div>
            <div class="rowconteudo">
                <p>Aqui vemalgum texto para conteudo, to sem ideia aindaAqui vemalgum texto para conteudo, to sem ideia aindaAqui vemalgum texto para conteudo, to sem ideia ainda</p>
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