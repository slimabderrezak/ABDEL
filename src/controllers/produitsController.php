<?php
require_once '../config/connexiondb.php'; // Include database connection file
// On établit la connexion
$con = connectdb();
$requete = "SELECT * FROM produits";
$response = $con->query($requete);
$lignes = $response->fetchAll();
?>

