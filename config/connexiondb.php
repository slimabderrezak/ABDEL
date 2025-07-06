<?php
// on declare la fonction connexionBDD
// qui va se connecter à la base de données
// on y indique le serveur, l'utilisateur, le mot de passe et la base de données

function connectdb() {
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $bdd = 'pierre_sofip';

    try {
        $con = new PDO('mysql:host=' . $server . ';dbname=' . $bdd, $user, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
    } catch (PDOException $error) {
        echo 'N° : ' . $error->getCode() . '<br />';
        die('Erreur : ' . $error->getMessage() . '<br />');
    }
}
?>
