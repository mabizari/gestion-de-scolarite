<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
include("connexion.php");

   $option = isset($_GET['but']) ? $_GET['but'] : false;
   //$classe_cherché=$_REQUEST['classe_cherché'];
   //if(isset($classe_cherché)) {
    //echo($classe_cherché);
   // $option=$classe_cherché;}
   
  

$req="SELECT * FROM etudiant where Classe='$option'";
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
    
    // success
    $outputs1["success"] = 1;
     echo json_encode($outputs1);
} else {
    $outputs1["success"] = 0;
    $outputs1["message"] = "Pas d'étudiants";
    // echo no users JSON
    echo json_encode($outputs1);
}
}
//header("location:afficherEtudiantsParClasse.php");
?>
