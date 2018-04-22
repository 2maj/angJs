<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<title>
		Open Food Facts
	</title>
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
            <h2>Rechercher un produit</h2>
        </div>
    </div>
    
    
    <div class="container" id="contient_section">
        <!-- les sections contiennent le contenu de la page, tout ce passe ici -->
        <section class="col-lg-12 col-md-12 col-lg-offset-2 col-md-offset-2">
            <div id="barreGauche" class="col-lg-1 col-md-1"></div>
                <div>
                    <!-- les articles vont diviser, si nécessaire, les différentes parties -->
                    <article>
                        <fieldset>
                            <form method="get" action='search_ctrl'>
                                    <p>
                                        <input name='tag' type="text" placeholder="Oil for example..." /> 
                                            <fieldset>
                                            <label>Caractéristiques :</label>
                                                <select name='caracteristique'>
                                                    <?php foreach(array_keys(current($_SESSION['caracteristique'])) as $key): ?>
                                                            <?php if($key!="id_produit" && $key != "code" && $key != "product_name"): ?>
																<option><?php echo "$key"; ?></option>
															<?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <input type="text" name='crit_caract' placeholder="france..." />
                                                </select>
                                            </fieldset>

                                            <fieldset>
                                                <label>Compositions :</label>
                                                <select name='composition'>
                                                    <?php foreach(array_keys(current($_SESSION['composition'])) as $key): ?>
                                                            <?php if($key!="id_produit" && $key != "code"): ?>
																<option><?php echo "$key"; ?></option>
															<?php endif; ?>
                                                    <?php endforeach; ?>
                                                    <input type="text" name='crit_compo' placeholder="lait..." />
                                                </select>
                                            </fieldset>

                                            <fieldset>
                                            <label>Informations nutritionnelles :</label>
                                                <select name='nutritionnel'>
                                                        <?php foreach(array_keys(current($_SESSION['nutritionnel'])) as $key): ?>
                                                                <?php if($key!="id_produit" && $key != "code"): ?>
																	<option><?php echo "$key"; ?></option>
																<?php endif; ?>
                                                        <?php endforeach; ?>
                                                        <input type="text" name='crit_nutri' placeholder="25g sucre..." />
                                                    </select>
                                            </fieldset>
                                    </p>
                                    <input type="submit" name='lancer' value="Rechercher"/>
                            </form>
                        </fieldset>
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