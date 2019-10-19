<?php
// guest.php
require_once "../lib/model.php";


// important
if(!is_loggedin())
{
  redirect('index.php');
}

$errors = [];
$success;
$maxid = getmaxipokemon();



 
  if (
	isset($_POST["id"])
	&& isset($_POST["name"])
    && isset($_POST["picture"])
	&& isset($_POST["descri"])
	&& isset($_POST["sound"])
	)
	
    {
        $input_id    = sanitize($_POST["id"]);
        $input_name    = sanitize($_POST["name"]);
        $input_picture   = sanitize($_POST["picture"]);
        $input_descri    = sanitize($_POST["descri"]);
        $input_sound      = sanitize($_POST["sound"]);
		

	      
	      if(mb_strlen($input_name, 'utf8') < 3 || mb_strlen($input_name, 'utf8') >= 60)
        {
		        $errors[] = "Merci d'entrer un nom correct";
	      }
		  if(filter_var($input_picture,FILTER_VALIDATE_URL) === FALSE)
        {
		        $errors[] = "Merci de mettre un lien valide vers une image";
	      }
		  if(mb_strlen($input_descri, 'utf8') < 3 || mb_strlen($input_descri, 'utf8') >= 500)
        {
		        $errors[] = "Merci de rentrer une description valide";
	      }
		  if(mb_strlen($input_sound, 'utf8') < 3 || mb_strlen($input_sound, 'utf8') >= 255)
        {
		        $errors[] = "Merci de mettre un chemin d'accès valide";
	      }
		  
	      

      if(count($errors) == 0)
      	{
          	savenewpokemon($input_id,$input_name,$input_picture,$input_descri,$input_sound);
          	   $success  = "Merci d'avoir rajouté un Pokemon, en espérant qu'il se plaise dans son nouvel habitat !";
			   echo "<h2>".$success."</h2>";
          	}else
			 
		 foreach($errors as $error)  
          {
            echo"<li>$error</li>";
          }
         $errors[] = "Probleme dans le serveur, merci de contacter le professeur Chen";
       
	}

      	






?>

<script>
let test = <?php echo json_encode($maxid) ?>;
	let idmax = test[0]['MAX(id)'];
	var parsed = Number.parseInt(idmax, 10);
	var maxid = parsed +1;
	console.log(maxid);
	
	
	
</script>
<!DOCTYPE html>
<html>
  <head>
		<title>POKEMON MANAGER</title>
		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Romain Goulet">
		<meta name="description" content="description">
<style>


html {
      margin :5% 5%;
      background: url(img/parc.jpg) no-repeat fixed;
	background-size:cover;

 }
</style>
</head>
  <body>
	<h1><font color="black">Ajouter des Pokemons.</font></h1>
    

 
</html>
<div class="tout" >
<form action="" method="post">
          
<!-- <input type="hidden" id="id" value="<?=$maxid?>" name="id"  > -->
		  
		  <label for="id">Id</label>
          <input id='id' type='text' name="id" value=""  />
		  
          <label for="name">name</label>
          <input id='name' type='text' name="name" value="" placeholder="Nom du Pokemon" />
		  
		  
          <label for="picture">picture</label>
          <input id='picture' type='text' name="picture" value="" placeholder="Lien vers l'image du Pokemon" />
		  
		  
          <label for="descri">descri</label>
          <input id='descri' type='text' name="descri" value="" placeholder="Description du Pokemon" />
		  
		  
			<label for="sound">sound</label>
          <input id='sound' type='text' name="sound" value="" placeholder="Chemin d'accès au son" />
		  
		  
          <input id="submit" type="submit" name="submit" value="Créer !" />
		  
        </form>
</div>
<script>
document.getElementById("id").value = maxid;
</script>
	<nav style="padding-top: 50px;" >
      <a href="ajout.php" >Ajouter un autre Pokémon.</a>
    </nav>
 <nav style="padding-top: 50px;" >
      <a href="guest.php" >Retour à la liste des Pokémons</a>
    </nav>
	 <p class="text-center" style="padding-top: 600px; padding-left: 675px;"> POKEMON - Nintendo - copyright ©<p>
<?php
require "./footer.php";
?>
