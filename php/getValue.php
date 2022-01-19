<?php
include('../conn.php');
$query = $conn->query("SELECT * FROM datas ORDER BY id DESC")->fetch(PDO::FETCH_ASSOC);

if($query){
    $data["nabiz"]=$query["nabiz"];
    $data["ates"]=$query["ates"];
    $data["sicaklik"]=$query["sicaklik"];
    echo json_encode($data);
    
}
else{
    echo " veri yok ";
}

?>