<?php
//$serverName = "DESKTOP-HIAOB1Q\\SQLEXPRESS"; //NomeDoServidor\\NomeDoBanco  Alterar isso antes de tentar rodar!!!!!!!!!!
<<<<<<< HEAD
$serverName = "DESKTOP-9LK3UQP\\SQLEXPRESS01"; //miguel
//$serverName = "DESKTOP-12528G0\\SQLEXPRESS01";
=======
//$serverName = "DESKTOP-9LK3UQP\\SQLEXPRESS01";
$serverName = "DESKTOP-12528G0\\SQLEXPRESS01";
>>>>>>> deee95fc06ddb834030f352ccef8c31be1e15c1b
//$serverName = "DESKTOP-RMNIEMU\\SQLEXPRESS";


//Conexão com o banco utilizando o usuário do Windows
$connectionInfo = array( "Database"=>"ESTACIONAMENTO_INF3CM");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

/*
//Conexão com o banco utilizando um usuário especifico do SQL Server

$serverName = "serverName\\sqlexpress"; //NomeDoServidor\\NomeDoBanco  Alterar isso antes de tentar rodar!!!!!!!!!!
$connectionInfo = array( "Database"=>"dbName", "UID"=>"USUARIO", "PWD"=>"SENHA");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
*/

// Tratamento de erros
if( $conn == false ) {
     echo "Falha na conexão com o Banco de Dados.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>
