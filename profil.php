<?php

session_start();
if (!isset($_SESSION['login'])) {
  echo "<div id='popup'><div class='popup-content'>Vous n'êtes pas connecté(e). Vous allez être redirigé(e).</div></div>";
  header("refresh:5;url=connexion.php");
  exit(); // Ajoutez cette ligne pour éviter d'exécuter le reste du code si l'utilisateur n'est pas connecté
} else {
  // Utiliser la variable de session "codeP" pour effectuer des opérations avec le code de l'utilisateur
  $codeP = $_SESSION['login'];
  // Afficher le code  de l'utilisateur
  /*echo "Le code client de l'utilisateur est : " . $codeP;*/
}
// fonctions pour sécuriser le formulaire 
function Securise($string)
{
  // on regarde si le type de string est un type entier
  if (ctype_digit($string)) {
    $string = intval($string);
  } else {
    // pour tout les autres types 
    $string = strip_tags($string);
    $string = addslashes($string);

  }
  return $string;
}

// connexion à la base de donnée

try {
  $bdd = new PDO('mysql:host=localhost; dbname=mytholdi; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

} catch (Exception $e) {
  echo "Erreur:" . $e;
}
/*
// Récupération des villes dans la table ville
$query = $bdd->query("SELECT * FROM ville");
$villes = $query->fetchAll(PDO::FETCH_ASSOC);
// récuperation des conteneurs dans la table typecontainer
$requetes = $bdd->query("SELECT * FROM typecontainer");
$conteneurs = $requetes->fetchAll(PDO::FETCH_ASSOC);
*/
// recupération des saisies dans le formulaire de reservation 

if (isset($_POST['reservation'])) {
  $dateDebutReservation = Securise($_POST['dateDebutReservation']);
  $dateFinReservation = Securise($_POST['dateFinReservation']);
  $dateDeReservation = date('Y/m/d');
  $villeDepart = Securise($_POST['villeDepart']);
  $villeArrivee = Securise($_POST['villeArrivee']);
  $typeContainer = Securise($_POST['typeContainer']);
  $volumeEstime = Securise($_POST['volumeEstime']);
  $qteReserver = Securise($_POST['qteReserver']);

  if (!empty($dateDebutReservation) && !empty($dateFinReservation) && !empty($villeDepart) && !empty($villeArrivee) && !empty($typeContainer) && !empty($volumeEstime) && !empty($qteReserver)) {
    /*
    $requete = "SELECT codeVille FROM ville WHERE nomVille ='$villeDepart'";
    $resultat = $bdd->query($requete);
    if ($resultat) {
    $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
    $villeDepart = $ligne['codeVille'];
    $requete = "SELECT codeVille FROM ville WHERE nomVille ='$villeArrivee'";
    $resultat = $bdd->query($requete);
    if ($resultat) {
    $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
    $villeArrivee = $ligne['codeVille']; 
    $requete = "SELECT typeContainer FROM typecontainer WHERE libelleTypeContainer ='$typeContainer'";
    $resultat = $bdd->query($requete);
    if ($resultat) {
    $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
    $typeContainer = $ligne['typeContainer'];
    */
    $bdd->query("INSERT INTO `reservationn` (`dateDebutReservation`, `dateFinReservation`, `dateReservation`, `volumeEstime`, `codeVilleMiseDispo`, `codeVilleRendre`, `codeClient`) VALUES ('$dateDebutReservation', '$dateFinReservation', '$dateDeReservation', '$volumeEstime', '$villeDepart', '$villeArrivee', '$codeP')");

    $id_reservationn = $bdd->lastInsertId();

    $bdd->query("INSERT INTO `reserverr` (`codeReservation`,`typeContainer`, `qteReserver`) VALUES ('$id_reservationn','$typeContainer', '$qteReserver')");
      header("refresh:5;url=profil.php#listeReservation");
    echo "<p class ='sucess-reserv'>Réservation Enregistrée, patientez ... </p>";
    // echo "le code ville est" .$codeVille;
  }
}
/*}
} 
 }*/
// echo "<p class ='erreur-reserv'>erreur</p>";

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Mon profil | Tholdi </title>
  <link rel="stylesheet" href="./css/profil.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <header>
    <section class="bande-couleur">
      <article class="orange">
      </article>
      <article class="vert">
      </article>
      <article class="blue">
      </article>
      <article class="vert2">
      </article>
    </section>
    <section class="user-navbar">
      <article class="logo">
        <img src="./img/tholdi_logo-removebg-preview.png" height="110px" alt="">
      </article>
      <section class="user-navbar1">
        <ul>
          <!-- <li><a href="index.php">Accueil</a></li> -->
          <li href="#">Nos Tarifs</li>
          <li href="#">Contacter-nous</li>
        </ul>
        <!-- <article>
          <img src="./img/turkey.png " height="25px" alt="usa-flag-for-english" class="usa-flag">
        </article>
        <article>
          <img src="./img/moon.png " height="20px" alt="" class="moon">
        </article> -->
        <div class="dropdown">
          <article class="dropbtn" onclick="dropdownMenu()">
            <img src="./img/profile-user (2).png" height="30px" alt="user" onclick="dropdownMenu()">
            <img src="./img/down-arrow (1).png " height="20px" alt="" onclick="dropdownMenu()">
          </article>
          <div id="myDropdown" class="dropdown-content">
            <img src="./img/user.png" height="20px" alt="user"><a href="./php/monProfil.php"> Mon Profil</a>
            <!-- <img src="./img/speech-bubble.png" height="20px" alt="user"><a href="#">Messages</a> -->
            <img src="./img/log-out.png" height="20px" alt="user"><a href="./php/deconnexion.php">Déconnexion</a>
          </div>
        </div>
      </section>
    </section>
  </header>
  <main>

    <section class="main-dashbord">

      <article class="left-side">
        <?php
        $requete = "SELECT loginn FROM personne WHERE codeP ='$codeP'";
        $resultat = $bdd->query($requete);
        if ($resultat) {
          $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
          $contact = $ligne['loginn'];
          ?>
          <h1>Salut 
            <?php echo ("$contact");
        } ?>
        </h1>
        <ul>
          <li><a href="#reservation" class="reservationn"><img src="./img/cancel.png" height="20px" alt="Réserver">
              Effectuer une
              réservation</a></li>
          <li><a href="#listeReservation" id="t"><img src="./img/to-do-list.png" height="20px" alt="mes réservations">
              Liste de
              vos réservations</a></li>

              <li><a href="#statistiques" id="t"><img src="./img/to-do-list.png" height="20px" alt="mes réservations"> Statistiques de vos Réservation </a></li>
        </ul>
        <p class="rights">Tholdi 2023 - © Tous droits réservés</p>
      </article>

      <article class="right-side">


        <?php if (isset($return)) { ?>
          <div class="alert-form">
            <p>
              <?php echo $return; ?> !
            </p>
          </div>
        <?php } ?>
        <form method="POST" id="reservation" class="reservation">
          <section class="dates">
            <article>
              <label for="dateDebutReservation">Date Début Réservation</label> <br>
              <input type="date" name="dateDebutReservation" id="dateDebutReservation" onchange="checkDate()" required>
            </article>
            <article>
              <label for="dateFinReservation"> Date Fin de Réservation</label> <br>
              <input type="date" name="dateFinReservation" id="dateFinReservation" onchange="comparerDate()" required>
            </article>
          </section>
          <section class="dates">

            <article>
              <label for="villeDepart">Ville de départ</label>
              <select name="villeDepart" id="villeDepart"onchange="comparerVille()" required>
                <option value="">choisir la ville de départ</option>
                <option value="01">Le Havre</option>
                <option value="02">Marseille</option>
                <option value="03">Gennevilliers</option>
                <option value="04">Anvers</option>
                <option value="05">Barcelone</option>
                <option value="06">Hambourg</option>
                <option value="07">Rotterdam</option>
              </select>
              </select>
            </article>
            <article>
              <label for="villeArrivee">Ville d'arrivée</label>
              <select name="villeArrivee" id="villeArrivee" onchange="comparerVille()"required>
                <option value="">choisir la ville d'arrivée</option>
                <option value="01">Le Havre</option>
                <option value="02">Marseille</option>
                <option value="03">Gennevilliers</option>
                <option value="04">Anvers</option>
                <option value="05">Barcelone</option>
                <option value="06">Hambourg</option>
                <option value="07">Rotterdam</option>
              </select>
            </article>
          </section>
          <section class="dates">
            <article>
              <label for="typeContainer">Type de Conteneur</label>
              <select name="typeContainer" id="typeContainer" required>
                <option value="">Choisir le type de conteneur </option>
                <option value="FLAT">Flatracks</option>
                <option value="OTOP">Open Top 20</option>
                <option value="RE20">Reefer 20</option>
                <option value="REF">Refer 40</option>
              </select>
            </article>
            <article>
              <label for="quantiteCont">Quantité</label>
              <input type="number" name="qteReserver">
            </article>
          </section>
          <section class="submit-btn">
            <input type="number" name="volumeEstime" id="volumeEstime" placeholder="Volume estimé" required>
            <input type="submit" value="Valider" name="reservation">
          </section>

          <?php if (isset($success)) { ?>
            <div class="success-form">
              <p>
                <?php echo $success; ?>
              </p>
            </div>
          <?php } ?>
        </form>

        <span>
          <div id="listeReservation" class="listeReservation">
            <?php
            // Afficher le contenu de la table reservation
            $requete = $bdd->query("SELECT * FROM reservationn WHERE codeClient = '$codeP' ORDER BY dateReservation DESC");
            $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
            echo "<table>";
            echo "<tr>
            <th class='libelleList'>N° Réservation</th>
            <th>Début réservation</th>
            <th class='libelleList'>Fin réservation</th>
            <th>Date de Réservation</th>
            <th class='libelleList'>Ville Départ</th>
            <th>Ville Arrivée</th>
            <th class='libelleList'>Volume Estimé </th>
           <th colspan='2'>Options</td>
          </tr>";
            $requeteVilles = $bdd->query("SELECT codeVille, nomVille FROM ville");
            $villes = $requeteVilles->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultat as $row) {

              $villeMiseDispo="";
              $villeRendre="";
              foreach ($villes as $ville) {
                if ($ville['codeVille'] == $row['codeVilleMiseDispo']) {
                  $villeMiseDispo = $ville['nomVille'];
                }
                if ($ville['codeVille'] == $row['codeVilleRendre']) {
                  $villeRendre = $ville['nomVille'];
                } }
              echo "<tr>
                <td>{$row['codeReservation']}</td>
                <td>{$row['dateDebutReservation']}</td>
                <td>{$row['dateFinReservation']}</td>
                <td>{$row['dateReservation']}</td>
                <td>{$villeMiseDispo}</td>
                <td>{$villeRendre}</td>
                <td>{$row['volumeEstime']}<span>Kg</span></td> 
                <td>
                    <form method='POST' action='./php/devis.php'>
                        <input type='hidden' name='codeReservation' value='{$row['codeReservation']}'>
                        <input type='submit' class ='modifier' name='devis' value='Devis'>         
                    </form>
                </td>
                <td>
                    <form method='POST' action='./php/supprimerReservation.php'>
                        <input type='hidden' name='codeReservation' value='{$row['codeReservation']}'>
                        <input type='submit' class='supprimer' name='supprimer' value='Supprimer'>
                    </form>
                </td>
            </tr>";
            }
            echo "</table>";
            ?>            
          </div>
        </span>


        <div id="statistiques">
           <?php
          
           $sql = "SELECT COUNT(*) FROM reservationn WHERE codeClient ='$codeP' ";
           $result = $bdd->query($sql);
           if ($result->rowCount() > 0) {
               $row = $result->fetch(PDO::FETCH_ASSOC);
               echo "Nombre de réservations effectuées  : ".$row['COUNT(*)'];
           }
          //  $sql = "SELECT codeReservation FROM montanttotalreservation WHERE codeClient = '$codeP'";
          //  $result = $bdd->query($sql);
           
          //  $totalMontantReservations = 0;
           
          //  if ($result->rowCount() > 0) {
          //    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          //      $codeReservation = $row['codeReservation'];
           
          //      $sql2 = "SELECT unMontantTotalReservation FROM montanttotalreservation WHERE codeClient = '$codeP' AND codeReservation = '$codeReservation'";
          //      $result2 = $bdd->query($sql2);
          //      $row2 = $result2->fetch(PDO::FETCH_ASSOC);
           
          //      $montantTotal = $row2['unMontantTotalReservation'];
           
          //      $totalMontantReservations += $montantTotal;
          //    }
          //  }
           
          //  echo " <br><br> Montant total de toutes les réservations :" .$totalMontantReservations. "€";
           
// Recalculer le montant total de toutes les réservations restantes du client
// $sql = "SELECT SUM(unMontantTotalReservation) as total FROM montanttotalreservation WHERE codeClient = '$codeP'";
// $result = $bdd->query($sql);

// if ($result->rowCount() > 0) {
//   $row = $result->fetch(PDO::FETCH_ASSOC);
//   $montantToutReserv = $row['total'];
// } else {
//   $montantToutReserv = 0;
// }

// Mettre à jour le montant total dans la base de données
// $bdd->query("UPDATE  SET montantTotalReservations = '$montantToutReserv' WHERE codeClient = '$codeP'");

?>

<p></p></div>

       
        </div>

      </article>
    </section>
  </main>
</body>

</html>

<script>
  /* When the user clicks on the button,
  toggle between hiding and showing the dropdown content */
  function dropdownMenu() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {

      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
</script>
<script>



  function checkDate() {
    var selectedDate = new Date(document.getElementById("dateDebutReservation").value);
    var today = new Date();
    var calendarDates = document.querySelectorAll(".calendar td");

    if (selectedDate < today) {
      // Affiche un message d'erreur lorsque la date selectionnée est passé 
      alert("la date selectionnée est passé, selectionner une date ultérieure svp");
    }
    for (var i = 0; i < calendarDates.length; i++) {
      var calendarDate = calendarDates[i];
      var dateValue = new Date(calendarDate.getAttribute("data-value"));
      if (dateValue < today) {
        // Ajoute la classe past-date aux jours dépassés
        calendarDate.classList.add("past-date");
      }
    }

  }

  function comparerDate() {
    var dateDebut = new Date(document.getElementById("dateDebutReservation").value);
    var dateFin = new Date(document.getElementById("dateFinReservation").value);

    if (dateFin <= dateDebut) {
      alert("La date de fin de réservation doit être postérieure à la date de début de réservation.");
    }
  }

  function comparerVille() {
  var villeDepart = document.getElementById("villeDepart").value;
  var villeArrivee = document.getElementById("villeArrivee").value;

  if (villeDepart === villeArrivee) {
    console.log("La ville de départ et d'arrivée sont identiques !");
    // alert("La ville de départ et d'arrivée sont identiques !");
  }
}

</script>