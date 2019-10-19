<?php
// event.php
require_once "../lib/model.php";

if(!is_loggedin())
{
  redirect('index.php');
}

// CONTROLLER

// on récupère l'id de l'event s'il existe
if( isset($_GET["id"])
||  isset($_POST["event_id"]) )
{
  $id = isset($_GET['id']) ? $_GET['id'] : $_POST["event_id"];
  $id = sanitize($id);
  $id = intval($id);
  if(is_int($id))
  {
    $currentid = $id;
  }
}

// event.php
if(isset($_POST["submit"]))
{
  // Récupération - #0
  $name  	  = sanitize($_POST['name']);
  $date  	  = sanitize($_POST['date']);
  $image 	  = sanitize($_POST['image']);
  $text  	  = sanitize($_POST['textarea'],"<p><a>");

  $errors = [];

  if(!isset($currentid)) // ON DOIT AVOIR ICI UN ID
  {
    $errors[] = "un problème est survenu dans le système, merci de contacter l'administrateur.";
  }
  if(mb_strlen($name,'utf8') < 2 || mb_strlen($name,'utf8') >= 40)
  {
    $errors[] = "Merci de saisir un nom.";
  }
  if(!validateDate($date))
  {
    $errors[] = "Merci de saisir une date au format YYYY-MM-JJ";
  }
  if(filter_var($image, FILTER_VALIDATE_URL) === FALSE)
  {
    $errors[] = 'Merci de mettre une image valide.';
  }
  if(mb_strlen($text,'utf8') < 2 || mb_strlen($text,'utf8') >= 1024)
  {
    $errors[] = "Merci de saisir une adresse correcte.";
  }
  if(count($errors) ==  0)
  {
    if(updateEvent($currentid,$name,$date,$image,$text))
    {
      $success = "Mise à jour effectué";
    }else{
      $error   = "Erreur dans la mise à jour";
    }
  }
}


$events = getAllEvent();

// SI L'ID en cours n'existe pas
// ALORS on prend le dernier event disponible
// SINON on prend l'event sélectionné par l'ID
$currEvent = !isset($currentid) ? $events[0] : getEventById($currentid);

//VIEW
require "header.php";
?>

<?php
  if(count($events)>0)
  {
    echo "<ul>";
    foreach ($events as $event)
    {// Attention à bien écrire le lien ici
      echo '<li><a href="event.php?id='.$event['id'].'">'.$event['name'].'</a></li>';
    }
    echo "</ul>";
  }
?>

  <h1><?=$currEvent["name"]?></h1>
  <?php
      if(isset($errors) && count($errors) > 0)
      {
         echo "<ul>";
         foreach($errors as $error)
         {
           echo "<li>".$error."</li>";
         }
         echo "</ul>";
      }else if(isset($success) && $success){
        echo '<h2>'.$success.'</h2>';
      }
  ?>
  <form class="form-horizontal" action="" method="post">
  <fieldset>
    <legend>Evènement</legend>

    <input type="hidden" value="<?=$currEvent['id'];?>" name="event_id" id="event_id" >

    <div class="form-group">
      <label class="col-md-4 control-label" for="name">Name</label>
      <div class="col-md-4">
      <input id="name" name="name" type="text" class="form-control input-md" required=""
      value="<?=$currEvent["name"];?>">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="date">Date</label>
      <div class="col-md-4">
      <input id="date" name="date" type="date" class="form-control" required=""
      value="<?=$currEvent["date"];?>" data-date-format="yyyy-mm-dd">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="image">Image</label>
      <div class="col-md-4">
      <input id="image" name="image" type="text" class="form-control input-md" required=""
      value="<?=$currEvent["image"];?>">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="textarea">Description</label>
      <div class="col-md-4">
        <textarea class="form-control" id="textarea" name="textarea"><?=$currEvent["description"];?></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-4">
      <input id="submit" name="submit" type="submit" value=" Mettre à jour" class="form-control input-md">
      </div>
    </div>

  </fieldset>
</form>

<?php

require "footer.php";
