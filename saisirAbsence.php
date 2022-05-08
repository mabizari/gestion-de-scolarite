<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Saisir un absence </title>

    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/dist/css/jumbotron.css" rel="stylesheet">

</head>
<body onload="refresh()" >
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
              <h1 class="display-4">Signaler l'absence pour tout un groupe</h1>
              
            </div>
          </div>

<div class="container">

<form id="info_form" method="post" action="ajouterAbsence.php">
<div class="form-group">
  <label for="machin:bidule">Choisir une semaine:</label><br>
  <input id="machin:bidule" type="week" name="debut" size="10" class="datepicker"/>
</div>
  <div class="form-group">
<label for="classe">Choisir un groupe:</label><br>

<div id="demo1"></div>

</div>


<div class="form-group">
  <label for="module">Choisir un module:</label><br>
  <div id="demo2"></div>
  </div>


<table id="demo3" class= "table table-striped table-hover">  </table> 






 <!--Bouton Valider-->
 <input type="submit"  class="btn btn-primary " style="background-color:#3D5AFE;"name="valider" value="valider" onclick=sending_data()/></button>
</form>
</div>  
</main>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>





<!-- SCRIPT LIST CLASSES  -->
<script>
            function refresh() {
                var xmlhttp = new XMLHttpRequest();
                var url = "http://localhost/mini-projet-info1_enicar/afficherListClassePourAbsence.php";
                //Envoie de la requete
        
          xmlhttp.open("GET",url,true);
          xmlhttp.send();
             //Traiter la reponse
             xmlhttp.onreadystatechange=function()
                    {   //alert(this.readyState+" "+this.status);
                        if(this.readyState==4 && this.status==200){
                        
                            myFunction(this.responseText);
                            //alert(this.responseText);
                            console.log(this.responseText);
                            
                        }
                    }
        
        
            //Parse la reponse JSON
          function myFunction(response){
            var obj=JSON.parse(response);
                //alert(obj.success);
        
                if (obj.success==1)
                {
            var arr=obj.classe;
            var out="<select onchange=refresh2() name='but' id='select1' class='custom-select custom-select-sm custom-select-lg' >";          
            
            out+="<option></option>"
            var i;
            for ( i = 0; i < arr.length; i++) {
              out+="<option id=d value="+arr[i]+">"+arr[i]+"</option>"
            }
            

            document.getElementById("demo1").innerHTML=out;
               }
               else document.getElementById("demo1").innerHTML="Aucun Groupe!";
            }
            }
            </script>


<!-- SCRIPT LIST MODULE  -->
<script>
            function refresh2() {
              
              
              var e2 = document.getElementById("select1");
              var but2 = e2.value;
                var xmlhttp = new XMLHttpRequest();
                

                var url = "http://localhost/mini-projet-info1_enicar/afficherListModule.php?but2="+but2;
                //Envoie de la requete
        
          xmlhttp.open("GET",url,true);
          xmlhttp.send();
             //Traiter la reponse
             xmlhttp.onreadystatechange=function()
                    {   //alert(this.readyState+" "+this.status);
                        if(this.readyState==4 && this.status==200){
                        
                            myFunction2(this.responseText);
                            //alert(this.responseText);
                            console.log(this.responseText);
                            
                        }
                    }
        
        
            //Parse la reponse JSON
          function myFunction2(response){
            var obj=JSON.parse(response);
                //alert(obj.success);
        
                if (obj.success==1)
                {
            var arr=obj.module;
            var out="<select  onchange=refresh3() name='module' id='select2' class='custom-select custom-select-sm custom-select-lg' >";          
            out+="<option></option>"

            var i;
            for ( i = 0; i < arr.length; i++) {
              out+="<option id=d value="+arr[i]+">"+arr[i]+"</option>"
            }
            out +="</select>";
            
          
            
            
            document.getElementById("demo2").innerHTML=out;
            
               }
               else document.getElementById("demo2").innerHTML="Aucun module!";
            }
            }
            </script>

  


<script>// SCRIPT POUR L'AFFICHAGE DES ETUDIANT DE LA CLASSE CHOISIE

function refresh3() {
  var e1=document.getElementById("select1") ;
  console.log(e1.value);
  //alert(e1.value);

  


var but1 = e1.value;
        var xmlhttp1 = new XMLHttpRequest();
        var url = "http://localhost/mini-projet-info1_enicar/afficherParClasse.php?but="+but1;
        //Envoie de la requete
  
	xmlhttp1.open("get",url,true);
	xmlhttp1.send();
     //Traiter la reponse
     xmlhttp1.onreadystatechange=function()
            {   //alert(this.readyState+" "+this.status);
                if(this.readyState==4 && this.status==200){
                
                    myFunction3(this.responseText);
            
                    
                }
            }


    //Parse la reponse JSON
	function myFunction3(response){
     
		var obj=JSON.parse(response);
        //alert(obj.success);

        if (obj.success==1)
        {
		var arr=obj.etudiants;
		var i;
		var out="<tr><th>&nbsp;</th><th></th><th></th>"+
    "<th colspan=2 width=130px style=padding-left: 5px; padding-right: 5px;>Lundi</th>"+
    "<th colspan=2 width=130px style=padding-left: 5px; padding-right: 5px;>mardi</th>"+
    "<th colspan=2 width=130px style=padding-left: 5px; padding-right: 5px;>mercredi</th>"+
    "<th colspan=2 width=130px style=padding-left: 5px; padding-right: 5px;>jeudi</th>"+
    "<th colspan=2 width=130px style=padding-left: 5px; padding-right: 5px;>vendredi</th>"+
    "<th colspan=2 width=130px style=padding-left: 5px; padding-right: 5px;>samedi</th>"+
"</tr><tr><th>"+arr.length+"Etudiant(s)</th><td>&nbsp;</td><td>&nbsp;</td>"+
"<th id=lundi colspan=2 width=130px style=padding-left: 5px; padding-right: 5px;></th>"+
"<th id=mardi colspan=2 width=130px style=padding-left: 5px; padding-right: 5px;></th>"+
"<th id=mercredi colspan=2 width=130px style=padding-left: 5px; padding-right: 5px;></th>"+
"<th id=jeudi colspan=2 width=130px style=padding-left: 5px; padding-right: 5px;></th>"+
"<th id=vendredi colspan=2 width=130px style=padding-left: 5px; padding-right: 5px;></th>"+
"<th id=samedi colspan=2 width=130px style=padding-left: 5px; padding-right: 5px;></th>"+



"</tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>"+
"<th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th>"+
"</tr>"+
"<tr><th>Num</th><th>  CIN</th><th>Nom-Prénom</th>"+
 "<th>J    N</th><th>J    N</th><th>J    N</th><th>J    N</th><th>J    N</th><th>J    N</th><th>J    N</th><th>J    N</th><th>J    N</th><th>J    N</th><th>J    N</th><th>J    N</th>"

"</tr>";

//la Classe choisie
var e2 = document.getElementById("select1");
              var but2 = e2.value;
//le module choisie
var e3 = document.getElementById("select2");
              var but3 = e3.value;
              var weekControl = document.querySelector('#machin\\:bidule');

  

//-----TRAITEMENT POUR DETERMINER LES DATES DES JOURS DE LA SEMAINE CHOISIE-----/////
  

//lundi jour lundi mois lundi annee
var weekControl = document.querySelector('#machin\\:bidule');
var lundi_j=weekControl.valueAsDate.getDate();
var lundi_m=weekControl.valueAsDate.getMonth()+1;
var lundi_a=weekControl.valueAsDate.getFullYear();
//lundi version chaine
var lundi_chaine=String(lundi_j+'/'+lundi_m+'/'+lundi_a);

//mardi jour mardi mois mardi annee
  var date_pour_mardi=weekControl.valueAsDate;
  date_pour_mardi.setDate(date_pour_mardi.getDate()+1);
  
  var mardi_j=date_pour_mardi.getDate();
  var mardi_m=date_pour_mardi.getMonth()+1;
  var mardi_a=date_pour_mardi.getFullYear();
  //mardi version chaine
  var mardi_chaine=String(mardi_j+'/'+mardi_m+'/'+mardi_a);

//mercredi jour mercredi mois mercredi annee
  var date_pour_mercredi=weekControl.valueAsDate;
  date_pour_mercredi.setDate(date_pour_mercredi.getDate()+2);
  
  var mercredi_j=date_pour_mercredi.getDate();
  var mercredi_m=date_pour_mercredi.getMonth()+1;
  var mercredi_a=date_pour_mercredi.getFullYear();
  //mercredi version chaine
  var mercredi_chaine=String(mercredi_j+'/'+mercredi_m+'/'+mercredi_a);


//jeudi jour jeudi mois jeudi annee
  var date_pour_jeudi=weekControl.valueAsDate;
  date_pour_jeudi.setDate(date_pour_jeudi.getDate()+3);
  
  var jeudi_j=date_pour_jeudi.getDate();
  var jeudi_m=date_pour_jeudi.getMonth()+1;
  var jeudi_a=date_pour_jeudi.getFullYear();
  //jeudi version chaine
  var jeudi_chaine=String(jeudi_j+'/'+jeudi_m+'/'+jeudi_a);

//vendredi jour vendredi mois vendredi annee
 var date_pour_vendredi=weekControl.valueAsDate;
  date_pour_vendredi.setDate(date_pour_vendredi.getDate()+4);
  
  var vendredi_j=date_pour_vendredi.getDate();
  var vendredi_m=date_pour_vendredi.getMonth()+1;
  var vendredi_a=date_pour_vendredi.getFullYear();
  //vendredi version chaine
  var vendredi_chaine=String(vendredi_j+'/'+vendredi_m+'/'+vendredi_a);


  //samedi jour samedi mois samedi annee
var date_pour_samedi=weekControl.valueAsDate;
  date_pour_samedi.setDate(date_pour_samedi.getDate()+5);
  
  var samedi_j=date_pour_samedi.getDate();
  var samedi_m=date_pour_samedi.getMonth()+1;
  var samedi_a=date_pour_samedi.getFullYear();
  //samedi version chaine
  var samedi_chaine=String(samedi_j+'/'+samedi_m+'/'+samedi_a);



  for ( i = 0; i < arr.length; i++) {
          
			out+="<tr><th>"+(i+1)+"</th><td>"+arr[i].cin+"</td><td>"+arr[i].nom +" "+arr[i].prenom+"</td>"+
      "<td><input type=checkbox name=ch[] value="+String(i)+"_0_"+String(arr[i].cin)+"_"+lundi_chaine+"_"+but2+"_"+but3+"> <input type=checkbox name=ch[] value="+String(i)+"_1_"+String(arr[i].cin)+"_"+lundi_chaine+"_"+but2+"_"+but3+"></td>"+
      "<td><input type=checkbox name=ch[] value="+String(i)+"_2_"+String(arr[i].cin)+"_"+lundi_chaine+"_"+but2+"_"+but3+"> <input type=checkbox name=ch[] value="+String(i)+"_3_"+String(arr[i].cin)+"_"+lundi_chaine+"_"+but2+"_"+but3+"></td>"+
      "<td><input type=checkbox name=ch[] value="+String(i)+"_4_"+String(arr[i].cin)+"_"+mardi_chaine+"_"+but2+"_"+but3+"> <input type=checkbox name=ch[] value="+String(i)+"_5_"+String(arr[i].cin)+"_"+mardi_chaine+"_"+but2+"_"+but3+"></td>"+
      "<td><input type=checkbox name=ch[] value="+String(i)+"_6_"+String(arr[i].cin)+"_"+mardi_chaine+"_"+but2+"_"+but3+"> <input type=checkbox name=ch[] value="+String(i)+"_7_"+String(arr[i].cin)+"_"+mardi_chaine+"_"+but2+"_"+but3+"></td>"+
      "<td><input type=checkbox name=ch[] value="+String(i)+"_8_"+String(arr[i].cin)+"_"+mercredi_chaine+"_"+but2+"_"+but3+"> <input type=checkbox name=ch[] value="+String(i)+"_9_"+String(arr[i].cin)+"_"+mercredi_chaine+"_"+but2+"_"+but3+"></td>"+
      "<td><input type=checkbox name=ch[] value="+String(i)+"_10_"+String(arr[i].cin)+"_"+mercredi_chaine+"_"+but2+"_"+but3+"> <input type=checkbox name=ch[] value="+String(i)+"_11_"+String(arr[i].cin)+"_"+mercredi_chaine+"_"+but2+"_"+but3+"></td>"+
      "<td><input type=checkbox name=ch[] value="+String(i)+"_12_"+String(arr[i].cin)+"_"+jeudi_chaine+"_"+but2+"_"+but3+"> <input type=checkbox name=ch[] value="+String(i)+"_13_"+String(arr[i].cin)+"_"+jeudi_chaine+"_"+but2+"_"+but3+"></td>"+
      "<td><input type=checkbox name=ch[] value="+String(i)+"_14_"+String(arr[i].cin)+"_"+jeudi_chaine+"_"+but2+"_"+but3+"> <input type=checkbox name=ch[] value="+String(i)+"_15_"+String(arr[i].cin)+"_"+jeudi_chaine+"_"+but2+"_"+but3+"></td>"+
      "<td><input type=checkbox name=ch[] value="+String(i)+"_16_"+String(arr[i].cin)+"_"+vendredi_chaine+"_"+but2+"_"+but3+"> <input type=checkbox name=ch[] value="+String(i)+"_17_"+String(arr[i].cin)+"_"+vendredi_chaine+"_"+but2+"_"+but3+"></td>"+
      "<td><input type=checkbox name=ch[] value="+String(i)+"_18_"+String(arr[i].cin)+"_"+vendredi_chaine+"_"+but2+"_"+but3+"> <input type=checkbox name=ch[] value="+String(i)+"_19_"+String(arr[i].cin)+"_"+vendredi_chaine+"_"+but2+"_"+but3+"></td>"+
      "<td><input type=checkbox name=ch[] value="+String(i)+"_20_"+String(arr[i].cin)+"_"+samedi_chaine+"_"+but2+"_"+but3+"> <input type=checkbox name=ch[] value="+String(i)+"_21_"+String(arr[i].cin)+"_"+samedi_chaine+"_"+but2+"_"+but3+"></td>"+
      "<td><input type=checkbox name=ch[] value="+String(i)+"_22_"+String(arr[i].cin)+"_"+samedi_chaine+"_"+but2+"_"+but3+"> <input type=checkbox name=ch[] value="+String(i)+"_23_"+String(arr[i].cin)+"_"+samedi_chaine+"_"+but2+"_"+but3+"></td>"
		
    }
  

  

		document.getElementById("demo3").innerHTML=out;
    
  var weekControl = document.querySelector('#machin\\:bidule');

  
  





  

//Remplissage de la table par des dates des jours de la semaine choisie
  document.getElementById("lundi").innerHTML=lundi_chaine;
  document.getElementById("mardi").innerHTML=mardi_chaine;
  document.getElementById("mercredi").innerHTML=mercredi_chaine;
  document.getElementById("jeudi").innerHTML=jeudi_chaine;
  document.getElementById("vendredi").innerHTML=vendredi_chaine;
  document.getElementById("samedi").innerHTML=samedi_chaine;

       }
       else document.getElementById("demo3").innerHTML="Aucun etudiant!";

    }
    
}


  
    </script>

