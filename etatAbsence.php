<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher Absence</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/dist/css/jumbotron.css" rel="stylesheet">

</head>
<body onload=refresh()>
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
              <h1 class="display-4">État des absences pour un groupe</h1>
             
            </div>
          </div>

<div class="container">
<form>
<!--//     /!\/!\/!\/!\   PROBLEME DE COMPARAISON DE DATE :(   :'     /!\/!\/!\/!\-->
  <!--<table><tr><td>Date de début (j/m/a) : </td><td>
    <input type="date" name="debut" id="debut" size="10"  class="datepicker"/>
    </td></tr><tr><td>Date de fin : </td><td>
    <input type="date" name="fin" id="fin" size="10"  class="datepicker"/>
    </td></tr></table>-->

<div class="form-group">
<label for="classe">Choisir une classe:</label><br>
<div id="demo1"></div>
</div>

<div class="form-group">
  <label for="module">Choisir un module:</label><br>
  <div id="demo2"></div>
  </div>
<div id="demo3"></div>
<div class="table-responsive"> 
  
  </div>

</form>
</div>  
</main>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>













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
  var classe_choisie=document.getElementById("select1") ;
  console.log(classe_choisie.value);
  //alert(classe_choisie.value);

  var module_choisie=document.getElementById("select2") ;
  console.log(module_choisie.value);

  


var but1 = classe_choisie.value;
var but2 = module_choisie.value;
/*var debut=document.getElementById("debut");
              var fin=document.getElementById("fin");
              var d=debut.value;
              var f=debut.value;*/
        var xmlhttp1 = new XMLHttpRequest();
        var url = "http://localhost/mini-projet-info1_enicar/afficherAbsence.php?but="+but1+"_"+but2;
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
        //alert(obj.etudiant);

        if (obj.success==1)
        {
		var arr=obj.etudiant;
		var i;
		var out="<table class='table table-striped table-hover'>"+
  "<thead>"+
  "<tr class=gt_firstrow ><th>Nom</th><th>prenom</th><th>Justifiées</th><th >Non justifiées</th><th >Total</th></tr>"+
  "</thead>"+"<tbody>";
  
  for ( i = 0; i < arr.length; i++) {

  out+="<tr><td>"+arr[i].prenom+"</td><td>"+arr[i].nom+"</td><td >"+arr[i].nb_absence_justifie+"</td><td >"+arr[i].nb_absence_non_justifie+"</td><td >"+arr[i].nb_absence+"</td></tr>"
};


  out+="</tbody>"+
 "<tfoot>"+
  "</tfoot>"+
  "</table>";



//la Classe choisie
var e2 = document.getElementById("select1");
              var but2 = e2.value;
//le module choisie
var e3 = document.getElementById("select2");
              var but3 = e3.value;
              var weekControl = document.querySelector('#machin\\:bidule');

  
/*
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
		
    }*/
  

  

		document.getElementById("demo3").innerHTML=out;
       }
       else document.getElementById("demo3").innerHTML="Aucun etudiant!";

    }
    
}


  
    </script>