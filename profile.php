<?php
require 'includes/header.php';

if(isset($_GET['id']) AND $_GET['id'] > 0) {

    global $conn;
    $getId = intval($_GET['id']);
    $requser = $conn->prepare('SELECT * from users WHERE id = ?');
    $requser->execute(array($getId));
    $userInfo = $requser->fetch();
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
    <h2>Pseudo = <?php echo $userInfo['username']; ?></h2>
    <br>
    <h2>Mail = <?php echo $userInfo['email']; ?></h2>
    <?php 
        if(isset($_SESSION['id']) AND $userInfo['id'] === $_SESSION['id']) {
    ?>
    <h4> <a href="edtionprofil.php">Editer mon profil</a> </h4>
    <?php 
        } 
    ?>
</div>

<?php
} 