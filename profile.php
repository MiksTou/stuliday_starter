<?php
require 'includes/header.php';


    $userId = $_SESSION['users_id'];
    $requser = $conn->prepare('SELECT * from users WHERE users_id = ?');
    $requser->execute(array($userId));
    $userInfo = $requser->fetch();

    if (!empty($userId)) {

    
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
    <h2>Profil de <?php echo $userInfo['username']; ?></h2>
    <br>
    <h2>Pseudo : <?php echo $userInfo['username']; ?></h2>
    <br>
    <h2>Mail : <?php echo $userInfo['email']; ?></h2>
    <button type="submit" class="button is-dark"> <a href="edtionprofil.php">Editer mon profil</a> </button>
</div>

<?php
} 

