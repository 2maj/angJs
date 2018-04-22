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
    <!-- la partie de l'Header possède le titre ainsi que les boutons de connexion/inscription -->
    <header>
        <h1 id ="Open">Open Food Facts</h1>
    </header>
    
    
    <div class="container" id="contient_titre">
        <!-- La div "titre" sert a définir à quoi sert la page, ici il s'agit de la page de Bienvenue -->
        <div id="titre"  class="col-lg-2 col-md-2 col-lg-offset-1 col-md-offset-1">
            <h2>Welcome</h2>
        </div>
    </div>
    
    
    <div class="container" id="contient_section">
        <!-- les section contiens le contenu de la page, tout ce passe ici -->
        <section class="col-lg-12 col-md-12 col-lg-offset-2 col-md-offset-2">
            <div id="barreGauche" class="col-lg-1 col-md-1"></div>
                <div>
                    <!-- les articles vont divisé, si nécessaire, les différentes parties -->
                    <article>
                        <h3>Bienvenue sur notre site Open Food Facts</h3>
                    </article>

                    <article>
                        <div>
                            <form method="get" action='http://localhost/openfoodfacts/index.php/project_ctrl/accueil_ctrl'>
                                <p>
                                    <input type="submit" name='search' value="Rechercher un produit" />
                                    <input type="submit" name='see' value="consulter un produit" />
									<input type="submit" name='add' value="Ajouter un produit" />
                                </p>
                            </form>
                        </div>
                    </article>
                </div>
            <div id="barreDroite" class="col-lg-1 col-md-1"></div>
        </section>
    </div>
    
    <!-- le footer servira surtout à nous présenté -->
    <footer>
        <p> Moussa et Kylian</p>
    </footer>
</body>
</html>
