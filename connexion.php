<?php
// creation de sessions pour la connexion 
session_start();
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
// si le le bouton de connexion est cliqué

if (isset($_POST['login'])) {
  $identifiant = Securise($_POST['identifiant']);
  $password = Securise($_POST['password']);
  if (!empty($identifiant) and !empty($password)) {
    $password = PasswordHash("$password");
    $VerifUser = $bdd->query('SELECT codeP FROM personne WHERE loginn ="' . $identifiant . '" AND mdp ="' . $password . '"');
    $UserData = $VerifUser->fetch();
    if ($VerifUser->rowCount() == 1) {
      $_SESSION['login'] = $UserData['codeP'];
      header('location:profil.php#reservation');
    } else
      $return = "Les identifiants sont invalides";
  } else
    $return = "un ou plusieurs sont manquants";
}

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Connexion | Tholdi</title>
  <link rel="stylesheet" href="./css/LoginForm.css">
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
    <section class="formulaire">
      <article class="logo2">
        <img src="./img/tholdi_logo2-removebg-preview.png" class="logodeux" width="1200px" alt="tholdi logo">
      </article>
      <form class="" action="" method="POST">

        <?php if (isset($return)) { ?>
          <div class="alert-form">
            <p>
              <?php echo $return; ?> !
            </p>
          </div>
        <?php } ?>

        <img src="./img/user_img.png" alt="user image" width="80px" class="user-img">
        <input type="text" name="identifiant" value="" placeholder="Login">
        <input type="password" name="password" value="" placeholder="Mot de Passe ">
        <input type="submit" name="login" value="Se connecter">
        <!-- <p> Vous avez oubliez votre mot de passe ? <br><a href="#">Reinitialiser Votre Mot de passe oublié ici ! </a>
        </p> -->

      </form>
    </section>
  </main>
</body>

</html>