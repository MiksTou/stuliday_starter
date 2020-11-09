<?php
require 'includes/header.php';
global $conn; 
if(isset($_SESSION['id'])) {
  $requser = $conn->prepare("SELECT * FROM users WHERE id = ?");
  $requser->execute(array($_SESSION['id']));
  $user = $requser->fetch();  
if (isset($_POST['editionProfil'])) {


    if(isset($_POST['newpseudo']) && !empty($_POST['newpseudo']) && $_POST['newpseudo'] != $user['username']) {
      $newpseudo = htmlspecialchars($_POST['newpseudo']);
      $insertPseudo = $conn->prepare("UPDATE users SET username = ? WHERE id = ?");
      $insertPseudo->execute(array($newpseudo, $_SESSION['id']));
      $_SESSION['username'] = $newpseudo;
      // header('Location: profile.php?id=' . $_SESSION['id']);
    }

    
    if(isset($_POST['newemail']) && !empty($_POST['newemail']) && $_POST['newemail'] != $user['email']) {
      $newemail = htmlspecialchars($_POST['newemail']);
      $insertemail = $conn->prepare("UPDATE users SET email = ? WHERE id = ?");
      $insertemail->execute(array($newemail, $_SESSION['id']));
      $_SESSION['email'] = $newemail;
      // header('Location: profile.php?id=' . $_SESSION['id']);
    }

   if(isset($_POST['newmdp1']) && !empty($_POST['newmdp1']) && isset($_POST['newmdp2']) && !empty($_POST['newmdp2']) ) {
     echo 'if ok';
      //MODIFIER HASH SECU NUL -----------------------------
     
      $mdp1 = htmlspecialchars($_POST['newmdp1']);
      $mdp2 = htmlspecialchars($_POST['newmdp2']);
      if($mdp1 === $mdp2)
      {
        $mdp1 = password_hash($mdp1, PASSWORD_DEFAULT);
        $insertmdp = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $insertmdp->execute(array($mdp1, $_SESSION['id']));
        // header('Location: profile.php?id=' . $_SESSION['id']);
      } else {
        $msg = "Vos deux mot de passe ne sont pas identique !";
      }

    }
  }
}
?>


<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Page de profil
      </h1>
      <h2 class="subtitle">
      Information de votre compte
      </h2>
    </div>
  </div>
</section>

<div class="content" align="center">
    <div align="left">
    <h2>Edition de mon profil</h2>
       <form method="POST" action="">
        <label for="">Pseudo :</label>
        <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['username']; ?>" />  <br /><br />
        <label for="">Email :</label>
        <input type="text" name="newemail" placeholder="Email" value="<?php echo $user['email']; ?>" />  <br /><br />
        <label for="">Password :</label>
        <input type="password" name="newmdp1" placeholder="Mot de passe"/>  <br /><br />
        <label for="">Confirm password :</label>
        <input type="password" name="newmdp2" placeholder="Confirmation mot de passe"/>  <br /><br />
        <input type="submit" name="editionProfil"value="Mettre à jour mon profil !" />
      </form>
      <?php if(isset($msg)) {echo $msg; } ?>
    </div>
</div>

