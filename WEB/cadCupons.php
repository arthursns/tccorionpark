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
<title>Cadastro Funcionário</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/ver.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/JQuery.js" type="text/javascript" ></script>
<script src="js/mask.js" type="text/javascript" ></script>
<script src="js/script.js" type="text/javascript" ></script>
<body>

    <div class="w3-sidebar w3-collapse w3-animate-left w3-large w3-black" style="z-index:3;width:300px;transition: .3s" id="mySidebar">


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

    <div class="w3-main" style="margin-left:300px;">

        <div class="w3-top w3-black w3-large w3-hide-large">
            <i class="fa fa-bars w3-button w3-black w3-xlarge w3-hover-yellow" onclick="w3_open()" style="transition: .3s"></i>
        </div>

        <header class="w3-container w3-yellow w3-padding-32 w3-center">
            <h1 class="w3-xxxlarge w3-padding-16">Cadastro</h1>
        </header>
        <div class="w3-container w3-padding-large w3-section">
            <h1 class="w3-jumbo">Adicione um novo Cupom</h1>
            <div class="teste">
                <form action="cadCuponsModel.php" method="POST">
                    <h1>Dados Pessoais</h1>
                    <label for="descricao">Descrição</label>
                    <input type="text" id="fname" name="descricao" placeholder="Descrição" maxlength="255">
                    <label for="valor">Valor</label>
                    <input type="text" id="dinheiro" name="dinheiro" placeholder="R$ 999,99" class="dinheiro"  />
                    <label>Status</label>
                    <br>
                    <input type="radio" name="status" value="1"> Ativo<br>
                    <input type="radio" name="status" value="0"> Inativo<br>
                    <input type="submit" value="Cadastrar">
                </form>
            </div>
        </div>

    </div>

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
