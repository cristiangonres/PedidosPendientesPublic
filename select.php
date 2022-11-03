<?php
   
    include 'connect.php';
    echo "<title>Pedidos pendientes</title> ";
    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    
    $fecha=date('Y-d-m');
    $sql = "select  O.FECHA AS FECHAO, O.NUMERO_DOC, E.NOMBRE AS NOMBREE, O.NUMERO from DATOP01 O INNER JOIN DATEN01 E ON O.NIF=E.NIF WHERE O.FECHA >'$fecha'";
    // $params = array();
    // $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $stmt = sqlsrv_query( $conn, $sql);
    
        echo "<link rel=stylesheet href=css/style.css>";
        if ( $stmt == false)
        echo "Error al obtener datos.";


        echo "<form action='select2.php' method='post'>";
        //echo $row_count;
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>PEDIDO</th>";
        echo "<th>FECHA</th>";
        echo "<th>CLIENTE</th>";
        echo "</tr>";  
        while( $row = sqlsrv_fetch_array( $stmt) ) {
              echo '<tr>';
              echo '<td><input type="radio" name="NUMERO_DOC" value="'.$row['NUMERO_DOC'].'"> '.$row['NUMERO_DOC'].' </td>';
              echo '<td>'.date_format($row['FECHAO'], 'd-m-Y').'</td>';
              echo '<td>'.$row['NOMBREE'].'</td>';
              echo '</tr>';
        }
        echo "</table>";
        echo "<input type='submit' value='VER PRODUCTOS' name='send'>";
        echo "</form>";


?>