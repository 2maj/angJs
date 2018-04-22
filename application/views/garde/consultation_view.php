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
	<h1>Consultation un produit</h1>
	<table border="1">
			<tr><?php foreach(array_keys(current($_SESSION['un_produit'])) as $key) :?>
					<th>
							<?php 
								echo $key;
							?>
						</th>
						<?php endforeach; ?>
			</tr>
			
			<?php
				foreach($_SESSION['un_produit'] as $un_produit): ?>
					<tr>
							<?php
								foreach($un_produit as $attr => $val) : ?>
									<td>
										<?php echo "$val"; ?>
									</td>
								<?php endforeach; ?>
					</tr>
			<?php endforeach; ?>
	</table></br></br>
		<strong>afficher les informations nutritionnelles</strong>
		<div>
			<table border="1">
			<tr><?php foreach(array_keys(current($_SESSION['nutri'])) as $key) :?>
					<th>
							<?php 
								echo $key;
							?>
						</th>
						<?php endforeach; ?>
			</tr>
			
			<?php
				foreach($_SESSION['nutri'] as $un_produit): ?>
					<tr>
							<?php
								foreach($un_produit as $attr => $val) : ?>
									<td>
										<?php echo "$val"; ?>
									</td>
								<?php endforeach; ?>
					</tr>
			<?php endforeach; ?>
			</table></br></br>
		</div>
		<strong>afficher la composition</strong>
		<div>
			<table border="1">
			<tr><?php foreach(array_keys(current($_SESSION['compo'])) as $key) :?>
					<th>
						<?php 
							echo $key;
						?>
					</th>
					<?php endforeach; ?>
			</tr>
			
			<?php
				foreach($_SESSION['compo'] as $un_produit): ?>
					<tr>
							<?php
								foreach($un_produit as $attr => $val) : ?>
									<th>
										<?php echo "$val"; ?>
									</th>
								<?php endforeach; ?>
					</tr>
			<?php endforeach; ?>
			</table></br></br>
		</div>
	</form>
	<form method="get" action='accueil_ctrl'>
		<input type="submit" name='search' value="Faire une recherche"/>
	</form>
</body>
</html>