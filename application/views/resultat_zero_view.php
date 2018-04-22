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
	                   <strong><?php echo '0 résultat(s) trouvé(s) '; ?></strong>
                    </article>
                    
                    <article>
                        <form method="get" action='accueil_ctrl'>
                            <input type="submit" name='search' value="Faire une nouvelle recherche"/>
                        </form>
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