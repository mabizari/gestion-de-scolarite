<?php
   session_start();
   @$login=$_POST["login"];
   @$pass=md5($_POST["pass"]);
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      include("connexion.php");
      $sel=$pdo->prepare("select * from enseignant where login=? and pass=? limit 1");
      $sel->execute(array($login,$pass));
      $tab=$sel->fetchAll();
      if(count($tab)>0){
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);
         $_SESSION["autoriser"]="oui";
         $_SESSION["login"]=$tab[0]["login"];
         

         header("location:index.php");
         
      }
      else
         $erreur="Mauvais login ou mot de passe!";
   }
?>
<!doctype html>
<html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title> Se Connecter</title>

    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">





    <!-- Custom styles for this template -->
    <link href="./assets/dist/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">


<form id="myForm" class="form-signin" action=""method="post">
  <img class="mb-4" src="./assets/brand/user-login.svg" alt="" width="72" height="72">
  <div class="erreur"><?php echo $erreur ?></div>
  <h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>
  <!-- <label for="inputEmail" class="sr-only">Email </label>-->
  <input  type="email" id="inputEmail"name="login" class="form-control" placeholder="Email address" required autofocus>
 <!-- <label for="inputPassword" class="sr-only">Mot de Passe</label>-->
  <input type="password" id="inputPassword" name ="pass" class="form-control" placeholder="Password" required>
 <input class="btn btn-lg btn-primary btn-block"  name="valider" type="submit"value="Se Connecter"/>
 
  <br><a href="inscription.php"> Créer un Compte</a>
  <p class="mt-5 mb-3 text-muted">&copy; SOC-Enicar 2021-2022</p>
</form>
</script>
  </body>
</html>
