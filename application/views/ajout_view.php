<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<title>
		Open Food Facts
	</title>
    <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>
    <link rel="stylesheet" href ="OpenFoodFactsCSS.css" />
	<style>
	div {
  margin-bottom: 10px;
  position: relative;
}

input[type="number" step=0.01] {
  width: 100px;
}

input + span {
  padding-right: 30px;
}

input:invalid+span:after {
  position: absolute;
  content: '✖';
  padding-left: 5px;
}

input:valid+span:after {
  position: absolute;
  content: '✓';
  padding-left: 5px;
}
	</style>
</head>
    
    
<body>
    <!-- la partie de l'Header possède le titre ainsi que les boutons de connexion/inscription -->
    <header>
        <h1 id ="Open">Open Food Facts</h1>
		<h1>Ajouter un produit</h1>
    </header>
	<div>
	<form method="get" action='adding_ctrl'>
<!--		<label></label><input type="" name="" placeholder="..." /><br/><br/> -->
		<label>Code barre      </label><input type="number" step=0.01 name="code" placeholder="1234567..." /><br/><br/>
		<label>Url             </label><input type="url" name="url" placeholder="http://m&m.fr..." /><br/><br/>
		<label>Créateur        </label><input type="text" name="creator" placeholder="mht..." /><br/><br/>
		<label>Nom du produit  </label><input type="text" name="product_name" placeholder="m&m..." /><br/><br/>
		<label>Poids           </label><input type="text" name="serving_size" placeholder="0.25..." /><br/><br/>
		<label>Marque</label><input type="text" name="brand" placeholder="Nestle..." /><br/><br/>
		<label>Pays            </label><select name='s_state'>
										<option></option>
									<?php foreach($_SESSION['states'] as $att): ?>
										<option><?php echo $att['countries_fr']; ?></option>
									<?php endforeach; ?>
									<input type="text" name='state' placeholder="france..." />
								</select><br/><br/>
		<fieldset>
		<h2>Valeurs nutritionnelles</h2>
		<label>nutrition_grade_fr  </label><input type="text" name="nutrition_grade_fr" placeholder="b..." /><br/><br/>
		<label>energy_100g </label><input type="number" step=0.01 name="energy_100g" placeholder="..." /><br/><br/>
		<label>fat_100g </label><input type="number" step=0.01 name="fat_100g" placeholder="..." /><br/><br/>
		<label>saturated_fat_100g </label><input type="number" step=0.01 name="saturated_fat_100g" placeholder="..." /><br/><br/>
		<label>trans_fat_100g </label><input type="number" step=0.01 name="trans_fat_100g" placeholder="..." /><br/><br/>
		<label>cholesterol_100g </label><input type="number" step=0.01 name="cholesterol_100g" placeholder="..." /><br/><br/>
		<label>carbohydrates_100g </label><input type="number" step=0.01 name="carbohydrates_100g" placeholder="..." /><br/><br/>
		<label>sugars_100g </label><input type="number" step=0.01 name="sugars_100g" placeholder="..." /><br/><br/>
		<label>fiber_100g </label><input type="number" step=0.01 name="fiber_100g" placeholder="..." /><br/><br/>
		<label>proteins_100g </label><input type="number" step=0.01 name="proteins_100g" placeholder="..." /><br/><br/>
		<label>salt_100g </label><input type="number" step=0.01 name="salt_100g" placeholder="..." /><br/><br/>
		<label>sodium_100g </label><input type="number" step=0.01 name="sodium_100g" placeholder="..." /><br/><br/>
		<label>vitamin_a_100g </label><input type="number" step=0.01 name="vitamin_a_100g" placeholder="..." /><br/><br/>
		<label>vitamin_c_100g </label><input type="number" step=0.01 name="vitamin_c_100g" placeholder="..." /><br/><br/>
		<label>calcium_100g </label><input type="number" step=0.01 name="calcium_100g" placeholder="..." /><br/><br/>
		<label>iron_100g </label><input type="number" step=0.01 name="iron_100g" placeholder="..." /><br/><br/>
		<label>nutritions_core_fr_100g </label><input type="number" step=0.01 name="nutritions_core_fr_100g" placeholder="..." /><br/><br/>
		</fieldset><br/><br/>
		<fieldset>
		<h2>Ingredients</h2>
		<div>
		<label>Ingredient pouvant être de l'huile de palme</label><input type="number" step=0.01 name="may_palm" placeholder="..." /><br/><br/>
		<textarea type="text" name="ingredient" placeholder="Lait, chocolat..." cols="100" rows="5"></textarea>
		</div>
		</fieldset><br/><br/>
		<fieldset>
		<h2>Additifs</h2>
		<label>Nombre d'additifs</label><input type="numbre" name="addi_n" placeholder="..." /><br/><br/>
		<textarea type="text" name="additifs" placeholder="Emulsifiant E5..." cols="100" rows="5"></textarea>
		</fieldset><br/><br/>
		<input type="submit" name="add" value="Ajouter"/>
		<input type="submit" name="cancel" value="Annuler" />
	</form>
	</div>
</body>
</html>