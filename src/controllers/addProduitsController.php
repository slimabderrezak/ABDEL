<?php
// On inclut le fichier de connexion à la base de données
require_once __DIR__ . '/../../config/connexiondb.php';
$con = connectdb();

if (isset($_POST["nomProd"]) && isset($_FILES["image"]) && isset($_POST["prix"])) {
    $dossierCible = __DIR__ . '/../../public/images/';
    if (!is_dir($dossierCible)) {
        mkdir($dossierCible, 0777, true);
    }
    $nomImage = basename($_FILES['image']['name']);
    $fichierCible = $dossierCible . $nomImage;
    move_uploaded_file($_FILES['image']['tmp_name'], $fichierCible);
    $nomProd = strip_tags($_POST["nomProd"]);
    $prix = strip_tags($_POST["prix"]);
    $cheminImage = 'images/' . $nomImage;
    $req = $con->prepare("INSERT INTO produits (nom,image,prix) VALUES (?,?,?)");
    $req->execute([$nomProd, $cheminImage, $prix]);
    header("location: ../../templates/produits.php");
}
?>