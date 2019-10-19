<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

$host     = "romaingodk78780.mysql.db";
$dbName   = "romaingodk78780";
$user     = "romaingodk78780";
$password = "Caramelvsgalak78780";

try {
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
  $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
  $bdd = new PDO('mysql:host='.$host.';dbname='.$dbName,$user,$password,$pdo_options);
} catch (Exception $e) {
  die('Erreur : '.$e->getMessage());
}

function getBDD()
{
    global $bdd;
    return $bdd;
}

