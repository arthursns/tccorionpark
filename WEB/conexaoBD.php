<?php
$serverName = "serverName\\sqlexpress"; //NomeDoServidor\\NomeDoBanco  Alterar isso antes de tentar rodar!!!!!!!!!!

//Conexão com o banco utilizando o usuário do Windows
$connectionInfo = array( "Database"=>"dbName");
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