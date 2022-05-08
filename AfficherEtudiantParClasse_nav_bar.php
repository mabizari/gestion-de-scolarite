<?php 
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
 else{
    include("connexion.php");
    $classe_cherché=$_REQUEST['classe_cherché'];

//echo($classe_cherché);

$req="SELECT * FROM etudiant where Classe='$classe_cherché'";
$reponse = $pdo->query($req);
if($reponse->rowCount()>0) {
	$outputs1["etudiants"]=array();
while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
        $etudiant = array();
        $etudiant["cin"] = $row["cin"];
        $etudiant["nom"] = $row["nom"];
        $etudiant["prenom"] = $row["prenom"];
        $etudiant["adresse"] = $row["adresse"];
        $etudiant["email"] = $row["email"];
        $etudiant["classe"] = $row["Classe"];
        array_push($outputs1["etudiants"], $etudiant);
    }
    $valeur="";
    foreach ($outputs1["etudiants"] as $eleve) {
        $valeur=$valeur.implode(",",$eleve)."|";
      }
      $valeur=substr($valeur,0,-1);//supprimer dérnier | pour avoir ne pas avoir une valeur vide dans le array $tab_étudiant ultérieurment
    // success
    $outputs1["success"] = 1;
     //echo json_encode($outputs1);
} else {
    $outputs1["success"] = 0;
    $outputs1["message"] = "Pas d'étudiants";
    // echo no users JSON
    echo json_encode($outputs1);
}

}
?>

<script>
    var jsvar = '<?=$valeur?>';
   
</script>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiants Par CLasse</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/dist/css/jumbotron.css" rel="stylesheet">

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
<main role="main">
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Afficher la liste d'étudiants par groupe</h1>
            </div>
          </div>

          
</div>  
<div class="container">
    <div id="demo3"></div>
  <div class="row">
    <!-- LISTE DES ETUDIANT-->
    <div class="table-responsive">
    <div id="demo2" class="table table-striped table-hover"></div>
    </div>
    
  </div>
</div>
<script>
    //alert(jsvar); 
    $tab_etudiant=jsvar.split("|");
    
    var $j;
    for ($j in $tab_etudiant)
    {
        $tab_etudiant[$j]=$tab_etudiant[$j].split(",");
        
        
    }

var out5="<table class= table table-striped table-hover >"+
    "<tr>"+
         "<th>"+
             "CIN"+
         "</th>"+
         "<th>"+
             "Nom"+
         "</th>"+
         "<th>"+
             "Prénom"+
         "</th>"+
         "<th>"+
             "Email"+
         "</th>"+
         "<th>"+
             "Adresse"+
         "</th>"+
         "<th>"+
             "Classe"+
         "</th>"+
     "</tr>";
		for ( i = 0; i < $tab_etudiant.length; i++) {
			out5+="<tr><td>"+
			$tab_etudiant[i][0] +
			"</td><td>"+
			$tab_etudiant[i][1]+
			"</td><td>"+
			$tab_etudiant[i][2]+
			"</td><td>"+
			$tab_etudiant[i][3]+
			"</td><td>"+
			$tab_etudiant[i][4]+
      "</td><td>"+
      $tab_etudiant[i][5]+
			"</td></tr>" 
      
			
		}
		out5+="</table>";

        document.getElementById("demo2").innerHTML=out5;
       
       //else document.getElementById("demo2").innerHTML="Aucune Inscriptions!";

</script>
<script>
    var $groupe = '<?=$classe_cherché?>';
    var $out11="<div class='container mt-3'><h4>Voici les Etudiants de la Classe "+$groupe+"</h4></div>";
    

    document.getElementById("demo3").innerHTML=$out11;
</script>


</main>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>