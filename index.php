<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="<h1 style=color:#1A237E;> Bonjour et bienvenue  ".
      $_SESSION["prenomNom"].
      " 
      dans votre espace personnel<br/></h1>";
   else
      $bienvenue="<h1 style=color:#1A237E; > Bonsoir et bienvenue ".
    $_SESSION["prenomNom"].
      " <h1 style=color:#1A237E;> dans votre espace personnel </h1><br/>";
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Walid SAAD">
    <meta name="generator" content="Hugo 0.88.1">
    <title>HOME</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/bundles/mdwebfront/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bundles/mdwebfront/css/slick.css">
    <link rel="stylesheet"  href="/bundles/mdwebfront/css/slick-theme.css">
    <link rel="stylesheet"  href="/bundles/mdwebfront/css/calendrier.css">
    <link rel="stylesheet" href="/bundles/mdwebfront/css/style.css">
    <script src="/bundles/mdwebfront/js/jquery.min.js"></script>
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

.centrer {
  display: block;
  margin-left: auto;
  margin-right: auto;
}

</style>
  </head>
  <body onLoad="document.fo.login.focus()" >
    
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
  <!-- Main jumbotron for a primary marketing message or call to action -->
 
  <div class="jumbotron"style="background-image: url(https://media-exp1.licdn.com/dms/image/C4D1BAQEFQog4AGcUcg/company-background_10000/0/1573296716492?e=2147483647&v=beta&t=Z13WlGC0ILixJmHU1n1mYiYRssRjX8FdIEfksO7ib2o); background-size: 100%;">
    <div class="container">
    <br/><br/>
      
    <br/><br/> <br/><br/>
      <p><a class="btn b btn-lg"style="background-color:#FFFFFF; color : #1A237E"  href="mesgroupes.php" role="button">Mes Groupes &raquo;</a></p>
      <p><a class="btn b btn-lg"style="background-color:#FFFFFF; color : #1A237E"  href="calendrier.php" role="button">calendrier &raquo;</a></p> <br/><br/> <br/><br/>
    </div>
  </div>

  <div class="jumbotron">
    <div class="container">
    <br/>
      <h1 > <?php echo $bienvenue?></h1>
      
     
    </div>
  </div>









  <div class="container" >
    <h1 style="color:#1A237E;">Nos partenaires</h1>
    <hr/>
    <a href="http://www.uvt.rnu.tn" target="_blank"><img class="lazy"
                            src="https://www.uvt.rnu.tn/documents/charte-graphique/1.jpg" alt="UVT" height="200"
                                title="UVT"></a>
           <a href="http://www.ibm.com/tn-fr"target="_blank">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/f/fc/IBM_logo_in.jpg"  height="200" alt="IBM">
                           
         
   <a href="http://www.sofrecom.com/fr"target="_blank" ><img class="lazy"
                            src="https://www.tustex.com/sites/default/files//styles/large/public/field/image/sofrecom-1.jpg?itok=v5H3NOnd" height="200" alt="SOFRECOM TUNISIE"
                                title="SOFRECOM TUNISIE"></a>
          
                               
                <a href="http://www.focus-corporation.com/fr" target="_blank"><img 
                            src="https://ste.tn/fr/wp-content/uploads/2017/09/FOCUS-604x222.jpg"  height="100" alt="FOCUS GROUP"
                                title="FOCUS GROUP"></a>

          
                <a href="http://www.linedata.com" target="_blank"><img class="lazy"
                            src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Linedata_Logo.jpg"height="150"  alt="Linedata"
                                title="Linedata"></a>
          

                          
                <a class="container"href="http://www.poste.tn/" target="_blank"><img 
                            src="http://www.poste.tn/upload/telechargement/fr/laposte.jpg" height="200"  alt="LA POSTE"
                                title="LA POSTE"></a>


              <a href="http://www.cpg.com.tn" target="_blank"><img 
                            src="data:image/png;base64,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"  alt="PHOSPHATE GAFSA"
                                title="PHOSPHATE GAFSA"></a>


               <a href="http://www.steg.com.tn" target="_blank"><img 
                            src="https://www.tustex.com/sites/default/files//styles/large/public/field/image/steg.jpg?itok=sB87y7wp" height="200" alt="STEG"
                                title="STEG"></a>
          

                <a href="http://www.microsoft.com/fr-tn" target="_blank"><img height="100"
                            src="data:image/png;base64,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" alt="MICROSOFT">
          

                <a href="http://www.zodiacaerospace.com/" target="_blank"><img height="100"
                            src="data:image/jpeg;base64,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" alt="ZODIAC AEROSPACE"
                                title="ZODIAC AEROSPACE"></a>
          
</div>
<hr/>

<div class="container" >
    <h1 style="color:#1A237E;">Nos Clubs</h1>

<div id="carouselControls"  class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" >
    <div class="carousel-item active" >
   



      <img class="centrer" width="50%"src="https://enicarthagepress.tn/wp-content/uploads/2020/09/melkart-370x250.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="centrer" width="50%" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIbaPgkUVXZWpDnGzHj29j_lJPwDUOyqiuAg&usqp=CAU" alt="Second slide">
    </div>
   
    <div class="carousel-item">
      <img  class="centrer" width="50%" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAmVBMVEX///8AYpsAYJoAXZgAW5cAXpkAWZfZ5u96qMgjcab2+v1Ti7XQ3ehjmLwAY5s5grAyfq92osPl7vQAVZQAaaDT4+4rdqlsncAVbaTr8/ddlbuXts6z0OGiutDF1+STscthjbSlxdsAUZKavtW50uKMs82ry92hw9iMttBHibNwn8KBpcOBrcoATpFCfqs3grFUha9FjriJqcbq1SFqAAAMwklEQVR4nO2cDXeiOhPHQwiJhPJieFHQ0lYQxbXudr//h3sS3kRF1O599rR75r/n9uxqCPkxk5lJQi9CIBAIBAKBQCAQCAQCgUAgEAgEAoFAIBAIBAKBQCAQCAQCgUAgEAgEAoFAIBAIBAKBQCAQCAQCgUAgEAgE+j+JZ7PlXQ23c7PTT1Z9tPdKd0Slm/CqHfPGmkl5b/U99pF3Q/xxwr1BnOKehhOCW+nzipD/osaoiFkP6Mkfb2fQRX2PhOJRGav4YcCMahp2wnsIda0VNmtC6/jRoHDUENLxdhppCG1yo6H/MGFoYnUD6w7jf09CEdVj1Pf/KuGs6RE7+b9JuNZxN+b0XyTMHdxdil3xh4QDoa+LpXS8HaZDhEMNHyN8Mo1efzS5cfENwmAgeUXlAGE0IPPtkjAYbPgIoXAbCzpO/cQm4wF1nFBPYnGpZjx9wiAfaCf4BSGZDrW75Wh9xda5z5P9KOItwpFL+4SjubdPuHsAZkh8VlnQ6RHiIBtD/MuEdPoprk58SnDrn8eBO5sRxG9GuNaGhKPiOuL3ItzqxzxxghhcR/xWhFkwDKhpRlRci8f/EWHwNwg3GJ/GmD7i/Bri37bh5A8A59csWCF6VxBv5kN2JsGGCGU+PG/Iuhv2s8Xsohlj961/xyxYIV5x1Jt16WWJ1SKeVm2X69+kHXm/prlcJ+v+XUv1yoLngFjvhR7D2wwh3iDEl47htw55o/Imr0OEA6Jvt/l4NjASTM3DIaDdF3i+GaiOHl9b3EuoD9pwQOQ2Id/LKOqcJ3ptx+I4tfzjJ1EWX7j8tyCMJwSfFzLyuk1Nbx/HgZ3txaz+DoSxPRREid30L6Jj/ziYnCN+A0KWtFPN0I8rQ+yo1X11iy3trYgNOzxF/PqErF0PEjKPAtIyEld2LxK1ckpPopDzcYp4i1C/0GqQcCBbDMZSfNmhvxkDzJttNY2YCxaHe6fpjFjyy927n7dbi90dSHmydzNOaEST6bnsNumcECazc9lZe48eIY7kF2dKnq7z8be2FCVR/WTTue50hJa/kg7AolOvw1Ef8UZNY6OL6Nt9cFLTPCF+ru6K06rtot1IScOnrQPW064yqo87wgIf5JhTrb9xo4Zt9hz/b1feD63xw6QbSh0542p85DhaplL88mKeY7ztypuvvHoqgt6Fyiq/TTVl9/V9STcLLnZu1MjLtrj8uoSx3dsWdaqIYviRtNmm6s7B84bhbXBZrEfZFydM3X4gc6gkFPP3Ujpf1kZTr7rpJjibhS0OmYmvTBh2BqyLNbpVd1yrEc5o/ZGjK4vmhgIcqMtlYlIp88tGmn3beVON6m4bOoRJ2gpVlwMuJCD2CfEH6pRV+h8SspGGn1nj5/TUKpi0B2nT3lpC2rCQXwWTt2IdkXM7YhreQXi5dJe6JHQKFl4qviAkyUCzcMgBtsFZGidr5XNi1ysfNEUY0EOVKsVZcYiJozz7VtXmmPNL/Rw4twgG5AydzAw1xENr8yfvzIr+RC2VVr1P5pJwqbczhLunJ0Bl/fknzp70obOnwUOqPzt7EpPG76pp5zh+ok4t6HGZiE1FSLtz4KI3cANvm1rpS58fbvrnaA615eCSC0JN+ijfTuVfxaG9Eda97nD4SxOi0NOPSWOYsIhUQKXvM3Vq045IL48bNl+bUIaPoxWvEcofb/TdPhJivO51+MUJEZ90yfyKl6pAE09/ybHHh2rkRpD1e/jqhIh3VdmRsNmUaiLNom2aOtg5Xx3K/EmJrv6oH907UToZkU7bWLoaayblv9T3SPzLhf3ptsHoKfdS7TQ53TyUM9KXMlpCMm/nXCKLHbnCP8uuxaxbvO/2ddO33cW6/lRNeBY3mk13TTzb3OpwOr6vH3rVqShNlINRTdeSTTGd620s9a3KMvGeqCn48ciR+ZcRK9V+qbJhXFIDVye+6YHUhLje4IgTNReI/S0B1fBlvKEqIUiPb+JIONcbQmclF8ZM7Yprs8ffAUSXGzX/Yeu7LxDSQjXhe9lesaCKMMfYUWc7bC6rrckNC8ZDb1Btxt/luBjJg14Sz26/mabE7JrQelcbGVyZis2ruhQ7NWGgB5PLU4tT7bWBD5ORNSsX506R+mPLqAEJ4553ROWt2G5VERJVpO1ctQNZBrUNtYZwP/h00yxb/G5GNaEDDZIf12+7D7yzN5FTMnSX8OX3yxUQod1HqHYWK0KV0pZ0pRauSVDZUM5QSRhG6ytnwJTS98Y7NxcL8H06RphSh3iI7XqukZLT26yr08+FzF9X9jnE6O7AieLiSPjeJ3QUIdteCTJrbLnetZvE76OEP8xl9oHWr72PUuO0iVnNsmdtllzZoXmAUO2W1l4a29UGeBk0sVR5Kb8WADI8Es44ZSOE/HWt7rp97X0WBqdtoprQkw+8HOzkEUKuCFfKK2KFI8w6WzjVPLxKsWgeeriI6y42ckzsRQ0sLmJJaP+OF3IQvFh0XsCzyq3jQ5WZeoS8mAZNF/LrdYh4S8ir/1Ah0HIhqi7UF2wRioCFi/uTmCTsskVG6pqmtuENwl0Z+ROUmvJvlKZh4OOUu25Z6kG+syI/itHU9221NxnMM5l1/bQjzAPHE/JWKuZalGqqDCVvaG95vsknJHhuCV008Uy29/2SF67l6wyxyA+Yuau2J+7V/l1vziSY2WZ8jY795sVCVz8/qBl4cWYgZkRRns5tZ819YrmGX0xoEGk5L0s3EsKRhcOGkb1nq4f2qk4IC0KwcKQ32yh/9yyMQn16+IlsOveM1Carl4ZwlyCXBnHiWgZ7po7nZ2jvu3MWEc+J7k+54pXg6jQu9NqqDRs/xpwgMwSTBjDjpSaWGto4QqhXZqZ2TMo0JW98FjAmDZHKKinM5mKX8L1VLzvRD7VFEk8P0tUE2s2Q7cVPhvLa1BEzU172xsy1avgcscLIZex74ymPg/zZyeNoh+RzCplpoy19oNYSri+7QrEnFxI1IbVGE32mO5onpAEEFamGps2xZmbF/kZGGoHsKeKuWoJxM51NUXFA7gaFpooPKVVhOnuV2Vag2Ywf9iqW2nskonD2Q3rxAtXbJc/E0WUyS2ZV3+5SeiyaJXFQqEjzJPt5pBCSVlfJwZDeGVV7baUYLf0UoRtPbEWTOqisVkZqosQ07GJpKV2NTZw0eUFpxM0lF/Mq1uyIk6JFSyiCpSTkvwouDulMdmS9tLGUBI5RoER5rFhrxbOMq+vX6jGpWMrwQ6XeUqueTLs+VIljlNAI0yfplIgTRVgFDz6hfqLiaEuoyMyVpgjzAzcP1qtWR9NShp+OkMmkLgkPh1dLy2f1ZQ1hFKaRWxEyz/crwpfXUJlAEQrtsWI2U4QmrgnzW7+OUMfSaWNDflCBqiBWYp0ScjeYBOm+ROuSm2qLs66XeeSoeVcR7pis2FIcHww5988IPbWfIhShpc2imjDJP0vIle2jhvDmpUdCUhGqOGV7fHNK+MxoIedhbvww92i+TvO8iQ0ZjVsb7p5oTbhVX9unhByl81D+m80X3PpTQqXOhjd1asPaS70Nagj9ljCPZKTJueV7AgU9v3jyWdbZ0GCVl1al6AVhOK+nseBlQ5j+VcKkH2nksM5tuHS5JETJm+zT7L1L+OSLipDJbMFk2FGRpqp07N/nNgyUDfOIt4THSPNpwugxGxKVLSYWl6mm6AifamM8Lz1FGGuqeCjVfomq8VJ14qwijZiHMhXEUSa9FM3k14Lb5/PwhxlXhHFLaMWBelPkk4Sxq2x4Tx7NjPV6IqpswSThxkjTQuatJtIEiVADTp7lui/XcqE5a7UcEWjCVI2YCy9Ci/lWssV4hiw3TIx4I0PqhM1mFaFnKZd+DtZ7XFYhOUhDXCibvljILeNNLj1DaI/vrvBSx/r6npbV+vBp8oH4e1pgJBziFwtq+JZYpYgnq8KWNYD1IuYG0WXtRlYZYg6uqon44BOSodzX0Izo1EaZTygRsaYHVNiyorN+o11dtfmU4lT9O/YMeYNnWei+/JK1DCG5TKLCeHBjQGlp4lu/8VQr837+9Nh6LR+KyD9kZetrLAywvY+9J1m1lOFWPqjJmxxqmcgSa6/L0n7tr6rFXqav1JsD9kRWpMFki/h8lbgxWhO/RNtFdVlYvYG19LxSTt7ZQlXOXpLmU442svRxV5H4kF768Zkdstt54opSeSG7XLPJglIOb4cWynphE01Z3r9KWrWu8cOxJJz3aOLlJ37F+f8q+wWF0Sc86vso+ecJZVxN78pB31ZL+maNvX/y/RVHlN63Rf1txfb3/b8oQCAQCAQCgUAgEAgEAoFAIBAIBAKBQCAQCAQCgUAgEAgEAoFAIBAIBAKBQCAQCAQCgUAgEAj01fQ/pU8ykg6QahQAAAAASUVORK5CYII=" alt="Third slide">
    </div>
      
    <div class="carousel-item">
      <img  class="centrer" width="50%" src="https://media-exp1.licdn.com/dms/image/C4E0BAQFn9Cb9q_3KnQ/company-logo_200_200/0/1647443852440?e=2147483647&v=beta&t=zkwNp7TY58lD6-w13_XnBqhcTbBEmvnXcGSyvHtqqFs" alt="Fourth  slide">
    </div>
  </div>
  <a class="carousel-control-prev"href="#carouselControls"style="background-color:#E3F2FD;"  role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next"href="#carouselExampleControls" style="background-color:#E3F2FD;" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


</div>

<br/><br/><br/>


<hr/>

<div class="container" >
    <h1 style="color:#1A237E;">Nos evenements les plus marquants</h1><br/>

<div id="carouselExampleControls"  class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" >
    <div class="carousel-item active" >
   



      <img class="centrer" width="50%"src="https://scontent.ftun10-1.fna.fbcdn.net/v/t1.6435-9/74717104_10217336273932898_1143775788361842688_n.jpg?_nc_cat=102&ccb=1-6&_nc_sid=b9115d&_nc_ohc=kterWr-zahwAX84XDbZ&_nc_ht=scontent.ftun10-1.fna&oh=00_AT-IDxA1H2jk3twJ6s4BY3O1nnormzT5P1j1lH0m1tBC2g&oe=629C0CCF" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="centrer" width="50%" src="https://scontent.ftun10-1.fna.fbcdn.net/v/t1.6435-9/117999234_336543091085633_6366831620715325774_n.jpg?_nc_cat=105&ccb=1-6&_nc_sid=825194&_nc_ohc=LxXI1hs4UgkAX-PdwZB&_nc_ht=scontent.ftun10-1.fna&oh=00_AT9X8j-Qh3OBoBaQ4qn1mZJho-GDHCU4BJmGlCerzwu_BQ&oe=629AB4AD" alt="First slide">
    </div>
   
    <div class="carousel-item">
      <img  class="centrer" width="50%" src="data:image/jpeg;base64,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" alt="Third slide">
    </div>
      
    <a class="carousel-control-prev"href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next"href="#carouselExampleControls"  role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
   
<br/>
<br/>
<br/>
<br/>
   
  </div>

</div>


</div>


<br/>
<br/>




<br/>
<br/>
</main>




<footer>

<div class="footer" >

    
    <div >

        <span class="contact">NOUS CONTACTER</span>
        <p><i class="fa fa-map-marker" aria-hidden="true"></i> 45 Rue des Entrepreneurs 2035 Charguia II Tunis- Carthage-Tunisie</p>
        <p><i class="fa fa-mobile" aria-hidden="true"></i>( +216 ) 71 940 699 /  ( +216 ) 71 940 775</p>
        <p><i class="fa fa-fax" aria-hidden="true"></i>( +216 ) 71 941 579</p>
        <p><i class="fa fa-envelope" aria-hidden="true"></i> enicarthage@enicarthage.rnu.tn</p>

    </div>


    <div class="col-xs-12 blockSociau">
        <a href="https://www.facebook.com/Ecole-Nationale-dIng%C3%A9nieurs-de-Carthage-ENICarthage-532762086862252/?ref=bookmarks" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/school/ecole-nationale-d%E2%80%99ing%C3%A9nieurs-de-carthage-enicarthage/" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
        <p class="copyright">Powered by <img id="logo" src="https://scontent.ftun10-1.fna.fbcdn.net/v/t1.15752-9/279710530_359168229523401_5953038433723217793_n.png?_nc_cat=110&ccb=1-6&_nc_sid=ae9488&_nc_ohc=eeuXjXKDlTQAX8ER6oB&_nc_ht=scontent.ftun10-1.fna&oh=03_AVJI4JvUX-oFo8DCt15vvynJwS-DazPWrrAWVrbFqidsMQ&oe=629C24D9"alt="logo" width=4%/></p>
    </div>

</div>


</footer>
<footer >
  <p>&copy; ENICAR 2021-2022</p>
</footer>
      
  </body>
</html>