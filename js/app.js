function Play(){
		 var audio = document.getElementById("pokemon");
        audio.play();
                 }
 
function tout(id){


currentPoke = id-1;

 
 
 const init = ()=>{

let scream      = document.querySelector("#son");
let next        = document.querySelector("#next");
let prev        = document.querySelector("#prev");
let audioPlayer = document.querySelector("#audioplayer");
let screen      = document.querySelector("#img");
let desc        = document.querySelector("#description");
let refresh     = document.querySelector("#refresh");







const updatePoke = ()=>{
  
  let poke = allpokemons[currentPoke];
    screen.src = poke.picture;
   desc.innerHTML = poke.descri;
}



refresh.addEventListener("click",(e)=>{
updatePoke();
});



next.addEventListener("click",(e)=>{
  currentPoke++;
  if(currentPoke >= allpokemons.length) currentPoke -= allpokemons.length;
  updatePoke();
});

prev.addEventListener("click",(e)=>{
  currentPoke--;
  if(currentPoke < 0 ) currentPoke += allpokemons.length;
  updatePoke();
});

scream.addEventListener("click",(e)=>{
   let poke = allpokemons[currentPoke];
    audioPlayer.src = poke.sound;
    audioPlayer.play();
	
	
  
    screen.img = poke.cri
    audioPlayer.addEventListener("ended", function(){
    screen.img = poke.picture
    });
});
 updatePoke();
 };

 window.onload = init;

}






function myFunction() {
    var input, filtre, ul, li, a, i;
    input = document.getElementById("pokerecherche");
    filtre = input.value.toUpperCase();
    ul = document.getElementById("liste");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filtre) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }

}


function cache() { 
  document.getElementById("refresh").style.display = "none"; 
}
function show() { 
  document.getElementById("refresh").style.display = "block"; 
}

