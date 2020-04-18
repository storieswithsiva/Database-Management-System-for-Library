<?php

include_once 'includes/db_connect.php';

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
} 

$All = "List All";
$readFalse = "Unread";
$readTrue = "Read";
$givenTrue = "Lend";

$false = "No";
$true = "Yes";

if(isset($_POST['filterBtn'])){
	$book = $_POST['selection'];

	if($book == $All){
		$sql = "SELECT * FROM $table_name ORDER BY $author";
	}
	elseif($book == $readFalse){
		$sql = "SELECT * FROM $table_name WHERE $read='$false' ORDER BY $author";
	}
	elseif($book == $readTrue){
	    $sql = "SELECT * FROM $table_name WHERE $read='$true' ORDER BY $author";
	}
	elseif($book == $givenTrue){
	    $sql = "SELECT * FROM $table_name WHERE $lend='$true' ORDER BY $author";
	}

	else {
		$sql = "SELECT * FROM $table_name WHERE $language='$book' or $category='$book' ORDER BY $author";
	}
}
