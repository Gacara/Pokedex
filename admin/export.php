<?php
//export.php
require_once "../lib/model.php";

if(!is_loggedin())
{
  redirect('index.php');
}
if(!isset($_GET["id"]))
{
  redirect($_SERVER['HTTP_REFERER']); // $_SERVER['HTTP_REFERER'] == La page précédente
}

// CONTROLLER
$id = sanitize($_GET['id']);
$id = intval($id);
if(is_int($id))
{
  $currentid = $id;
}

$event  = getEventById($currentid);
$guests = getAllGuest($event["id"]);

// on vérifie que l'on a un résultat sinon on s'en va
if(count($guests) == 0)
{
  redirect($_SERVER['HTTP_REFERER']); // $_SERVER['HTTP_REFERER'] == La page précédente
}

// on récupère les entêtes
$first   = $guests[0];
$headers = array_keys($first);
unset($headers[count($headers)-1]); // on supprime le dernier element qui est l'évènement


// on garde tout dans un buffer
$buffer = array();
array_push($buffer,array_values($headers)); // 1ere ligne : les entêtes -- toujours dans un .CSV
foreach ($guests as $key => $value)
{
  unset($value["event"]); // on supprime la case event sans intérêt ici
  array_push($buffer,$value);
}


// on traduit le nom de l'évènement en mot utilisable sur un fichier (un slug)
$tfm = "Any-Latin; NFD; [:Nonspacing Mark:] Remove; NFC; [:Punctuation:] Remove; Lower();";
$filename = transliterator_transliterate($tfm,$event['name']);
$filename = preg_replace('/\s+/', '_', $filename);

//Tips: on écrit le fichier mais directement sur le browser et non sur le serveur
$csv = fopen('php://output','w');
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="'.$filename.'"');

$i = 0;
foreach ($buffer as $row)
{
  if($i > 0) $row["id"] = $i; // on réécrit l'index pour être plus propre
  fputcsv($csv,$row); // on format le texte en CSV automatiquement
  $i++;
}

fclose($csv);
