<?php
require_once "lib/model.php";
$poketab = PokeList();
$pokemons = getAllPokemon();

?>


<!DOCTYPE html>
<html>
  <head>
 
		<title>Pokedex</title>
		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Romain Goulet">
		<meta name="description" content="description">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/normalize.css">
		<script src="js/app.js"> </script>
<style>
* {
  box-sizing: border-box;
}

#pokerecherche {
 
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 3px solid black;
  margin-bottom: 12px;
}

#liste {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#liste li a {
  border: 1px solid #ddd;
  margin-top: -1px; 
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#liste li a:hover:not(.header) {
  background-color: #eee;
}

#cachebar {
 
  background-color: red;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 3px solid black;
  margin-bottom: 12px;
}
</style>
 
	
</head>
  <body>
  



		
 <script type="text/javascript"> 


	let tabpokemon = <?php echo json_encode($poketab, JSON_PRETTY_PRINT) ?>;
	let allpokemons = tabpokemon;
	tout (1);
	


 </script>

	<input type="button" id="cachebar" onkeyup="cache()" onclick="cache()" text="Cacher la barre" title="Cacher la barre">
	
	<input type="text" id="pokerecherche" onkeyup="myFunction()" onclick="show()" placeholder="Chercher un Pokémon" title="Type in a Pokemon">
	<div id="refresh">
	<div id="barre">
	<ul id="liste">
			<?php 
					foreach ($pokemons as $name)
					{ ?>
							<li><a onclick="tout(<?=$name["id"];?>);cache()"><?=$name["name"];?></a></li>
			<?php 
					} ?>
							</li>
	  
	</ul>
	</div></div>
<script> 
cache();

 </script>
 
 
	<div id="conteneur"> 
		
												<!-- ELEMENT GAUCHE -->
		<div class="element">
			<div id="horig">
				
				<div class="carre1"> <div id="refresh" class="rondbleu" onclick="cache()"> </div> </div>
				<div class="carre1"> <div class="trait4"> </div><div class="trait2"> </div> <div class="trait3"> </div></div>
				<div class="carre1">  
				
					<audio id="pokemon" src="img/pokemon.mp3"> </audio>
					<audio id="audioplayer" ></audio>
					
					<button class="button button1" onclick="Play()" type="button">&nbsp &nbsp &nbsp </button>
					
					
				</div>
			</div>
		</div>
		
		
												<!-- ELEMENT MILIEU -->
		<div class="element">
			<div id="horim">
				<div class="carre2"> <div class="rond2"> </div> <div class="rond3"> </div> <div class="rond4"> </div></div>
				
				
				<div class="carre2">
						
						
						<div class="trait3"> </div> <div class="ecran"> </div>
									 
								<div id="photo"><img class="photo" id="img" src="#"  alt="" ></div>
								
				</div>
				
				
				<div class="carre2">	<div id="prev" class="button button2" > </div>  <div id="son"class="ecran2" > </div> <div id="next" class="button button3" > </div>
				
				<div class="rectangle5"> </div><div class="rectangle6"> </div><div class="rectangle7"></div> 
				</div>
			</div>
		</div>
		
												<!-- ELEMENT DROITE -->
		<div class="element">
			<div id="horid">
				<div class="carre3"></div>
					
				<div class="carre3"> <p id="description"></p>
				
				</div>
				
				<div class="carre3"> 
				<div class="rectangle1"> </div> <div class="rectangle1"> </div> <div class="rectangle1"> </div>
				
				<div class="rectangle3"> </div> <div class="rectangle3"> </div> <div class="rectangle3"> </div>
				</div>
			</div>
		</div>
		
	</div>
	
	
  </body>
  <nav style="padding-top: 400px;" >
      <a href="admin/index.php">Gérer le Pokedex.</a>
    </nav>
</html>
