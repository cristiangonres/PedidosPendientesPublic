<?php
    include 'connect.php';
    echo "<link rel=stylesheet href=css/style.css>";
    echo "<title>Pedidos pendientes</title> ";
    echo "<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ /> ";
    
    $NUMERO_DOC = $_POST["NUMERO_DOC"];

    $sql2 = "select M.CODART, P.DESCRIPCIO, M.UNIDADES, _TIPOUNID, M.CAPACIDAD, M.NENVASES FROM DATOP01 O INNER JOIN DATMO01 M ON O.NUMERO=M.NUMERO INNER JOIN DATIN01 P ON P.CODIGO=M.CODART 
    WHERE O.NUMERO_DOC='$NUMERO_DOC'";
    
    $stmt2 = sqlsrv_query( $conn, $sql2);
    
    
    if ( $stmt2 == false)
    echo "Error al obtener datos.";


    echo "<form action='select.php' method='post'>";
    //echo $row_count;
    echo "<table border=1>";
    echo "<caption> PEDIDO &nbsp;&nbsp;&nbsp;&nbsp;<span>".$NUMERO_DOC."</span></caption>";
    echo "<tr>";
    echo "<th>PRODUCTO</th>";
    echo "<th>CANTIDAD</th>";
    echo "<th>ENVASES</th>";
    echo "</tr>";  
    while( $row = sqlsrv_fetch_array( $stmt2) ) {
          echo '<tr>';
          echo '<td>'.$row['CODART'].'-'.$row['DESCRIPCIO'].'</td>';
          echo '<td>'.round($row['UNIDADES']).' '.$row['_TIPOUNID'].'</td>';
          echo '<td>'.$row['NENVASES'].' x '.round($row['CAPACIDAD']).'</td>';
          echo '</tr>';
    }
    echo "</table>";
    echo "<input type='submit' value='VOLVER' name='send'>";
    echo "</form>";


    
?>