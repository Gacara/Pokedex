<?php
require_once "connexion.php";

function PokeList()
{
$retour = getBDD()->query("SELECT * FROM pokemon");   
$poketab = array();  
while ($ret = $retour->fetch(PDO::FETCH_ASSOC)) $poketab[] = $ret; 
return $poketab;
}

function getmaxidpokemon()
{
$response = getBDD()->query("SELECT MAX(id) FROM pokemon");
$test = array();  
while ($ret = $response->fetch(PDO::FETCH_ASSOC)) $test[] = $ret;
return $test;
}


function getmaxipokemon()
{
$response = getBDD()->query("SELECT MAX(id) FROM pokemon");
$data = $response->fetchAll(PDO::FETCH_ASSOC);
$response->closeCursor();
return $data;

}






function getAllPokemon()
{
  $response = getBDD()->query("SELECT * FROM pokemon ORDER BY name ASC LIMIT 100");
  $data = $response->fetchAll(PDO::FETCH_ASSOC);
  $response->closeCursor();
  return $data;
}

function gettoutPokemon()
{
  $response = getBDD()->query("SELECT * FROM pokemon ORDER BY name ASC LIMIT 100");
  $data = $response->fetchAll(PDO::FETCH_ASSOC);
  $response->closeCursor();
  return $data;
}


function getPokemonById($id)
{
  $query = getBDD()->prepare("SELECT * FROM pokemon WHERE id=:id LIMIT 1");
  $query->execute(array("id"=>$id));
  $data = $query->fetch(PDO::FETCH_ASSOC);
  $query->closeCursor();
  return $data;
}

function login($login,$upass)
{
  try{
    $query = getBDD()->prepare("SELECT * FROM user WHERE name=:uname OR email=:umail LIMIT 1");
    $query->execute(array('uname'=>$login,'umail'=>$login));
    $user  = $query->fetch(PDO::FETCH_ASSOC);
    $count = $query->rowCount() > 0;
    $query->closeCursor();
    if($count > 0)
    {
      if(hash('sha1',$upass) == $user['password'])
      {
        $_SESSION['user_session'] = $user['id'];
        return true;
      }else{
        return false;
      }
    }
  }catch(PDOException $e){
    echo $e->getMessage();
  }
}


function is_loggedin()
{
  if(isset($_SESSION['user_session']))
  {
    return true;
  }
}

function redirect($url)
{
  header("Location: $url");
}

function logout()
{
  session_destroy();
  unset($_SESSION['user_session']);
  return true;
}

function sanitize($data,$exclude = "")
{
  return htmlspecialchars(strip_tags(trim($data),$exclude) ,ENT_QUOTES,'UTF-8');
}

function savenewpokemon($id,$name,$picture,$descri,$sound)
{
  $req = getBDD()->prepare("INSERT INTO pokemon (id, name, picture, descri, sound) VALUES (:id, :name,:picture,:descri,:sound)");
  $req->execute(array(
		  "id"        => $id,
          "name"      => $name,
          "picture"   => $picture,
          "descri"     => $descri,
          'sound'     => $sound
          ));
  $req->closeCursor();
}



function getAllGuest($event)
{
	$req = getBDD()->prepare("SELECT * FROM guest WHERE event = :event LIMIT 100");
	$req->execute(array("event"=>$event));
  $data = $req->fetchAll(PDO::FETCH_ASSOC);
  $req->closeCursor();
  return $data;
}


function deletepokemon($id)
{
  $req = getBDD()->prepare("DELETE FROM pokemon WHERE id = :id");
  $req->execute(array(
    "id"	  => $id
  ));
  $nb = $req->rowCount(); 
  $req->closeCursor();
  return $nb > 0;
}


//model.php
function updatePokemon($id,$name,$date,$image,$text)
{
  $sql = "UPDATE pokemon SET name        = :key_name,
                           image       = :key_image,
                           description = :key_desc
                        WHERE id = :key_id";
  $req = getBDD()->prepare($sql);
  $data = array(
         "key_name"   => $name,
         "key_image"  => $image,
         "key_desc"   => $text,
         "key_id"     => $id
       );
  $result = $req->execute($data);
  return $result;
}

//model.php
function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
