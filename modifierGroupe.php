<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Groupe</title>
    <!-- Bootstrap core CSS -->
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/dist/css/jumbotron.css" rel="stylesheet">
 

</head>
<body onload="refresh()">


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





<div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Modifier un groupe</h1>
              
            </div>
          </div>


<div class="container">
 <form id="myform" method="POST" action="">
   
      <!--Classe-->
      <div class="form-group">
     <label for="classe">Ancien Groupe:</label><br>
     <input type="text" id="classe" name="classe" class="form-control" required pattern="INFO[1-3]{1}-[A-E]{1}"
     
     title="Pattern INFOX-X. Par Exemple: INFO1-A, INFO2-E, INFO3-C">
    </div>

    <div class="form-group">
     <label for="classe">Nouveau Groupe:</label><br>
     <input type="text" id="classe" name="classen" class="form-control" required pattern="INFO[1-3]{1}-[A-E]{1}"
     
     title="Pattern INFOX-X. Par Exemple: INFO1-A, INFO2-E, INFO3-C">
    </div>
     <!--Bouton supprimer   session_start();-->
     <br><button type="submit" class="btn btn-primary "style="background-color:#3D5AFE;">modifier</button><br><br>
   

 </form> 
 <?php
 if (isset($_REQUEST['classe'])&&isset($_REQUEST['classen'])){

 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$classe=$_REQUEST['classe'];
$classen=$_REQUEST['classen'];

include("connexion.php");

         $sel=$pdo->prepare("select  classe from etudiant where classe=? ");
         $sel->execute(array($classe));
         $tab=$sel->fetchAll();
         $sel2=$pdo->prepare("select  Classe from triplet where Classe=? ");
         $sel2->execute(array($classe));
         $tab2=$sel2->fetchAll();
         if ((count($tab)+count($tab2))<=0) 
         {  $erreur="NOT OK";}
         else {   
         if(count($tab)>0){
         $req="UPDATE etudiant set  classe='$classen' WHERE classe='$classe'" ;
         $reponse = $pdo->exec($req) or die("error");
         $erreur ="OK";}
         if(count($tab2)>0){
         $req2="UPDATE triplet set  classe='$classen' WHERE Classe='$classe'" ;
         $reponse2 = $pdo->exec($req2) or die("error");
         $erreur ="OK"; } 
         }
        if ( $erreur =="OK")
        { echo '<font color="limegreen">La modification du groupe a été bien effectué</font>';}
        else {
          echo '<font color="red">Le groupe  nexiste pas</font>';
        }
        
         }  }
      
?>
 
</div>  
</main>

<br/><br/>
<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>

<script  src="./assets/dist/js/inscrire.js"></script>
</body>
</html>



