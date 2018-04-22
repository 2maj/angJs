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
    <link href="bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet"/>
    <link rel="stylesheet" href ="OpenFoodFactsCSS.css" />
</head>
    
    
<body>
    
    <header>
        <h1 id ="Open">Open Food Facts</h1>
    </header>
    
    <div class="container" id="contient_titre">
        <!-- La div "titre" sert a définir à quoi sert la page, ici il s'agit de la page de Bienvenue -->
        <div id="titre"  class="col-lg-2 col-md-2 col-lg-offset-1 col-md-offset-1">
            <h2>Résultat(s) de la recherche</h2>
        </div>
    </div>

    <div class="container" id="contient_section">
        <!-- les section contiens le contenu de la page, tout ce passe ici -->
        <section class="col-lg-12 col-md-12 col-lg-offset-2 col-md-offset-2">
            <div id="barreGauche" class="col-lg-1 col-md-1"></div>
                <div>
                    <!-- les articles vont divisé, si nécessaire, les différentes parties -->
                    <article>
                        <form method="get" action='accueil_ctrl'>
							
                            <input type="submit" name='search' value="Faire une nouvelle recherche"/>
                        </form>
                        <strong><?php echo $_SESSION['nb_ligne'][0]['nb'].' résultat(s) trouvé(s) '; ?></strong>
                    </article>
                    
                    <article>
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
																<?php if($attr=="id_produit"): ?>
																	<input type="hidden" name='val' value="<?php echo "$val"; ?>" />
																	<input type="submit" name='details' value="Voir détails" />
																<?php else: ?>
																	<?php echo "$val"; ?>
																<?php endif ?>
															</td>

                                                        </form>
                                                    <?php endforeach; ?>
                                        </tr>
                                <?php endforeach; ?>
                        </table>
                    </article>
                    
                    <article>
                        <form method="get" action='page_search_ctrl'>
							<?php if($_SESSION['nb_ligne'][0]['nb'] <= 25): ?>
								<input type="submit" name='preview' value="Précédent..." disabled="disabled" />
								<input type="submit" name='next' value="Suivant..." disabled="disabled"/>
							<?php else : ?>
								<input type="submit" name='preview' value="Précédent..."  />
								<input type="submit" name='next' value="Suivant..." />
							<?php endif ?>
                        </form>
                    </article>
                </div>
            <div id="barreDroite" class="col-lg-1 col-md-1"></div>
        </section>
    </div>
    
    <footer>
        <p> Moussa et Kylian</p>
    </footer>
</body>
</html>