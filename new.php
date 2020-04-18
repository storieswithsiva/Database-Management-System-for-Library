<?php
include_once 'includes/db_connect.php';

session_start();
include 'languages/langConfig.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Library</title>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="css/bootstrap.min.css">
          <link rel="stylesheet" href="css/library.css">
          <link href="css/bootstrap-datepicker.css" rel="stylesheet"/>
          <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/bootstrap-datepicker.js"></script>
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
              <h4><?php echo $lang['new_title'] ?></h4>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right navBar">
                <li><a href="index.php"><img class="button-image" src="images/home.png"> <?php echo $lang['nav_home'] ?></a></li>
                <li class="active"><a href="new.php"><img class="button-image" src="images/add.png"> <?php echo $lang['nav_new'] ?></a></li>
                <li><a href="register.php"><img class="button-image" src="images/register.png"> <?php echo $lang['nav_settings'] ?></a></li>
                <li><a href="downloadExcel.php"><img class="button-image" src="images/download.png"> <?php echo $lang['nav_download'] ?></a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!--/.container-fluid -->
        </nav>

        <form action="new-php.php" method="post">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="isbn"><?php echo $lang['new_ISBN'] ?></label>
              <input type="number" class="form-control" name="isbn" id="isbn" placeholder="9781408855928">
            </div>
            <div class="form-group col-md-6">
              <label for="name"><?php echo $lang['new_Name'] ?></label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Harry Potter and the Goblet of Fire">
            </div>
          </div>
          <div class="form-group col-md-6">
            <label for="author"><?php echo $lang['new_Author'] ?></label>
            <input type="text" class="form-control" name="author" id="author" placeholder="Joanne K. Rowling">
          </div>
          <div class="form-group col-md-6">
            <label for="publisher"><?php echo $lang['new_Publisher'] ?></label>
            <input type="text" class="form-control" name="publisher" id="publisher" placeholder="Bloomsbury">
          </div>
          <div class="form-group col-md-3">
            <label for="print_date"><?php echo $lang['new_PrintDate'] ?></label>
            <input type="text" class="form-control date-own" name="print_date" id="print_date" placeholder="2014">
            
            <script type="text/javascript">
                $('.date-own').datepicker({
                   minViewMode: 2,
                   format: 'yyyy'
                 });
            </script>
          </div>
          <div class="form-group col-md-3">
            <label for="date_received"><?php echo $lang['new_DateReceived'] ?></label>
            <input type="text" class="form-control date-own2" name="date_received" id="date_received" placeholder="13.05.2017">

            <script type="text/javascript">
                $('.date-own2').datepicker({
                   format: 'dd.mm.yyyy'
                 });
            </script>
          </div>
          <div class="form-group col-md-3">
            <label for="volume"><?php echo $lang['new_Volume'] ?></label>
            <input type="text" class="form-control" name="volume" id="volume" placeholder="4/7">
          </div>
          <div class="form-group col-md-3">
            <label for="language"><?php echo $lang['new_Language'] ?></label>
            <select type="text" name="language" id="language" class="form-control">
              <?php 
                $sqlLang = "SELECT * FROM language";
                $result = $mysqli->query($sqlLang);
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<option>" . $row['language'] . "</option>";
                  }
                }else{echo "<option selected>English</option>";}
              ?>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="category"><?php echo $lang['new_Category'] ?></label>
            <select type="text" name="category" id="category" class="form-control">
              <?php 
                $sqlCat = "SELECT * FROM category";
                $result = $mysqli->query($sqlCat);
                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<option>" . $row['category'] . "</option>";
                  }
                }else{echo "<option selected>Book</option>";}
              ?>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="read"><?php echo $lang['new_Read'] ?></label>
            <select type="text" name="read" id="read" class="form-control">
              <option value="No" selected><?php echo $lang['no'] ?></option>
              <option value="Yes"><?php echo $lang['yes'] ?></option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label for="lend"><?php echo $lang['new_Lend'] ?></label>
            <select type="text" name="lend" id="lend" class="form-control">
              <option value="No" selected><?php echo $lang['no'] ?></option>
              <option value="Yes"><?php echo $lang['yes'] ?></option>
            </select>
          </div>
          <div class="form-group col-md-9">
            <label for="lend_to"><?php echo $lang['new_LendTo'] ?></label>
            <input type="text" class="form-control" name="lend_to" id="lend_to" placeholder="Hermine Granger">
          </div>

          <button type="submit" class="btn btn-primary col-md-12 center-block btn-new-submit"><?php echo $lang['new_Add'] ?></button>
        </form>
      </div>

    </body>
</html>