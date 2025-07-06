<?php
require_once "../config/connexiondb.php";
require_once __DIR__ . '/partials/_head.php';
// require_once '../../templates/partials/_header.php'; // Include header file
$con = connectdb();
$data = null;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
$idProduit = $_POST['id'];
$result = $con->query("SELECT * FROM produits WHERE id = $idProduit");
$data = $result->fetch();
}
?>
<!DOCTYPE html>
<html lang="fr">
<body>
<div class="container mt-4">
<h1 class="text-center">Modifier le produit</h1>

<?php if ($data): ?>

<form action="../src/controllers/updateProduitsController.php" method="post"
enctype="multipart/form-data">
<input class="form-control" type="hidden" name="id" value="<?php echo
htmlspecialchars($data['id']); ?>">
<label class="form-label" for="nom">Nom du produit</label>
<input class="form-control" type="text" name="nom" id="nom" value="<?php
echo htmlspecialchars($data['nom']); ?>" required>
<label class="form-label" for="image">Image</label><br>
<input type="hidden" name="imageActuelle" value="<?php echo
htmlspecialchars($data['image']); ?>">
<img class="mb-2" src="../public/images/<?php echo
htmlspecialchars(basename($data['image'])); ?>" alt="Image du produit"
width="100"><br>
<input class="form-control" type="file" name="nouvelleImage">
<label class="form-label" for="prix">Prix</label>
<input class="form-control" type="number" name="prix" id="prix" step=".01"
value="<?php echo htmlspecialchars($data['prix']); ?>" />
<input type="submit" class="btn btn-outline-success my-4" value="Mettre à
jour">

</form>
<?php else: ?>
<div class="alert alert-warning mt-4">Aucun produit sélectionné pour la
modification.</div>
<?php endif; ?>
<div>
<a href="./produits.php"><button class="btn btn-outline-primary">afficher les
produits</button></a>
</div>
</div>
</body>
</html>