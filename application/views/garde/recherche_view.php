<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<title>
		Open Food Facts
	</title>
</head>
<body>
	<h1>Rechercher un produit</h1>
	<fieldset>
		<form method="get" action='search_ctrl'>
				<p>
					<input name='tag' type="text" placeholder="Oil for example..." /> <br/><br/>
						<fieldset>
						<label>Caractéristiques :</label><br/>
							<select name='caracteristique'>
								<?php foreach(array_keys(current($_SESSION['caracteristique'])) as $att): ?>
										<option><?php echo "$att"; ?></option>
								<?php endforeach; ?>
								<input type="text" name='crit_caract' placeholder="france..." />
							</select>
						</fieldset>
						<br/><br/>
						<fieldset>
							<label>Compositions :</label><br/>
							<select name='composition'>
								<?php foreach(array_keys(current($_SESSION['composition'])) as $att): ?>
										<option><?php echo "$att"; ?></option>
								<?php endforeach; ?>
								<input type="text" name='crit_compo' placeholder="lait..." />
							</select>
						</fieldset>
						<br/><br/>
						<fieldset>
						<label>Informations nutritionnelles :</label><br/>
							<select name='nutritionnel'>
									<?php foreach(array_keys(current($_SESSION['nutritionnel'])) as $att): ?>
											<option><?php echo "$att"; ?></option>
									<?php endforeach; ?>
									<input type="text" name='crit_nutri' placeholder="25g sucre..." />
								</select>
						</fieldset>
				</p>
				<br/><br/><br/><br/>
				<input type="submit" name='lancer' value="Rechercher"/>
		</form>
	</fieldset>
</body>
</html>