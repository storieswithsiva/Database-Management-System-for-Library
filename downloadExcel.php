<?php
include_once 'includes/db_connect.php';

session_start();
include 'languages/langConfig.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Download</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="css/bootstrap.min.css">
          <link rel="stylesheet" href="css/library.css">
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
                    <li><a href="register.php"><img class="button-image" src="images/register.png"> <?php echo $lang['nav_settings'] ?></a></li>
                    <li class="active"><a href="downloadExcel.php"><img class="button-image" src="images/download.png"> <?php echo $lang['nav_download'] ?></a></li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div><!--/.container-fluid -->
            </nav>

          <div style="background-color: #f8f8f8; padding: 10px; margin: 5px;">
          <form action="downloadFunction.php" method="POST">
            <h4 class="text-center"><?php echo $lang['register_lang'] ?></h4>
            <div class="text-center">
              <p>
                <a href="<?php echo $link_download_en ?>" class="customLink" style="color: #000;"><?php echo $lang['register_lang1'] ?></a> | 
                <a href="<?php echo $link_download_tr ?>" class="customLink" style="color: #000;"><?php echo $lang['register_lang2'] ?></a> | 
                <a href="<?php echo $link_download_de ?>" class="customLink" style="color: #000;"><?php echo $lang['register_lang3'] ?></a>
              </p>
            </div>
            <button type="submit" class="btn btn-primary col-md-12 center-block btn-new-submit"><?php echo $lang['download'] ?></button>
          </form>
          </div>

      </div>

    </body>
</html>