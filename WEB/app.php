<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>App</title>
    <link rel="icon" type="image/icon" href="img/logo.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css?ts=<?=time()?>">
    <link rel="stylesheet" href="css/style2.css?ts=<?=time()?>">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #barra {
            padding-bottom: 25px;
            border-bottom: 1px solid rgb(216, 216, 216);
            margin-bottom: 0%;
        }
    </style>
</head>

<body>


    <div class="topnav" id="navzao">
        <a href="index.php">Início</a>
        <a href="app.php" class="active">Aplicativo</a>
        <a href="sobre.php">Sobre</a>
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
                    <h2>O novo aplicativo para buscas de estacionamentos: Orion Park.</h2>
                    <h5 id="barra">Barueri, 17/10/2020</h5>
                    <div class="footer1">
                        <div class="row1">
                            <div class="column2">
                                <h2>O Aplicativo:</h2>
                                <p>O nosso dashbord tem um script flexivel e agradavel visualmente, todas as informações estão disponivel no menu: Informações.</p>
                                <p>Caso queira alterar o tempo de duração, isso tera alteração no valor final, fique ciente disso antes de estacionar seu veículo.</p>
                                <p>De modo algum, iremos prejudicar a segurança do seu automóvel com um estacionamento não verificado. Todos os estacionamentos cadastrados no sistema, tem verificação e autorização judicial. Qualquer dano ao seu veículo,
                                    será de responsabilidade do estacionamento resolver.</p>
                            </div>
                            <div class="column1">
                                <img src="./img/telapp1.png" alt="">
                            </div>

                            <div class="column3">
                            </div>
                        </div>
                    </div>
                    <div class="footer1">
                        <div class="row1">
                            <div class="column1">
                                <h2>O sistema de pagamento</h2>
                            </div>
                            <div class="column3">
                                <img src="./img/telapp2.jpg" alt="">
                            </div>
                            <div class="column1">
                                <h2>Metodos de pagamentos:</h2>
                                <p>Seja cartão, ou dinheiro, o nosso sistema aceita todas as atuais formas de pagamento. </p>
                            </div>
                            <div class="column2">
                                <h2>Valor não está correto?</h2>
                                <p>Em casos como esse, antes de retirar o seu veículo, dirija-se a administração do local e resolva seu problema. Caso o seu problema não foi resolvivo, entre em contato com o aplicativo e explique seu motivo, responderemos
                                    em até 24h com uma solução.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightcolumn">
                <div class="card">
                    <h2>Sobre nós</h2>
                    <p>O grupo foi fundado em 2019, com a intenção de modificar um dos ramos sem inovação no seu uso diário: Os estacionamentos. E para isso criamos o sistema geren...</p>
                    <a href="sobre.php">
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