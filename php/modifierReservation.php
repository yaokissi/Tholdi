<?php
session_start();
if (!isset($_SESSION['login'])) {
  echo "<div id='popup'><div class='popup-content'>Vous n'êtes pas connecté(e). Vous allez être redirigé(e).</div></div>";
  header("refresh:5;url=connexion.php");
  exit(); 
} 
else 
{
  $codeP = $_SESSION['login'];
}

function Securise($string)
{
  if (ctype_digit($string)) {
    $string = intval($string);
  } else {
    $string = strip_tags($string);
    $string = addslashes($string);

  }
  return $string;
}

try {
  $bdd = new PDO('mysql:host=localhost; dbname=mytholdi; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
  echo "Erreur:" . $e;
}

if (isset($_POST['modifier'])) {
  $donnees ="";
  $codeReservation = Securise($_POST['codeReservation']);
  $requete3 = "SELECT * FROM reservationn r 
               JOIN reserverr rv ON r.codeReservation = rv.codeReservation 
               WHERE r.codeReservation = '$codeReservation'";
  $resultat = $bdd->query($requete3);
  $donnees = $resultat->fetch(PDO::FETCH_ASSOC);
 
}
    
if (isset($_POST['valider'])) {
    $codeReservation = Securise($_POST['codeReservation']);
    $dateDebutReservation = Securise($_POST['dateDebutReservation']);
    $dateFinReservation = Securise($_POST['dateFinReservation']);
    $villeDepart = Securise($_POST['villeDepart']);
    $villeArrivee = Securise($_POST['villeArrivee']);
    $typeContainer = Securise($_POST['typeContainer']);
    $volumeEstime = Securise($_POST['volumeEstime']);
    $qteReserver = Securise($_POST['qteReserver']);
  
  
      $requete = "UPDATE reservationn 
                  SET dateDebutReservation = '$dateDebutReservation', 
                      dateFinReservation = '$dateFinReservation', 
                      volumeEstime = '$volumeEstime', 
                      codeVilleMiseDispo = '$villeDepart', 
                      codeVilleRendre = '$villeArrivee' 
                  WHERE codeReservation = '$codeReservation'";
      $bdd->query($requete);
  
      $requete2 = "UPDATE reserverr 
                   SET typeContainer = '$typeContainer', 
                       qteReserver = '$qteReserver' 
                   WHERE codeReservation = '$codeReservation'";
      $bdd->query($requete2);
  
      echo "<p class ='sucess-reserv'>Modification enregistrée</p>";
    }
  




?>

<form method="POST" id="reservation" class="reservation">
  <section class="dates">
    <article>
      <label for="codeReservation">Modifier la reservation N ° <?php echo htmlspecialchars($donnees['codeReservation']); ?>:</label> <br>
    </article>
    <article>
      <label for="dateDebutReservation">Date Début Réservation :</label> <br>
      <input type="date" name="dateDebutReservation" id="dateDebutReservation" value="<?php echo htmlspecialchars($donnees['dateDebutReservation']); ?>" onchange="checkDate()" required>
    </article>
    <article>
      <label for="dateFinReservation"> Date Fin de Réservation :</label> <br>
      <input type="date" name="dateFinReservation" id="dateFinReservation" value="<?php echo htmlspecialchars($donnees['dateFinReservation']); ?>" onchange="comparerDate()" required> <br>

      <label for="volumeEstime">Volume Estimé :</label> <br>

      <input type="number" name="volumeEstime" id="volumeEstime" value="<?php echo htmlspecialchars($donnees['volumeEstime']); ?>" required>

    </article>
  </section>
  <section class="dates">
        <article>
      <label for="villeDepart">Ville de départ :</label> <br>
      <select name="villeDepart" id="villeDepart" required>
        <option value="">choisir la ville de départ</option>
        <option value="01" <?php if($donnees['codeVilleMiseDispo'] == '01') echo 'selected="selected"'; ?>>Le Havre</option>
        <option value="02" <?php if($donnees['codeVilleMiseDispo'] == '02') echo 'selected="selected"'; ?>>Marseille</option>
        <option value="03" <?php if($donnees['codeVilleMiseDispo'] == '03') echo 'selected="selected"'; ?>>Gennevilliers</option>
        <option value="04" <?php if($donnees['codeVilleMiseDispo'] == '04') echo 'selected="selected"'; ?>>Anvers</option>
        <option value="05" <?php if($donnees['codeVilleMiseDispo'] == '05') echo 'selected="selected"'; ?>>Barcelone</option>
        <option value="06" <?php if($donnees['codeVilleMiseDispo'] == '06') echo 'selected="selected"'; ?>>Hambourg</option>
        <option value="07" <?php if($donnees['codeVilleMiseDispo'] == '07') echo 'selected="selected"'; ?>>Rotterdam</option>
      </select>
    </article>
    <article>
      <label for="villeArrivee">Ville d'arrivée :</label> <br>
      <select name="villeArrivee" id="villeArrivee" required>
        <option value="">choisir la ville d'arrivée</option>
        <option value="01" <?php if($donnees['codeVilleRendre'] == '01') echo 'selected="selected"'; ?>>Le Havre</option>
        <option value="02" <?php if($donnees['codeVilleRendre'] == '02') echo 'selected="selected"'; ?>>Marseille</option>
        <option value="03" <?php if($donnees['codeVilleRendre'] == '03') echo 'selected="selected"'; ?>>Gennevilliers</option>
        <option value="04" <?php if($donnees['codeVilleRendre'] == '04') echo 'selected="selected"'; ?>>Anvers</option>
        <option value="05" <?php if($donnees['codeVilleRendre'] == '05') echo 'selected="selected"'; ?>>Barcelone</option>
        <option value="06" <?php if($donnees['codeVilleRendre'] == '06') echo 'selected="selected"'; ?>>Hambourg</option>
        <option value="07" <?php if($donnees['codeVilleRendre'] == '07') echo 'selected="selected"'; ?>>Rotterdam</option>
      </select>
      <br>
      <select name="typeContainer" id="typeContainer" required>
        <option value="">choisir le type de conteneur</option>
        <option value="FLAT" <?php if($donnees['typeContainer'] == 'FLAT') echo 'selected="selected"'; ?>>Flatracks</option>
        <option value="OTOP" <?php if($donnees['typeContainer'] == 'OTOP') echo 'selected="selected"'; ?>>Open Top 20</option>
        <option value="RE20" <?php if($donnees['typeContainer'] == 'RE20') echo 'selected="selected"'; ?>>Reefer 20</option>
        <option value="REF" <?php if($donnees['typeContainer'] == 'REF') echo 'selected="selected"'; ?>>Refer 40</option>
        </select>
        <label for="quantiteCont">Quantité</label>
      <input type="number" name="qteReserver" id="qteReserver" value="<?php echo htmlspecialchars($donnees['qteReserver']); ?>" required>
       <input type='submit' name='valider' value='Modifier'>
        </form>
   