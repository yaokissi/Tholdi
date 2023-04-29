<?php


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
// fonction pour hasher le mot de passe 
function PasswordHash($str)
{
  $str = sha1(md5('zrerg5442254' . $str));
  return $str;
}

// connexion à la base de donnée

try {
  $bdd = new PDO('mysql:host=localhost; dbname=mytholdi; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

} catch (Exception $e) {
  echo "Erreur:" . $e;
}

// verification formulaire d'inscription 

if (isset($_POST['inscription'])) {
  $RaisonSociale = Securise($_POST['raison_sociale']);
  $adresse = Securise($_POST['adresse']);
  $code_postal = Securise($_POST['code_postal']);
  $ville = Securise($_POST['ville']);
  $adresse_mail = Securise($_POST['adresse_mail']);
  $telephone = Securise($_POST['telephone']);
  $contact = Securise($_POST['contact']);
  $identifiant = Securise($_POST['identifiant']);
  $password = Securise($_POST['password']);
  $password_confirmation = Securise($_POST['password_confirmation']);

  // $query = $pdo->query("SELECT nomPays FROM pays");
  // $pays = $query->fetchAll(PDO::FETCH_ASSOC);

  // on vérifie que les champs ont bien été remplis
  if (!empty($RaisonSociale) && !empty($adresse) && !empty($code_postal) && !empty($ville) && !empty($adresse_mail) && !empty($contact) && !empty($identifiant) && !empty($password) && !empty($password_confirmation)) {
    // vérification de saisie du formulaire

    // vérification du l'adresse mail
    if (filter_var($adresse_mail, FILTER_VALIDATE_EMAIL)) {
      // comparaison des mots de passe
      if ($password == $password_confirmation) {
        $TestIfidentifiantExist = $bdd->query("SELECT codeP FROM personne WHERE loginn = '$identifiant'");
        if ($TestIfidentifiantExist ->rowCount()<1) {
          $testIfEmailExist = $bdd->query("SELECT codeP FROM personne WHERE adrMel = '$adresse_mail'");
          if ($testIfEmailExist->rowCount() < 1) {
            $password = PasswordHash($password);
            // $requete = "SELECT codePays FROM pays WHERE nomPays ='$pays'";
            // $resultat = $bdd->query($requete); 
            // if ($resultat) {
            //   $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
            //   $pays = $ligne['codePays'];
            // }
            $bdd->query("INSERT INTO personne (raisonSociale, adresse,cp,ville,adrMel,telephone,contact,loginn,mdp) VALUES ('$RaisonSociale','$adresse','$code_postal','$ville','$adresse_mail','$telephone','$contact','$identifiant','$password')");
            $success = "Vous êtes maintenant inscrit vous pouvez vous connectée !";  
          } 
          else
            $return = "Votre adresse mail est déjà utilsée";
        }
        else 
      $return ="Le login renseigné existe déjà";
             
        } else
          $return = "Vos mots de passes ne sont pas identiques";
      } else
        $return = "L'email est invalide";
    } else
      $return = "un ou plusieurs champs sont manquants";
  }


?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Inscription | Tholdi</title>
  <link rel="stylesheet" href="./css/SignUpForm.css">
  <link rel="stylesheet" type="text/css" href="./css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <?php
  include("./php/menu.php");
  ?>
  <main>


    <form action="#" method="POST">
      <h2>Inscrivez-Vous dès Maintenant</h2>
      <?php if (isset($return)) { ?>
        <div class="alert-form">
          <p>
            <?php echo $return; ?> !
          </p>
        </div>
      <?php } ?>

      <?php if (isset($success)) { ?>
        <div class="success-form">
          <p>
            <?php echo $success; ?>
          </p>
        </div>
      <?php } ?>
      <section class="centrale">
        <article class="LoginInput">
          <input type="text" name="raison_sociale" placeholder="Raison Sociale" required>
          <input type="text" name="adresse" value="" placeholder="Adresse">
        </article>
        <article class="LoginInput">
          <input type="text" name="code_postal" value="" placeholder="Code Postal" required>
          <input type="text" name="ville" value="" placeholder="Ville" required>
        </article>
        <article class="LoginInput">
          <input type="email" name="adresse_mail" value="" placeholder="Adresse Mail" required>
          <input type="text" name="telephone" value="" placeholder="Téléphone">
        </article>
        <article class="LoginInput">
          <input type="text" name="contact" value="" placeholder="Contact">

          <!-- <label for="pays">Pays</label>
          <select name="Codepays" id="Codepays" required>
            <option value="">Sélectionner votre pays</option>
           
          </select> -->

          <input type="text" name="identifiant" value="" placeholder="Login" pattern="[a-z]{4,10}"
            title="4 à 10 lettres en minuscules">
        </article>
        <article class="LoginInput">
          <input type="password" name="password" value="" placeholder="Mot de Passe" pattern=".{8,}"
            title="Saisissez 8 caractères ou plus" requuired>
          <input type="password" name="password_confirmation" value="" placeholder="Confirmer votre Mot de Passe">
        </article>

        <input type="submit" name="inscription" value="S'inscire">
    </form>
    <span>
      <p>Déjà un compte ? <a href="connexion.php">Connectez-vous</a> </p>
    </span>
    </section>

  </main>

</body>

</html>