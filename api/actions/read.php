<?php
include('db_config/Database.php');

function getRegistrations(){
    global $conn;
    $query = "SELECT * FROM inscription";
    $response = array();
    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($result)){
        $inscription = ['id' => $row['id'], 'client_id' => $row['client_id'], 'activite_id' => $row['activite_id'], 'date_inscription' => $row['date_inscription']];
        $response[] = $inscription;
    }
    
    header('Content-Type: application/json');
    echo(json_encode($response));

    $result->close();
}

?>