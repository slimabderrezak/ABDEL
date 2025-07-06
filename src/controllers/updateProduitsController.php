<?php
// On inclut le fichier de connexion à la base de données
require_once __DIR__ . '/../../config/connexiondb.php';

$con = connectdb();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $idProduit = $_POST['id'];
    $nomProduit = strip_tags($_POST['nom']);
    $prixProduit = strip_tags($_POST['prix']);
    $imageProduit = $_FILES['image']['name'] ? 'images/' .basename($_FILES['image']['name']) : null;
    if (isset($_FILES['nouvelleImage']) && $_FILES['nouvelleImage'] ['error'] == 0) {
    if (file_exists($imageProduit)) {
    unlink($imageProduit); // Supprimer l'ancienne image si elle existe
}
$dossierCible = __DIR__ . '/../../public/images/';
$fichierCible = $dossierCible . basename($_FILES['nouvelleImage'] ['name']);
    if (move_uploaded_file($_FILES['nouvelleImage'] ['tmp_name'], $fichierCible))
{
$imageProduit = $fichierCible;
}
}
$req = $con->prepare("UPDATE produits SET nom = ?, prix = ?, image = ?
WHERE id = ?");
$req->execute(array($nomProduit, $prixProduit, $imageProduit, $idProduit));
header("location: ../../templates/produits.php");
}  


?>

