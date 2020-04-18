<?php
  include_once 'includes/db_connect.php';

  if(!$mysqli){
  	die("Connection failed: " . mysqli_connect_error());
  }

  $A = $_POST['isbn'];
  $B = $_POST['name'];
  $C = $_POST['author'];
  $D = $_POST['publisher'];
  $E = $_POST['print_date'];
  $F = $_POST['date_received'];
  $G = $_POST['volume'];
  $H = $_POST['language'];
  $I = $_POST['category'];
  $J = $_POST['read'];
  $K = $_POST['lend'];
  $L = $_POST['lend_to'];

  $sql = "INSERT INTO $table_name ($isbn_no, $name, $author, $publisher, $print_date, $date_received, $volume, $language, $category, $read, $lend, $lend_to) VALUES ('$A', '$B', '$C', '$D', '$E', '$F', '$G', '$H', '$I', '$J', '$K', '$L')";

  if(mysqli_query($mysqli, $sql)){
  	mysqli_close($mysqli);
    header("Location: new.php");
  }
  else{
  	echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
  }

  mysqli_close($mysqli);

  header("Location: new.php");
?>