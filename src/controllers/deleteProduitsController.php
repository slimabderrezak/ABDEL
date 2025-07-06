<?php
// On inclut le fichier de connexion à la base de données
require_once __DIR__ . '/../../config/connexiondb.php';
$con = connectdb();
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['id'])) {
$idProduits = $_POST['id'];
$req = $con->prepare("SELECT image FROM produits WHERE id = ?");
$req->execute([$idProduits]);
$result = $req->fetch();
if ($result) {
$cheminImage = '../public/images/' . basename($result['image']);
if (file_exists($cheminImage)) {
unlink($cheminImage); // Supprimer l'image du produit
}
$req = $con->prepare("DELETE FROM produits WHERE id = ?");
$req->execute([$idProduits]);
header("Location: ../../templates/produits.php");
exit;
} else {
echo "Erreur : le produit ou l'image n'existe pas.";
}
}
?>

<form action="../src/controllers/deleteProduitsController.php" method="post"
onsubmit="confirmerSuppression(event)">
<input type="hidden" name="id" value="' . $ligne['id'] . '">
<input class="btn btn-outline-danger my-1" type="submit"
value="Supprimer">
</form></td>

function confirmerSuppression(event) {
if (!confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')) {
event.preventDefault();
}
}