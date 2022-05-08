<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$login=$_REQUEST['login'];
$classe=$_REQUEST['classe'];
$module=$_REQUEST['module'];


include("connexion.php");
         $sel=$pdo->prepare("select * from triplet where login=? and module=? and classe=? limit 1");
         $sel->execute(array($login,$classe,$module));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
            $erreur="NOT OK";// groupe existe déja
         else{
            $req="insert into triplet values ('$login','$module','$classe')";
            $reponse = $pdo->exec($req) or die("error");
            $erreur ="OK";
         }  
         echo $erreur;
}
?>