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
            <h2>Consulter un produit</h2>
        </div>
    </div>

    
    <div class="container" id="contient_section">
        <!-- les section contiens le contenu de la page, tout ce passe ici -->
        <section class="col-lg-12 col-md-12 col-lg-offset-2 col-md-offset-2">
            <div id="barreGauche" class="col-lg-1 col-md-1"></div>
                <div>
                    <!-- premier article -->
                    <article>
                        <table border="1">
                                <tr><?php foreach(array_keys(current($_SESSION['un_produit'])) as $key) :?>
											<?php if($key!="id_produit"): ?>	
												<th>
                                                <?php 
                                                    echo $key;
                                                ?>
                                            </th>
											<?php endif; ?>
                                            <?php endforeach; ?>
                                </tr>

                                <?php
                                    foreach($_SESSION['un_produit'] as $un_produit): ?>
                                        <tr>
                                                <?php
                                                    foreach($un_produit as $attr => $val) : ?>
													<?php if($attr!="id_produit"): ?>
                                                        <td>
                                                            <?php echo "$val"; ?>
                                                        </td>
														<?php endif; ?>
                                                    <?php endforeach; ?>
                                        </tr>
                                <?php endforeach; ?>
                        </table>
                    </article>
                    
                    <!-- second article -->
                    <article>
                        <strong>afficher les informations nutritionnelles</strong>
                        <div>
                            <table border="1">
                            <tr><?php foreach(array_keys(current($_SESSION['nutri'])) as $key) :?>
                                    <?php if($key!="id_produit"): ?>
									<th><?php echo $key;?></th>
									<?php endif; ?>
                                        <?php endforeach; ?>
                            </tr>

                            <?php
                                foreach($_SESSION['nutri'] as $un_produit): ?>
                                    <tr>
                                            <?php
                                                foreach($un_produit as $attr => $val) : ?>
												<?php if($attr!="id_produit"): ?>
                                                    <td>
                                                        <?php echo "$val"; ?>
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
                        <strong>afficher la composition</strong>
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

                            <?php
                                foreach($_SESSION['compo'] as $un_produit): ?>
                                    <tr>
                                            <?php
                                                foreach($un_produit as $attr => $val) : ?>
												<?php if($attr!="id_produit"): ?>
                                                    <th>
                                                        <?php echo "$val"; ?>
                                                    </th>
													<?php endif; ?>
                                                <?php endforeach; ?>
                                    </tr>
                            <?php endforeach; ?>
                            </table>
                        </div>
                    </article>
                    
                    <!-- bouton recherche -->
                    <article>
                        <form method="get" action='accueil_ctrl'>
                            <input type="submit" name='search' value="Faire une recherche"/>
							<input type="submit" name='edit' value="Modifier ce produit"/>
							<input type="submit" name='accueil' value="Page d'accueil"/>
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