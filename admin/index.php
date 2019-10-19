<?php
//admin/index.php
  require_once '../lib/model.php';

  if(isset($_POST['btn-login']))
  {
    $ulogin = sanitize($_POST['txt_uname_email']);
    $upass  = sanitize($_POST['txt_password']);

    if(login($ulogin,$upass))
    {
      
      redirect('guest.php');
    }else{
      $error = "Mauvais identifiant ou mot de passe !";
    }
  }

require_once "header.php";
?>
  <h1>Connexion à la page administrateur !</h1>
  <?php
  if(isset($error))
  {
    echo "<h3>".$error."</h3>";
  }
  ?>
  
  
  <form action="" method="post">
    <input type="text" name="txt_uname_email" value="" placeholder="Identifiant">
    <input type="text" name="txt_password" value="" placeholder="Mot de passe">
    <input type="submit" name="btn-login" value="Se connecter">
  </form>

  <div>
    <p>Identifiant : pokemon</p>
    <p>Mot de passe : pokemon</p>
  </div>
<?php

require_once "footer.php";
