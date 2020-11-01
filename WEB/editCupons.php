<?php
include("conexaoBD.php");
include("protect.php");
protect();

$idCupom = $_POST['radioSelecaoCupom'];

$selectCupomEdit = "SELECT * FROM tb_cupons WHERE id_cupom = $idCupom";
$exec1 = sqlsrv_query($conn, $selectCupomEdit);
if ($exec1 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$dado = sqlsrv_fetch_array($exec1);
?>

<!DOCTYPE html>
<html>
<title>Cadastro de Cupons</title>
<link rel="icon" type="image/icon" href="img/logo.ico" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/viewEstacionamento.css">
<link rel="stylesheet" href="css/cadcupons.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/JQuery.js" type="text/javascript" ></script>
<script src="js/mask.js" type="text/javascript" ></script>
<script src="js/script.js" type="text/javascript" ></script>
</head>

<body>
    <div class="sidebar" id="navzao">
        <a href="javascript:void(0);" class="icone" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
        <a href="indexGerenciador.php">Início</a>
        <a href="viewEstacionamento.php">Estacionamento</a>
        <a href="viewFuncionario.php">Funcionário</a>
        <a href="viewVagas.php">Vagas</a>
        <a class="active" href="viewCupons.php">Cupons > Editar Cupom</a>
        <a href="viewControle.php">Controle de Entrada e Saída</a>
        <a href="viewReserva.php">Reserva</a>
        <a href="#">Sair</a>
    </div>

    <div class="content">
        <h2>Edição Cupom</h2>
    </div>
    <div class="content">
        <div class="row">
            <form action="editCuponsModel.php" method="POST">
                <table id="customers">
                    <tr>
                        <td>ID</td>
                        <td>Descrição</td>
                        <td>Valor</td>
                        <td>Status</td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo($idCupom)?>
                            <input type="hidden" name="idCupom" value="<?php echo($idCupom)?>"></td>
                        <td>
                            <input type="text" id="fname" name="descricao" placeholder="Descrição" maxlength="255" value="<?php echo($dado['descricao']) ?>"></td></td>
                        <td>
                            <input type="text" id="dinheiro" name="dinheiro" placeholder="R$ 999,99" class="dinheiro" value="<?php echo number_format($dado['valor'], 2, ",", ".") ?>"></td>
                        <td>
                            <?php
                            if ($dado['status_cupons'] === 1) {
                                echo'<input type="radio" name="status" value="1" checked> Ativo<br>
                                <input type="radio" name="status" value="0"> Inativo<br>';
                            }else{
                                echo'<input type="radio" name="status" value="1"> Ativo<br>
                                <input type="radio" name="status" value="0" checked> Inativo<br>';
                            }
        
                            ?>
                            </td>
                    </tr>
                    <tr>
                    </tr>
                </table>
                <input type="submit" value="Editar">
            </form>
        </div>
    </div>

    </div>

    <script src="https://www.w3schools.com/lib/w3codecolor.js"></script>
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