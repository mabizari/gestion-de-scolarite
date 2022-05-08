<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
include("connexion.php");


   $ch = isset($_GET['but']) ? $_GET['but'] : false;
   $info=explode("_",$ch);
   $classe_choisie=$info[0];
   $module_choisie=$info[1];
   //$date_debut=$info[2];
   
   //$date_debut= date('d/M/Y h:i:s', strtotime($date_debut));
   
   //$date_debut=$info[3];

   //     /!\/!\/!\/!\   PROBLEME DE COMPARAISON DE DATE :(   :'     /!\/!\/!\/!\  
   
   
$req="SELECT * FROM etudiant where Classe='$classe_choisie'";
$reponse = $pdo->query($req);
if($reponse->rowCount()>0) {
	$outputs1["etudiant"]=array();
while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
        $etudiant = array();
        $etudiant["cin"] = $row["cin"];
        $etudiant["nom"] = $row["nom"];
        $etudiant["prenom"] = $row["prenom"];
        $cin_etudiant=$etudiant["cin"];
        $etudiant["nb_absence"]=$pdo->query("SELECT count(*) FROM absence where cin='$cin_etudiant'and module='$module_choisie' and classe='$classe_choisie'")->fetchColumn();
        $etudiant["nb_absence_justifie"]=$pdo->query("SELECT count(*) FROM absence where cin='$cin_etudiant'and module='$module_choisie' and classe='$classe_choisie' and justification='oui'")->fetchColumn();
        $etudiant["nb_absence_non_justifie"]=$pdo->query("SELECT count(*) FROM absence where cin='$cin_etudiant'and module='$module_choisie' and classe='$classe_choisie' and justification='non'")->fetchColumn();
        //echo($etudiant["nom"]);
        array_push($outputs1["etudiant"], $etudiant);

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
