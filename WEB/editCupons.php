<?php
include("conexaoBD.php");

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
<head>
	<title></title>
</head>
<body>
<form action="editCuponsModel.php" method="POST">
                    <h1>Dados Pessoais</h1>
                    <label for="descricao">Descrição</label>
                    <input type="text" id="fname" name="descricao" placeholder="Descrição" maxlength="255">
                    <label for="valor">Valor</label>
                    <input type="text" id="dinheiro" name="dinheiro" placeholder="R$ 999,99" class="dinheiro">
                    <label>Status</label>
                    <br>
                    <input type="radio" name="status" value="1"
                    <?php echo "checked"?>> Ativo<br>
                    <input type="radio" name="status" value="0"> Inativo<br>
                    <input type="submit" value="Cadastrar">
                </form>
</body>
</html>
