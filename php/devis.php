<?php
try {
  $bdd = new PDO('mysql:host=localhost; dbname=mytholdi; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
  echo "Erreur:" . $e;
}

session_start();
if (!isset($_SESSION['login'])) {
  echo "<div id='popup'><div class='popup-content'>Vous n'êtes pas connecté(e). Vous allez être redirigé(e).</div></div>";
  header("refresh:5;url=../connexion.php");
  exit();
} else {
  $codeP = $_SESSION['login'];
}
if (isset($_POST['devis'])) {

$codeReservation = $_POST['codeReservation'];


$sql = "SELECT codeReservation, dateDebutReservation, dateFinReservation FROM reservationn WHERE codeClient ='$codeP' ";
$result = $bdd->query($sql);

if ($result->rowCount() > 0) {
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $date1 = new DateTime($row["dateDebutReservation"]);
    $date2 = new DateTime($row["dateFinReservation"]);
    $interval = $date1->diff($date2);
    $nb_jours = $interval->format('%a');
    
  }
}

$sql = "SELECT typeContainer FROM reserverr WHERE codeReservation ='$codeReservation' ";
$result = $bdd->query($sql);
if ($result->rowCount() > 0) {
  $row = $result->fetch(PDO::FETCH_ASSOC);
  $typeContainerReserver = $row['typeContainer'];
  
}
$typeContainerTarif=0;
$typeContainerNom="";
$sql = "SELECT tarifJour,libelleTypeContainer FROM typecontainer WHERE typeContainer = '$typeContainerReserver' ";
$result = $bdd->query($sql);
if ($result->rowCount() > 0) {
  $row = $result->fetch(PDO::FETCH_ASSOC);
  $typeContainerTarif = $row['tarifJour'];
  $typeContainerNom =$row['libelleTypeContainer'];
}

$prixTotal = $typeContainerTarif * $nb_jours;
echo " <div class='devis'>
<h1> Devis</h1>
<p>Reservation N° $codeReservation</p>

<p>Code Client : $codeP </p>
<p> Conteneur réservé : $typeContainerNom </p>
<p> Tarif Journalier du conteneur: $typeContainerTarif </p>
<p> Durée de la Réservation : $nb_jours Jours
<p>Prix total: $prixTotal euros.</p></div>

";
}
// if (isset($prixTotal) && !empty($prixTotal)) {

// $bdd->query("INSERT INTO montanttotalreservation (codeReservation,codeClient,unMontantTotalReservation) VALUES ('$codeReservation','$codeP','$prixTotal')");
// }      
// 
?>

<meta charset="utf-8">
  <title>Devis | Tholdi </title>
  <link rel="stylesheet" href="../css/devis.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class="btn-retour">
<a href="../profil.php#listeReservation">Retour</a>
</div>

