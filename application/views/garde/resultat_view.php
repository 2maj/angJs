<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<title>
		Open Food Facts
	</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		tr:hover {background-color:#f5f5f5;}
</style>
</head>
<body>
	<h1>Résultat(s) de la recherche</h1>
	<form method="get" action='accueil_ctrl'>
		<input type="submit" name='search' value="Faire une nouvelle recherche"/>
	</form>
	<br/><br/>
	<strong><?php echo $_SESSION['nb_ligne'][0]['nb'].' résultat(s) trouvé(s) '; ?></strong>
	<br/><br/>
	<table>
			<tr><?php foreach(array_keys(current($_SESSION['resultat'])) as $key) :?>
					<th>
							<?php 
								echo $key;
							?>
						</th>
						<?php endforeach; ?>
			</tr>
			<?php
				foreach($_SESSION['resultat'] as $ligne): ?>
					<tr>
							<?php
								foreach($ligne as $attr => $val) : ?>
									<form method="get" action='accueil_ctrl'>
										<td>
											<input type="submit" name='val' value="<?php echo "$val"; ?>" />
										</td>
										
									</form>
								<?php endforeach; ?>
					</tr>
			<?php endforeach; ?>
	</table>
	<br/><br/>
	<form method="get" action='page_search_ctrl'>
		<input type="submit" name='preview' value="Précédent..." />
		<input type="submit" name='next' value="Suivant..." />
	</form>
</body>
</html>