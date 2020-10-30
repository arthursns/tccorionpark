<?php
include("conexaoBD.php");
include("protect.php");
protect();

$msg_contato = $_POST['msg_contato'];
$email_contato = $_POST['email_contato'];

$insertContato = "INSERT INTO tb_contato (msg_contato, email_contato)
VALUES ('$msg_contato', '$email_contato')";
$exec1 = sqlsrv_query($conn, $insertContato);
if ($exec1 === false) {
			die(print_r(sqlsrv_errors(), true));
		}else{
		echo "<script>
			alert('Sua mensagem foi enviada com sucesso!'); window.history.back();
			</script>";
		}
?>