<?php
	// Recuperation des parametres (lors du changement d'annees)
	if(isset($_POST["year"])) { // Recuperation des parametres POST pour le formulaire
		$year = $_POST["year"];
	}
	elseif(isset($_GET["year"])) { // Recuperation des parametres GET pour les liens vers les annees precedentes et suivantes
		$year = $_GET["year"];
	}
	else { // sinon on applique l'annee en cours
		$newDate = New DateTime();
		$year = $newDate->format("Y");
	}
	
	// mise en memoire des jours de la semaine et des mois de l'annee dans un tableau
	$aDayOfWeek = array("Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim");
	$aMonth = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	
	// creation d'une date temporaire en fonction du parametre annee recu
	$newDate = New DateTime();
	$newDate->setDate($year, 1, 1);
	if ($newDate->format("L") == 1) { // si l'annee est bissextile, mise en memoire des nombres de jours par mois de l'annee (avec 29 a fevrier)
		$aMonthDays = array("31", "29", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31");
	}
	else { // sinon, mise en memoire des nombres de jours par mois de l'annee (avec 28 a fevrier)
		$aMonthDays = array("31", "28", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31");
	}
?>
<html>
	<head>
		<title>Calendrier <?php echo $year; // Affichage de l'annee ?></title>
		 <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">
    <style>
    footer {
  background-color: #1A237E;
  padding: 10px;
  text-align: center;
  color: white;
}
		<style type="text/css">
		
				#calendar {padding:0; margin:0; border-top:1px solid black; border-left:1px solid black; border-right:1px solid black;}
				#calendar th {border:1px solid black; border-bottom:2px solid black}
				#calendar td {padding-left:3px; padding-right:3px}
				#calendar td.dayOfWeek {border-left:1px solid black;}
				#calendar td.day {text-align: right;}
				#calendar td.week {border-right:1px solid black; font-weight:bold;}
				#calendar td.endOfMonth {border-bottom:2px solid black;}
				#calendar .weekend{background-color : #CCC;}
		
		</style>
	</head>
	<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top "style="background-color:#1A237E;">
        <a class="navbar-brand" href="index.php"><img id="logo" src="http://www.enicarthage.rnu.tn/assets/images/logo.png"alt="logo" width=45%/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
        
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les étudiants</a>
                <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
                <a class="dropdown-item" href="ajouterGroupe.php">Ajouter Groupe</a>
                <a class="dropdown-item" href="modifierGroupe.php">Modifier Groupe</a>
                <a class="dropdown-item" href="supprimerGroupe.php">Supprimer Groupe</a>
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="ajouterEtudiant.php">Ajouter Etudiant</a>
                <a class="dropdown-item" href="chercherEtudiant.php">Chercher Etudiant</a>
                <a class="dropdown-item" href="modifierEtudiant.php">Modifier Etudiant</a>
                <a class="dropdown-item" href="supprimerEtudiant.php">Supprimer Etudiant</a>
      
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="saisirAbsence.php" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="saisirAbsence.php">Saisir Absence</a>
                <a class="dropdown-item" href="etatAbsence.php">État des absences pour un groupe</a>
              </div>
            </li>
      
            <li class="nav-item active">
            <a class="nav-link" href="deconnexion.php">Se Déconnecter <span class="sr-only">(current)</span></a>
            </li>
      
          </ul>
          <form method="POST" name="nav_form" class="form-inline my-2 my-lg-0" action="AfficherEtudiantParClasse_nav_bar.php">
            <input class="form-control mr-sm-2" type="text" placeholder="Saisir un groupe" aria-label="Chercher un groupe" name="classe_cherché">
            <input class="btn btn-primary"type="submit" name="boutton_nav_chercher"></input>
          </form>
      
         
        </div>
      </nav>
	  <br/><br/><br/><br/>
		<center>
			<h2>Calendrier <?php echo $year;// Affichage de l'annee ?></h2>
			<table id="calendar" cellpadding="0" cellspacing="0" border="0">
				<thead>
					<tr>
						<?php for ($m=0; $m<12; $m++) { // Creation d'une boucle pour ecrire les entetes de colonnes ?>
						<th colspan="3"><?php echo $aMonth[$m]; // Ecriture du nom du mois ?></th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php for ($d=1; $d<=31; $d++) { // Creation d'une boucle pour realiser les lignes ?>
					<tr>
						<?php for ($m=0; $m<12; $m++) { // Creation d'une boucle pour ecrire les colonnes
							$newDate = New DateTime(); // Creation d'une date pour obtenir le numero du jour de la semaine et le numero de semaine
							$newDate->setDate($year, ($m+1), $d);
							$dayOfWeek = $newDate->format("N")-1; // Recuperation du numero du jour de la semaine (0 à 6)
							$weekend = ((($dayOfWeek==5 or $dayOfWeek==6) and $d <= $aMonthDays[$m])?" weekend":""); // Si le jour est un samedi ou dimanche et compris dans le mois, mise en memoire du mot weekend (classe css)
							$endOfMonth = (($d==31)?" endOfMonth":""); // Si dernier jour du mois, mise en memoire du mot endOfWeek (classe css)
							if ($d <= $aMonthDays[$m])  { // Si le jour est compris dans le mois en cours ?>
							
						<!--// Ajout des classes css predefinis et affichage du jour de la semaine dans la premiere colonne -->
						<td class="dayOfWeek<?php echo $weekend.$endOfMonth;?>"><?php echo $aDayOfWeek[$dayOfWeek]; ?></td>
						
						<!--// Ajout des classes css predefinis et affichage du numero du jour du mois-->
						<td class="day<?php echo $weekend.$endOfMonth;?>"><?php echo $d; ?></td>
						
						<!--// Ajout des classes css predefinis et affichage en debut de semaine ou premier jour de l'annee du numero de semaine -->
						<td class="week<?php echo $weekend.$endOfMonth;?>"><?php echo (($dayOfWeek==0 or ($d==1 and $m==0))?$newDate->format("W"):"&nbsp;");?></td>
						
						<?php } else { // Si le jour n'est pas compris dans le mois (le 31 n'existe pas en fevrier) ?>
						
						<!--// Ajout des classes css predefinis et ajout d'un espace pour que la cellule soit affichee correctement -->
						<td class="dayOfWeek<?php echo $weekend.$endOfMonth;?>" colspan="2">&nbsp;</td>
						<td class="week<?php echo $weekend.$endOfMonth;?>">&nbsp;</td>
						
						<?php } } ?>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<br />
			<!--// Liens vers cette meme page avec le parametre annee pointant vers l'annee precedente et suivante -->
			<a href="<?php echo $_SERVER["PHP_SELF"]?>?year=<?php echo $year-1;?>">Année précédente</a>&nbsp;&nbsp;&nbsp;
			<a href="<?php echo $_SERVER["PHP_SELF"]?>?year=<?php echo $year+1;?>">Année suivante</a>
			<br />
			<br />
			<!--// Creation d'un formulaire pour la saisie de l'annee qui retourne vers cette meme page -->
			<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
				Année :&nbsp;
				<input name="year" value="<?php echo $year;?>" />
				<input type="submit" value="Appliquer" />
			</form>


			
<footer >
  <p>&copy; ENICAR 2021-2022</p>
</footer>
      
  </body>
</html>







