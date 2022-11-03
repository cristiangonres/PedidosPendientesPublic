<?php
   
    $serverName = "bbdd\MSSQLSERVER , 1433"; //serverName\instanceName
    $connectionInfo = array( "Database"=>"database_name", "UID"=>"user", "PWD"=>"password");

    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    

    if( !$conn ) {
         echo "ERROR (revise su configuración o credenciales de acceso)."; 
    die( print_r(sqlsrv_errors(), true)); 
    }
    

?>

