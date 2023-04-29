<?php
try {
    $bdd = new PDO('mysql:host=localhost; dbname=mytholdi; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  
  } catch (Exception $e) {
    echo "Erreur:" . $e;
  }
// Gérer la suppression 
if (isset($_POST['supprimer'])) {
  $codeReservation = $_POST['codeReservation'];
  $requeteSuppression = $bdd->prepare("DELETE r, rv, mtr FROM reservationn r 
  JOIN reserverr rv ON r.codeReservation = rv.codeReservation 
  JOIN montanttotalreservation mtr ON r.codeClient = mtr.codeClient AND r.codeReservation = mtr.codeReservation
  WHERE r.codeReservation = ?;");
  $requeteSuppression->execute([$codeReservation]);
  // Rafraîchir la page pour afficher la nouvelle liste des réservations
  header("Location: ../profil.php#listeReservation");
}

    
    ?>