<?php
include("conexaoBD.php");

$selectEstacionamentos = "SELECT a.razao_social, b.cidade, (SELECT COUNT(c.id_vaga) FROM tb_vaga c WHERE c.id_cli2 = a.id_cli2) AS quantidadeVagas FROM tb_cliente_estacionamento a, tb_endereco b";
$params = array();
$options =  array('Scrollable' => SQLSRV_CURSOR_KEYSET);

$exec1 = sqlsrv_query($conn, $selectEstacionamentos, $params, $options);
if ($exec1 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$numEstacionamentos = sqlsrv_num_rows($exec1);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sobre nós</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/icon" href="img/logo.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css?ts=<?= time() ?>">
    <link rel="stylesheet" href="css/style2.css?ts=<?= time() ?>">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .column2 {
            padding-top: 52px;
        }

        .column2 h1 {
            margin: 30px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        #teste {
            padding-top: 0px;
        }

        @media screen and (max-width: 600px) {
            #imagem {
                padding: 20px;
            }

        }

        table {
            padding: 10px;
            margin: 0%;
            width: 100%;
            background-color: #F0F1F2;
        }

        table tr {
            padding: 0;
        }

        table th {
            margin-left: 10px;
        }

        table tr th {
            border-bottom: 1px solid black;
            padding: 10px;
        }
    </style>
</head>

<body>

    <div class="topnav" id="navzao">
        <a href="index.php">Início</a>
        <a href="app.php">Aplicativo</a>
        <a href="sobre.php" class="active">Sobre</a>
        <a href="cadEstacionamento.php" class="cad">Cadastro</a>
        <a href="loginEstacionamento.php" class="cad">Login</a>
        <a href="javascript:void(0);" class="icone" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="header">
        <img src="./img/logo.png" alt="" style="max-height: 300px;">
    </div>
    <div class="site">

        <div class="row">
            <div class="leftcolumn">
                <div class="card">
                    <div class="footer1">
                        <div class="row1">
                            <div class="column1">
                                <h1>Como surgiu?</h1>
                                <h5>Barueri, 17/10/2020</h5>
                            </div>
                            <div class="column3">
                            </div>
                            <div class="column1">
                                <h2>Uma pequena reunião</h2>
                                <p>Ao final do ano de 2018, nos reunimanos no intervalo da escola e chegamos a conclusão de que: é muito difícil achar uma vaga para estacionar o carro com eficiência.</p>
                                <img src="./img/sobre1.jpg" alt="" style="border: 1px solid rgb(224, 224, 224);">
                            </div>
                            <div class="column2">
                                <p>Um de nós pensou: "E se eu tivesse um sistema capaz de resolver esse problema, com apenas 1 ou 2 minutos, eu ter meu carro estacionado?". Com essa simples perguntas, várias idéias foram surgindo, e claro, todas anotadas.</p>
                                <p>E fizemos isso por alguns meses até o ano letivo de 2019 iniciar. E finalmente, tinhamos um base definida de como seria o projeto. Com pouco mais de 1 ano e meio de desenvolvimento, chegamos ao que é hoje o "Orion Park".
                                </p>
                                <p>Por quê <b>Orion Park?</b> O nome foi bem difícil de escolher, já que como sistema, devia ter um nome não tão grande como: "Sistema Gerenciador de Estacionamentos". A maioria dos grandes estacionamentos, tem como padrão,
                                    palavras em Inglês no seu nome. E assim basicamente surgiu o nome: <b>Orion Park.</b></p>
                            </div>
                            <div class="column3">
                            </div>
                            <div class="column1" id="imagem">
                                <img src="./img/logo.jpg" alt="" style="border: 1px solid rgb(224, 224, 224);">
                            </div>
                            <div class="column2" id="teste">
                                <h1>Contando com <?php
                                            echo $numEstacionamentos;
                                            if ($numEstacionamentos = 1) {
                                                echo " estacionamento cadastrado;";
                                            } else if ($numEstacionamentos > 1) {
                                                echo " estacionamentos cadastrados;";
                                            }
                                            ?></h1>
                                <h1>Mais de 35 funcionários com anos de experiência;</h1>
                                <h1>Mais de 5.000 vagas administradas.</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightcolumn">
                <div class="card">
                    <h2>Atualmente, temos <?php
                                            echo $numEstacionamentos;
                                            if ($numEstacionamentos = 1) {
                                                echo " estacionamento";
                                            } else {
                                                echo " estacionamentos";
                                            }
                                            ?>
                    cadastrados conosco, segue a lista deles:
                </h2>
                    <div>
                        <table>
                            <tr>
                                <th>Nome fantasia</th>
                                <th>Número de vagas</th>
                                <th>Cidade</th>
                            </tr>
                            <?php 
                            if ($numEstacionamentos >= 1){
                                while ($dado = sqlsrv_fetch_array($exec1)) { ?>
                            
                            <tr>
                                <th>
                                    <?php echo $dado['razao_social']; ?>
                                </th>
                                <th>
                                    <?php echo $dado['quantidadeVagas']; ?>
                                </th>
                                <th>
                                    <?php echo $dado['cidade']; ?>
                                </th>
                            </tr>
                        <?php 
                            }
                        }  
                         ?>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <h2>Aplicativo Mobile</h2>
                    <p>O novo jeito de encontrar o estacionamento mais próximo ao seu veiculo, sem perder tempo procurando vagas, e perdendo horário de seus compromissos. Conheça o Orion...</p>
                    <a href="app.html">
                        <div class="ver">ver mais...
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="left">
                        <div class="content">
                            <h2>Visite nossas redes sociais.</h2>
                            <p>Descubra como nosso sistema é feito pelos bastidores.</p>
                            <div class="social">
                                <a href="#"><span class="fab fa-facebook-f"></span></a>
                                <a href="#"><span class="fab fa-twitter"></span></a>
                                <a href="#"><span class="fab fa-instagram"></span></a>
                                <a href="#"><span class="fab fa-youtube"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
    <footer>
        <div class="footer">
            <div class="row">
                <div class="main-content">

                    <div class="column">
                        <div class="center box">
                            <h2>Informações</h2>
                            <div class="content">
                                <div class="place">
                                    <span class="fas fa-map-marker-alt"></span>
                                    <span class="text">Barueri, SP.</span>
                                </div>
                                <div class="phone">
                                    <span class="fas fa-phone-alt"></span>
                                    <span class="text">+55 (11)94002-8922</span>
                                </div>
                                <div class="email">
                                    <span class="fas fa-envelope"></span>
                                    <span class="text">orionpark@gmail.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="right box">
                            <h2>Contate-nos</h2>
                            <div class="content">
                                <form action="contatoModel.php" method="POST">
                                        <div class="email">
                                            <div class="text">Email:</div>
                                            <input name="email_contato" type="email" required>
                                        </div>
                                        <div class="msg">
                                            <div class="text">Mensagem:</div>
                                            <textarea name="msg_contato" cols="25" rows="2" required></textarea>
                                        </div>
                                        <div class="btn">
                                            <button type="submit">Enviar</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function myFunction() {
            var x = document.getElementById("navzao");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
</body>

</html>