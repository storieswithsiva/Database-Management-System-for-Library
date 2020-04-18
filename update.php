<?php
  include_once 'includes/db_connect.php';

  if(!$mysqli){
  	die("Connection failed: " . mysqli_connect_error());
  }

  $Id= $_POST['id'];
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

  if(isset($_POST['save'])){
    $sqlSave = "UPDATE $table_name SET $isbn_no='$A', $name='$B', $author='$C', $publisher='$D', $print_date='$E', $date_received='$F', $volume='$G', $language='$H', $category='$I', $read='$J', $lend='$K', $lend_to='$L' WHERE $id_no='$Id'";

    if(mysqli_query($mysqli, $sqlSave)){
      mysqli_close($mysqli);
      header("Location: index.php");
    }
    else{
      echo "Error: " . $sqlSave . "<br>" . mysqli_error($mysqli);
    }
  }

  if(isset($_POST['delete'])){
    $sqlDelete = "DELETE FROM $table_name WHERE $id_no='$Id'";

    if(mysqli_query($mysqli, $sqlDelete)){
      mysqli_close($mysqli);
      header("Location: index.php");
    }
    else{
      echo "Error: " . $sqlDelete . "<br>" . mysqli_error($mysqli);
    }
  }

  

  mysqli_close($mysqli);

  header("Location: index.php");
?>