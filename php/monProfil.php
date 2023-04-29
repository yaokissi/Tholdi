<?php

session_start();
if (!isset($_SESSION['login'])) {
  echo "<div id='popup'><div class='popup-content'>Vous n'êtes pas connecté(e). Vous allez être redirigé(e).</div></div>";
  header("refresh:5;url=connexion.php");
  exit(); // éviter d'exécuter le reste du code si l'utilisateur n'est pas connecté
} else {
  // Utilisation de la variable de session "codeP" pour effectuer des opérations avec le code de l'utilisateur
  $codeP = $_SESSION['login'];
  // Afficher le code  de l'utilisateur
  /*echo "Le code client de l'utilisateur est : " . $codeP;*/
}
try {
    $bdd = new PDO('mysql:host=localhost; dbname=mytholdi; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  
  } catch (Exception $e) {
    echo "Erreur:" . $e;
  }


  $sql = "SELECT * FROM personne WHERE codeP ='$codeP' ";
  $result = $bdd->query($sql);
  if ($result->rowCount() > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $codeP = $row['codeP'];
    $raisonSociale = $row['raisonSociale'];
    $adresse = $row['adresse'];
    $cp = $row['cp'];
    $adrMel = $row['adrMel'];
    $telephone = $row['telephone'];
    $contact = $row['contact'];
  }
?>

<meta charset="utf-8">
  <title>Devis | Tholdi </title>
  <link rel="stylesheet" href="../css/monProfil.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class="monProfil">

<h1>Mon Profil</h1>
<center>
<img src="../img/profile-user.png" height="70px" alt="user" onclick="dropdownMenu()">
</center>

<p>Code Client : <br> <?php echo" $codeP"; ?> </p>
<p> Raison Sociale : <br><?php echo "$raisonSociale"; ?></p>
<p> Adresse: <br><?php echo" $adresse"; ?> </p>
<p> Code Postal : <br><?php echo" $cp"; ?> </p>
<p>Adresse Mail : <br><?php echo" $adrMel"; ?></p>
<p>Téléphone: <br><?php echo" $telephone"; ?></p>
<p>Votre Contact :<br><?php echo" $contact"; ?></p>

<div class="btn-retour">
<a href="../profil.php#listeReservation">Retour</a>
</div>
</div>