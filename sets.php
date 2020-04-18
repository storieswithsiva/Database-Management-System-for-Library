<?php
  include_once 'includes/db_connect.php';

  if(!$mysqli){
  	die("Connection failed: " . mysqli_connect_error());
  }

  $Lang = $_POST['newLang'];
  $Cat = $_POST['newCat'];

  $DelLang = $_POST['lang'];
  $DelCat = $_POST['cat'];

  if(isset($_POST['newLangButton'])){
    $sqlInsert = "INSERT INTO language (language) VALUES ('$Lang')";

    if(mysqli_query($mysqli, $sqlInsert)){
      mysqli_close($mysqli);
      header("Location: register.php");
    }
    else{
      echo "Error: " . $sqlInsert . "<br>" . mysqli_error($mysqli);
    }
  }

  if(isset($_POST['newCatButton'])){
    $sqlInsert = "INSERT INTO category (category) VALUES ('$Cat')";

    if(mysqli_query($mysqli, $sqlInsert)){
      mysqli_close($mysqli);
      header("Location: register.php");
    }
    else{
      echo "Error: " . $sqlInsert . "<br>" . mysqli_error($mysqli);
    }
  }

  if(isset($_POST['delLangButton'])){
    $sqlInsert = "DELETE FROM language WHERE language='$DelLang'";

    if(mysqli_query($mysqli, $sqlInsert)){
      mysqli_close($mysqli);
      header("Location: register.php");
    }
    else{
      echo "Error: " . $sqlInsert . "<br>" . mysqli_error($mysqli);
    }
  }

  if(isset($_POST['delCatButton'])){
    $sqlInsert = "DELETE FROM category WHERE category='$DelCat'";

    if(mysqli_query($mysqli, $sqlInsert)){
      mysqli_close($mysqli);
      header("Location: register.php");
    }
    else{
      echo "Error: " . $sqlInsert . "<br>" . mysqli_error($mysqli);
    }
  }

  header("Location: register.php");
?>