<?php
include_once 'includes/db_connect.php';
// Displays Turkish letters
mysqli_select_db($mysqli, DATABASE);
mysqli_query($mysqli, "SET NAMES UTF8");

session_start();
include 'languages/langConfig.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Settings</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="css/bootstrap.min.css">
          <link rel="stylesheet" href="css/library.css">
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
        <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
      <div class="container">

          <!-- Static navbar -->
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header col-md-5">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <h4><?php echo $lang['register_title'] ?></h4>
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav navbar-right navBar">
                    <li><a href="index.php"><img class="button-image" src="images/home.png"> <?php echo $lang['nav_home'] ?></a></li>
                    <li><a href="new.php"><img class="button-image" src="images/add.png"> <?php echo $lang['nav_new'] ?></a></li>
                    <li class="active"><a href="register.php"><img class="button-image" src="images/register.png"> <?php echo $lang['nav_settings'] ?></a></li>
                    <li><a href="downloadExcel.php"><img class="button-image" src="images/download.png"> <?php echo $lang['nav_download'] ?></a></li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div><!--/.container-fluid -->
            </nav>

          <?php
          if (!empty($error_msg)) {
              echo $error_msg;
          }
          ?>

          <div style="background-color: #f8f8f8; padding: 10px; margin: 5px;">
            <h4 class="text-center"><?php echo $lang['register_lang'] ?></h4>
            <div class="text-center">
              <p>
                <a href="<?php echo $link_register_en ?>" class="customLink" style="color: #000;"><?php echo $lang['register_lang1'] ?></a> | 
                <a href="<?php echo $link_register_tr ?>" class="customLink" style="color: #000;"><?php echo $lang['register_lang2'] ?></a> | 
                <a href="<?php echo $link_register_de ?>" class="customLink" style="color: #000;"><?php echo $lang['register_lang3'] ?></a>
              </p>
            </div>
          </div>

          <div class="form-row">
            <form action="sets.php" method="POST">
              
                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: #f8f8f8; padding: 10px; margin: 5px; margin-left: 0; margin-right: 0;">
                  <label for="newLang"><?php echo $lang['register_settings_newLang'] ?></label>
                  <input type="text" class="form-control col-xs-8 col-sm-8 col-md-3 col-lg-3" name="newLang" id="newLang" placeholder="<?php echo $lang['register_settings_ph1'] ?>">

                  <button name='newLangButton' id='newLangButton' type='submit' class='btn btn-primary btn-new-settings-gr col-xs-4 col-sm-4 col-md-2 col-lg-2'><?php echo $lang['register_settings_Add'] ?></button>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: #f8f8f8; padding: 10px; margin: 5px; margin-left: 0; margin-right: 0;">
                  <label for="lang"><?php echo $lang['register_settings_delLang'] ?></label>
                  <select type="text" name="lang" id="lang" class="form-control col-xs-8 col-sm-8 col-md-3 col-lg-3">
                    <?php 
                      $sqlLang = "SELECT * FROM language";
                      $result = $mysqli->query($sqlLang);
                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          echo "<option>" . $row['language'] . "</option>";
                        }
                      }else{echo "<option selected>".$lang['register_settings_ph2']."</option>";}
                    ?>
                  </select>

                  <button name='delLangButton' id='delLangButton' type='submit' class='btn btn-danger btn-new-settings-re col-xs-4 col-sm-4 col-md-2 col-lg-2'><?php echo $lang['register_settings_Delete'] ?></button>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: #f8f8f8; padding: 10px; margin: 5px; margin-left: 0; margin-right: 0;">
                  <label for="newCat"><?php echo $lang['register_settings_newCat'] ?></label>
                  <input type="text" class="form-control col-xs-8 col-sm-8 col-md-4 col-lg-4" name="newCat" id="newCat" placeholder="<?php echo $lang['register_settings_ph3'] ?>">

                  <button name='newCatButton' id='newCatButton' type='submit' class='btn btn-primary btn-new-settings-gr col-xs-4 col-sm-4 col-md-2 col-lg-2'><?php echo $lang['register_settings_Add'] ?></button>
                </div>

                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6" style="background-color: #f8f8f8; padding: 10px; margin: 5px; margin-left: 0; margin-right: 0;">
                  <label for="cat"><?php echo $lang['register_settings_delCat'] ?></label>
                  <select type="text" name="cat" id="cat" class="form-control col-xs-8 col-sm-8 col-md-4 col-lg-4">
                    <?php 
                      $sqlLang = "SELECT * FROM category";
                      $result = $mysqli->query($sqlLang);
                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          echo "<option>" . $row['category'] . "</option>";
                        }
                      }else{echo "<option selected>".$lang['register_settings_ph4']."</option>";}
                    ?>
                  </select>

                  <button name='delCatButton' id='delCatButton' type='submit' class='btn btn-danger btn-new-settings-re col-xs-4 col-sm-4 col-md-2 col-lg-2'><?php echo $lang['register_settings_Delete'] ?></button>
                </div>

            </form>
          </div>

      </div>

    </body>
</html>