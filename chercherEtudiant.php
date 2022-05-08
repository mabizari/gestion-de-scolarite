<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
?>


<?php

if (isset($_REQUEST['cin']))
{
  $cin=$_REQUEST['cin'];

include("connexion.php");
         $sel=$pdo->prepare("select cin from etudiant where cin=? limit 1");
         $sel->execute(array($cin));
         $tabb=$sel->fetchAll();
         if(count($tabb)>0)
           {
           $s=$pdo->prepare("select * from etudiant where cin=? limit 1");
           $s->execute(array($cin));
           $tab=$s->fetchAll();
           unset($tab[0][0]);
           $out="<h4 class=container>les coordonnées de l étudiant recherché sont :</h4><br><br><br><hr/>";
           
           foreach ( $tab[0] as $clef =>$valeur)
             {if ($clef=="cin"||$clef=="email"||$clef== "nom"||$clef=="prenom"||$clef== "adresse"||$clef=="Classe"){
               $a1=strval($clef);
               $out=$out."<h4 class=container style=color:#000080;>".$a1." :<br></h4>" ;
               $out=$out."<h5 class=container >".$valeur."<br><br></h5><hr/>";}
            }
            $out=$out."<br><h4 class=container>Chercher un autre Etudiant : </h4>";
            
          }
            
           else {
            //$erreur ="NOT OK";
            //echo $erreur;
            $out="<h1 class=container>Etudiant Inexistant !</h1>";
            
         }  }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chercher un étudiant</title>
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
              <h1 class="display-4">Chercher un etudiant</h1>
              
            </div>
          </div>
          <div id="demo2"></div>
<div class="container">
<p>
 <form id="myForm" method="POST"action="" >
   
    
     <!--CIN-->
     <div class="form-group">
     <label for="cin">CIN:</label><br>
     <input type="text" id="cin" name="cin"  class="form-control" required pattern="[0-9]{8}" title="8 chiffres"/>
    </div>
    
     <!--Bouton Ajouter-->
     <button type="submit"  class="btn btn-primary"style="background-color:#3D5AFE;">chercher</button>
   
 </form>
 </p> 
 </div>
  <script  src="./assets/dist/js/inscrire.js"> </script>
 <div id="demo"></div>
 
   
</main>


<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>


</body>
</html>

<script>
    var jsvar = '<?=$out?>';
    console.log(jsvar);
    document.getElementById("demo2").innerHTML=jsvar;
    
</script>