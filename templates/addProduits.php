<?php 
require_once 'partials/_head.php'; // Include header file
?>

 <div class="container mt-4">
 <h1 class="text-center">Ajouter un produit</h1>
 <form action="../src/controllers/addProduitsController.php" method="post"
enctype="multipart/form-data">
 <div id="label">
 <label class="form-label" for="nomProd">Nom du produit</label>
 </div>
 <input class="form-control" type="text" name="nomProd" id="nomProd"
placeholder="Nom du produit" />
 <div id="label">
 <label class="form-label" for="image">Image</label>
 </div>
 <input class="form-control" type="file" name="image" id="image" />
 <div id="label">
 <label class="form-label" for="prix">Prix</label>
 </div>
 <input class="form-control" type="number" name="prix" id="prix" step=".01"/>
 <div class="text-center my-4">
 <input id="btn2" class="btn btn-outline-danger mx-1" type="reset"
value="Reset" />
 <input id="btn" class="btn btn-outline-success mx-1" type="submit"
value="Ajouter" />
 </div>
 </form>
 <div>
 <a href="produit.php"><button class="btn btn-outline-primary mx-1">afficher
les produits</button></a>
 </div>
 </div>


