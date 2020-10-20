<!DOCTYPE html>
<html>
<title>Inicio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/ver.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>

    <div class="w3-sidebar w3-collapse w3-animate-left w3-large w3-black" style="z-index:3;width:300px;transition: .3s" id="mySidebar">

        <!-- na div debaixo, alterar o links para .php -->

        <div id="nav01" class="w3-bar-block">
            <a class="w3-button w3-hover-yellow w3-hide-large w3-large w3-right w3-black" style="transition: .3s" href="javascript:void(0)" onclick="w3_close()">×</a>
            <a class="w3-bar-item w3-button w3-hover-yellow" style="transition: .3s" href="indexGerenciador.html">Inicio</a>
            <a class="w3-bar-item w3-button w3-hover-yellow" style="transition: .3s" href="viewEstacionamentos.html">Estacionamentos</a>
            <a class="w3-bar-item w3-button w3-hover-yellow" style="transition: .3s" href="viewFuncionario.html">Funcionário</a>
            <a class="w3-bar-item w3-button w3-hover-yellow" style="transition: .3s" href="cadFuncionario.html">Cadastro Funcionário</a>
            <a class="w3-bar-item w3-button w3-hover-yellow" style="transition: .3s" href="#">Sair</a>
        </div>
    </div>

    <div class="w3-overlay  w3-hide-large" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

    <!-- aqui começa o conteudo -->

    <div class="w3-main" style="margin-left:300px;">

        <div class="w3-top w3-black w3-large w3-hide-large">
            <!-- ao redimensionar a pagina, essa opção fica visivel no canto superior esquerdo -->
            <i class="fa fa-bars w3-button w3-black w3-xlarge w3-hover-yellow" onclick="w3_open()" style="transition: .3s"></i>
        </div>

        <header class="w3-container w3-padding-32 w3-center w3-yellow">
            <h1 class="w3-xxxlarge w3-padding-16">Estacionamentos</h1>
            <a href="viewEstacionamenots.html" class="ver">ver mais</a>
        </header>

        <div class="w3-container w3-padding-large w3-section ">
            <div class="w3-row-padding">
                <!-- estacionamentos, achei o card lindo -->
                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                        <li class="w3-black w3-xlarge w3-padding-32">Estacy 24h</li>
                        <li class="w3-padding-16"><b>Endereço:</b> Rua risadinha, 54</li>
                        <li class="w3-padding-16"><b>Vagas disponíveis</b> $vagas_disponiveis</li>
                        <li class="w3-padding-16"><b>Vagas ocupadas</b> $vagas_ocpadas</li>
                        <li class="w3-padding-16"><b>Status</b> $aberto_fechado</li>
                        <li class="w3-padding-16">
                            <h2 class="w3-wide">R$ 10</h2>
                            <span class="w3-opacity">por hora</span>
                        </li>
                    </ul>
                </div>

                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                        <li class="w3-black w3-xlarge w3-padding-32">Pandora Park</li>
                        <li class="w3-padding-16"><b>Endereço:</b> Rua shape, 335</li>
                        <li class="w3-padding-16"><b>Vagas disponíveis</b> $vagas_disponiveis</li>
                        <li class="w3-padding-16"><b>Vagas ocupadas</b> $vagas_ocpadas</li>
                        <li class="w3-padding-16"><b>Status</b> $aberto_fechado</li>
                        <li class="w3-padding-16">
                            <h2 class="w3-wide">R$ 25</h2>
                            <span class="w3-opacity">por hora</span>
                        </li>
                    </ul>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                        <li class="w3-black w3-xlarge w3-padding-32">Zeus Estacionamento</li>
                        <li class="w3-padding-16"><b>Endereço:</b> Rua Fundação, 5</li>
                        <li class="w3-padding-16"><b>Vagas disponíveis</b> $vagas_disponiveis</li>
                        <li class="w3-padding-16"><b>Vagas ocupadas</b> $vagas_ocpadas</li>
                        <li class="w3-padding-16"><b>Status</b> $aberto_fechado</li>
                        <li class="w3-padding-16">
                            <h2 class="w3-wide">R$ 15</h2>
                            <span class="w3-opacity">por hora</span>
                        </li>
                    </ul>
                </div>
                <!-- <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                        <li class="w3-black w3-xlarge w3-padding-32">Estacy 24h</li>
                        <li class="w3-padding-16"><b>Endereço:</b> Rua risadinha, 54</li>
                        <li class="w3-padding-16"><b>Vagas disponíveis</b> $vagas_disponiveis</li>
                        <li class="w3-padding-16"><b>Vagas ocupadas</b> $vagas_ocpadas</li>
                        <li class="w3-padding-16"><b>Status</b> $aberto_fechado</li>
                        <li class="w3-padding-16">
                            <h2 class="w3-wide">R$ 10</h2>
                            <span class="w3-opacity">por hora</span>
                        </li>
                    </ul>
                </div>
                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                        <li class="w3-black w3-xlarge w3-padding-32">Pandora Park</li>
                        <li class="w3-padding-16"><b>Endereço:</b> Rua Fundação, 3335</li>
                        <li class="w3-padding-16"><b>Vagas disponíveis</b> $vagas_disponiveis</li>
                        <li class="w3-padding-16"><b>Vagas ocupadas</b> $vagas_ocpadas</li>
                        <li class="w3-padding-16"><b>Status</b> $aberto_fechado</li>
                        <li class="w3-padding-16">
                            <h2 class="w3-wide">R$ 15</h2>
                            <span class="w3-opacity">por hora</span>
                        </li>
                    </ul>
                </div>


                <div class="w3-third w3-margin-bottom">
                    <ul class="w3-ul w3-border w3-center w3-hover-shadow">
                        <li class="w3-black w3-xlarge w3-padding-32">Pandora Park</li>
                        <li class="w3-padding-16"><b>Endereço:</b> Rua shape, 335</li>
                        <li class="w3-padding-16"><b>Vagas disponíveis</b> $vagas_disponiveis</li>
                        <li class="w3-padding-16"><b>Vagas ocupadas</b> $vagas_ocpadas</li>
                        <li class="w3-padding-16"><b>Status</b> $aberto_fechado</li>
                        <li class="w3-padding-16">
                            <h2 class="w3-wide">R$ 25</h2>
                            <span class="w3-opacity">por hora</span>
                        </li>
                    </ul>
                </div> -->

            </div>
        </div>


        <!-- formulario de funcionarios, ae arthur, o layout ta simples, mas ta feito -->

        <header class="w3-container w3-yellow w3-padding-32 w3-center">
            <h1 class="w3-xxxlarge w3-padding-16">Funcionários</h1>
            <a href="viewFuncionario.html" class="ver">ver mais</a>
        </header>
        <div class="w3-container w3-padding-large w3-section">
            <h1 class="w3-jumbo">Lista de funcionários</h1>
            <table class="w3-table w3-bordered" style="border: 1px solid #ccc; border-radius: 50px;">
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Estacionamento</th>
                    <th>Idade</th>
                </tr>
                <tr>
                    <td>Arthur</td>
                    <td>Silva</td>
                    <td>Estacy 24h</td>
                    <td>18</td>
                </tr>
                <tr>
                    <td>Joao</td>
                    <td>Angelucci</td>
                    <td>Pandora Park</td>
                    <td>90</td>
                </tr>
                <tr>
                    <td>Caio</td>
                    <td>Silva</td>
                    <td>Pandora Park</td>
                    <td>112</td>
                </tr>
                <tr>
                    <td>Alexandre</td>
                    <td>Barra</td>
                    <td>Zeus Estacionamento</td>
                    <td>30</td>
                </tr>
                <tr>
                    <td>Miguel</td>
                    <td>Ribeiro</td>
                    <td>Zeus Estacionamento</td>
                    <td>20</td>
                </tr>
            </table>
        </div>

        <!-- formulario de cadastro -->

        <header class="w3-container w3-yellow w3-padding-32 w3-center">
            <h1 class="w3-xxxlarge w3-padding-16">Cadastro</h1>
            <a href="cadFuncionario.html" class="ver">ver mais</a>
        </header>
        <div class="w3-container w3-padding-large w3-section">
            <h1 class="w3-jumbo">Adicione um novo Funcionário</h1>
            <div class="teste">
                <form action="" method="">
                    <label for="fname">Nome</label>
                    <input type="text" id="fname" name="firstname" placeholder="Nome">

                    <label for="email">Email</label>
                    <input type="text" id="lname" name="lastname" placeholder="Email">

                    <label for="estacionamento">Estacionamento</label>
                    <select id="estacionamento" name="estacionamento">
                    <option value="estacy">Estacy 24h</option>
                    <option value="pandora">Pandora Park</option>
                    <option value="zeus">Zeus Estacionamento</option>
                  </select>

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>

    </div>

    <!-- aqui termina o conteudo -->

    <script>
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }

        openNav("nav01");

        function openNav(id) {
            document.getElementById("nav01").style.display = "none";
            document.getElementById(id).style.display = "block";
        }
    </script>

    <script src="https://www.w3schools.com/lib/w3codecolor.js"></script>


</body>

</html>