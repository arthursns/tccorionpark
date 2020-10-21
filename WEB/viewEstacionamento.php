]<?php
include ("conexaoBD.php");

$selectEstacionamentos = "SELECT a.razao_social, b.cidade, (SELECT COUNT(c.id_vaga) FROM tb_vaga c WHERE c.id_cli2 = a.id_cli2) AS quantidadeVagas FROM tb_cliente_estacionamento a, tb_endereco b";
$params = array();
$options =  array( 'Scrollable' => SQLSRV_CURSOR_KEYSET );

$exec1 = sqlsrv_query($conn, $selectEstacionamentos, $params, $options);
if ($exec1 === false) {
    die(print_r(sqlsrv_errors(), true));
}
$dado = sqlsrv_fetch_array($exec1);
$numEstacionamentos = sqlsrv_num_rows($exec1);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Estacionamentos Cadastrados</title>
</head>
<body>
Atualmente, temos 
<?php
echo $numEstacionamentos; 
if ($numEstacionamentos = 1) {
    echo " estacionamento";
}else{
    echo " estacionamentos";
}
?> 
 cadastrados conosco, segue a lista deles:
<table>
    <tr>
        <th>Nome fantasia</th>
        <th>Número de vagas</th>
        <th>Cidade</th>
    </tr>
    <tr>
        <th><?php echo $dado['razao_social']; ?></th>
        <th><?php echo $dado['quantidadeVagas']; ?></th>
        <th><?php echo $dado['cidade']; ?></th>
    </tr>
</table>
</body>
</html>