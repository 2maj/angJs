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
    
    <!-- la partie de l'Header possède le titre ainsi que les boutons de connexion/inscription -->
    <header>
        <h1 id ="Open">Open Food Facts</h1>
    </header>
    
    
    <div class="container" id="contient_titre">
        <!-- La div "titre" sert a définir à quoi sert la page, ici il s'agit de la page de Bienvenue -->
        <div id="titre"  class="col-lg-2 col-md-2 col-lg-offset-1 col-md-offset-1">
            <h2>Modification d'un produit</h2>
        </div>
    </div>

    
    <div class="container" id="contient_section">
        <!-- les section contiens le contenu de la page, tout ce passe ici -->
        <section class="col-lg-12 col-md-12 col-lg-offset-2 col-md-offset-2">
            <div id="barreGauche" class="col-lg-1 col-md-1"></div>
                <div>
                    <!-- premier article -->
					<form method="get" action='edition_ctrl'>
                    <article>
                        <table border="1">
                                <tr><?php foreach(array_keys(current($_SESSION['un_produit'])) as $key) :?>
									<?php if($key!="id_produit" && $key != "code"): ?>
                                        <th>
                                            <?php echo $key;?>
                                        </th>
										<?php endif; ?>
                                    <?php endforeach; ?>
                                </tr>

                                <?php foreach($_SESSION['un_produit'] as $un_produit): ?>
                                        <tr>
                                                <?php
                                                    foreach($un_produit as $attr => $val) : ?>
														<?php if($attr!="id_produit"  && $attr != "code"): ?>
                                                        <td>
                                                            <textarea type="text"  name=<?php echo "$attr"; ?>><?php echo "$val"; ?></textarea>
                                                        </td>
														<?php endif; ?>
                                                    <?php endforeach; ?>
                                        </tr>
                                <?php endforeach; ?>
                        </table>
                    </article>
                    
                    <!-- second article -->
                    <article>
                        <strong>Informations nutritionnelles du produit</strong>
                        <div>
                            <table border="1">
                            <tr><?php foreach(array_keys(current($_SESSION['nutri'])) as $key) :?>
                                    <?php if($key!="id_produit"): ?>
                                        <th>
                                            <?php echo $key;?>
                                        </th>
									<?php endif; ?>
                                <?php endforeach; ?>
                            </tr>

                            <?php foreach($_SESSION['nutri'] as $un_produit): ?>
                                    <tr><?php foreach($un_produit as $attr => $val) : ?>
										<?php if($attr!="id_produit"): ?>
                                                <td>
                                                    <textarea type="text"  name=<?php echo "$attr"; ?> cols="10" rows="2"><?php echo "$val"; ?></textarea>
                                                </td>
										<?php endif; ?>
                                        <?php endforeach; ?>
                                    </tr>
                            <?php endforeach; ?>
                            </table>
                        </div>
                    </article>
                    
                    <!-- troisieme article -->
                    <article>
                        <strong>Les informations sur la composition du produit</strong>
                        <div>
                            <table border="1">
                            <tr><?php foreach(array_keys(current($_SESSION['compo'])) as $key) :?>
                                    <?php if($key!="id_produit"): ?>
									<th>
                                        <?php 
                                            echo $key;
                                        ?>
                                    </th>
									<?php endif; ?>
                                    <?php endforeach; ?>
                            </tr>

                            <?php foreach($_SESSION['compo'] as $un_produit): ?>
                                    <tr>
                                            <?php
                                                foreach($un_produit as $attr => $val) : ?>
												<?php if($attr!="id_produit"): ?>
                                                    <th>
                                                        <textarea type="text"  name=<?php echo "$attr"; ?> cols="100" rows="5"><?php echo "$val"; ?></textarea>
                                                    </th>
												<?php endif; ?>
                                                <?php endforeach; ?>
                                    </tr>
                            <?php endforeach; ?>
                            </table>
                        </div>
                    </article>
                        
                            <input type="submit" name='cancel' value="Annuler"/>
							<input type="submit" name='save' value="Enregistrer"/>
	                    </form>
                </div>
            <div id="barreDroite" class="col-lg-1 col-md-1"></div>
        </section>
    </div>
	
    
    <footer>
        <p> Moussa et Kylian</p>
    </footer>
    
</body>
</html>