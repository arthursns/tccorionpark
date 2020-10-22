<<<<<<< HEAD
=======
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
            <h1 class="w3-jumbo">Adicione um novo Funcionário</h1>
            <div class="teste">
                <form action="cadFuncionarioModel.php" method="POST">
                    <h1>Dados Pessoais</h1>
                    <label for="fname">Nome</label>
                    <input type="text" id="fname" name="nome" placeholder="Nome" maxlength="255">
                    <label for="email">Email</label>
                    <input type="text" id="lname" name="email" placeholder="Email" maxlength="100">
                    <label>Telefone</label>
                    <input type="text" id="fname" name="telefone" placeholder="DDD + Telefone Ex: (12934567890)" maxlength="11">
                    <label>Cargo</label>
                    <select name="cargo" id="cargo">
                        <option value="">Selecione um cargo</option>
                        <option value="<?php echo $cargos['id_cargo']; ?>">
                            <?php echo $cargos['descricao']; ?>
                        </option>
                    </select>
                    <a href="cadCargo.php">Não encontrou o cargo? Clique aqui para cadastra-lo</a>
                    <h1>Conta para acesso ao Gerenciador</h1>
                    <label>Usuario</label>
                    <input type="text" id="fname" name="usuario" placeholder="Usuário" maxlength="255">
                    <label>Senha</label>
                    <br>
                    <input type="password" id="fname" name="senha" placeholder="Senha">
                    <br>
                    <br>
                    <label>Nível de Acesso</label>
                    <select name="nivelAcesso" id="nivelAcesso">
                        <option value="">Selecione um Nível de Acesso</option>
                        <option value="<?php echo $nivelAcesso['id_nivel_acesso']; ?>">
                            <?php echo $nivelAcesso['descricao']; ?>
                        </option>
                    </select>
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
>>>>>>> 0f329b1d45b1fa4c7271154438387467974b710d
