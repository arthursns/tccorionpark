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
<head>
	<title></title>
</head>
<body>
<form action="editCuponsModel.php" method="POST">
                    <h1>Edição Cupom</h1>
                    <input type="hidden" name="idCupom" value="<?php echo($idCupom)?>">
                    <label for="descricao">Descrição</label>
                    <input type="text" id="fname" name="descricao" placeholder="Descrição" maxlength="255" value="<?php echo($dado['descricao']) ?>">
                    <label for="valor">Valor</label>
                    <input type="text" id="dinheiro" name="dinheiro" placeholder="R$ 999,99" class="dinheiro" value="<?php echo($dado['valor']) ?>">
                    <label>Status</label>
                    <br>
                    <?php
                    if ($dado['status_cupons'] === 1) {
                        echo'<input type="radio" name="status" value="1" checked> Ativo<br>
                        <input type="radio" name="status" value="0"> Inativo<br>';
                    }else{
                        echo'<input type="radio" name="status" value="1"> Ativo<br>
                        <input type="radio" name="status" value="0" checked> Inativo<br>';
                    }

                    ?>
                    
                    <input type="submit" value="Cadastrar">
                </form>
</body>
</html>
