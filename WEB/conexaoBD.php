<?php
$serverName = "serverName\\sqlexpress"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"dbName");
$conn = sqlsrv_connect( $serverName, $connectionInfo);


// Tratamento de erros
if( $conn == false ) {
     echo "Falha na conexão com o Banco de Dados.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>