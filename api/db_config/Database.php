<?php
// class DatabaseConnector{
//     private $host;
//     private $user;
//     private $password;
//     private $database;

//     public function __construct($host, $user, $password, $database)
//     {
//         $this->host = $host;
//         $this->user = $user;
//         $this->password = $password;
//         $this->database = $database;
//     }

//     public function getConnection(){
//         $connection = mysqli_connect(
//             $this->host,
//             $this->user,
//             $this->password,
//             $this->database
//         );
//         $connection->connect_error? die('Echec lors de la connection à MySQL: '. $connection->connect_error) : $connection;
        
//     }
// }

$server = "localhost";
$username = "root";
$password = "root";
$db = "api_db";
$conn = mysqli_connect($server, $username, $password, $db);
?>