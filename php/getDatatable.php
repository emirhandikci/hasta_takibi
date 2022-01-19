<?php
include('../conn.php');

$sonuc="";
$deger = $conn->query("SELECT * FROM datas", PDO::FETCH_ASSOC);
if ( $deger->rowCount() ){
    foreach( $deger as $row ){
 $sonuc.= '<tr><td>'.$row['sicaklik'].'</td>
    <td>'.$row['nabiz'].'</td>
    <td>'.$row['ates'].'</td>
    <td>'.$row['tc'].'</td>
    <td>'.$row["date"].'</td></tr>';
    
    }
    echo $sonuc;
}
?>