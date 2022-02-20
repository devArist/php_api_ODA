<?php
include('db_config/Database.php');

function doRegistration(){
    global $conn;
    $message = '';
    $success = false;
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    if(!isset($data->client_id) || empty($data->client_id) || !isset($data->activite_id) || empty($data->activite_id)){
        $message = 'Veuillez remplir les champs requis !';
    }
    else{
        $client_id = intval($data->client_id);
        $activite_id = intval($data->activite_id);

        $base_client_query = "SELECT COUNT(1) FROM client";
        $base_client_query .= " WHERE id=".$client_id;

        $base_activite_query = "SELECT COUNT(1) FROM activite";
        $base_activite_query .= " WHERE id=".$activite_id;

        $inscription_query = "SELECT COUNT(1) FROM inscription WHERE client_id= ". $client_id . " AND activite_id=".$activite_id;
        $insert_query = "INSERT INTO inscription (client_id, activite_id) VALUES($client_id, $activite_id)";

        $row_client = mysqli_fetch_row(mysqli_query($conn, $base_client_query));
        $row_activite = mysqli_fetch_row(mysqli_query($conn, $base_activite_query));
        $row_inscription = mysqli_fetch_row(mysqli_query($conn, $inscription_query));

        if(!$row_client[0] >= 1){
            $message = "Ce client n'existe pas !";
        }
        elseif (!$row_activite[0] >= 1){
            $message = "Cette activité n'existe pas !";
        }
        elseif($row_inscription[0] >=1){
            $message = "Vous êtes déjà inscrire pour cette activité !";
        }
        else{
            $result = mysqli_query($conn, $insert_query);
            $message = 'Inscription bien éffectuée.';
            $success = true;
        }
    }

    header("Content-Type: application/json");
    echo json_encode(array('message' => $message, 'success' => $success));
}
?>