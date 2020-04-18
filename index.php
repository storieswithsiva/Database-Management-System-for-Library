<?php
include_once 'includes/db_connect.php';

session_start();
include 'languages/langConfig.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Library</title>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="css/bootstrap.min.css">
          <link rel="stylesheet" href="css/library.css">
          <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/backToTop.js"></script>
        <meta charset="UTF-8">

        <!-- Script to detect the click on a row of table -->
          <script type='text/javascript'>
            $(document).ready(function($) {
                $('.table-row').click(function() {
                  //Some Function by row clicked
                  window.document.location = $(this).data('href');
                });
            });
          </script>

          <!-- Script to show Modal if the url gets id=... -->
          <script type="text/javascript">
              $(window).on('load',function(){
                if(window.location.href.indexOf("id") > -1){
                  $('#exampleModalLong').modal('show');
                }
              });
          </script>
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
              <div class="form-inline">
                <select type="text" name="searchSelection" id="searchSelection" class="form-control my-2 my-sm-0">
                  <option value="Author" selected><?php echo $lang['home_search_Author'] ?></option>
                  <option value="Name"><?php echo $lang['home_search_Name'] ?></option>
                </select>
                <input name="myInput" id="myInput" onkeyup="myFunction()" class="form-control mr-sm-2" type="text" placeholder="<?php echo $lang['home_search'] ?>" autocomplete="off">
              </div>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right navBar">
                <li class="active"><a href="index.php"><img class="button-image" src="images/home.png"> <?php echo $lang['nav_home'] ?></a></li>
                <li><a href="new.php"><img class="button-image" src="images/add.png"> <?php echo $lang['nav_new'] ?></a></li>
                <li><a href="register.php"><img class="button-image" src="images/register.png"> <?php echo $lang['nav_settings'] ?></a></li>
                <li><a href="downloadExcel.php"><img class="button-image" src="images/download.png"> <?php echo $lang['nav_download'] ?></a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!--/.container-fluid -->
        </nav>

        <!-- Functions for Table -->
        <form name="filterForm" id="filterForm" action="index.php" method="POST" class="center-block text-center">
            <div class="form-row">
              <div class="form-group col-xs-5 col-sm-5 col-md-5 col-lg-5" style="margin-left: 20%;">
                <select type="text" name="selection" id="selection" class="form-control">
                  <option value="List All"><?php echo $lang['home_filter_ListAll'] ?></option>
                  <option value="Unread"><?php echo $lang['home_filter_Unread'] ?></option>
                  <option value="Read"><?php echo $lang['home_filter_Read'] ?></option>
                  <option value="Lend"><?php echo $lang['home_filter_Lend'] ?></option>
                  <optgroup label="<?php echo $lang['home_filter_Languages'] ?>">
                    <?php 
                      $sqlLang = "SELECT * FROM language";
                      $result = $mysqli->query($sqlLang);
                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          echo "<option>" . $row['language'] . "</option>";
                        }
                      }
                    ?>
                  </optgroup>
                  <optgroup label="<?php echo $lang['home_filter_Categories'] ?>">
                    <?php 
                      $sqlCat = "SELECT * FROM category";
                      $result = $mysqli->query($sqlCat);
                      if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                          echo "<option>" . $row['category'] . "</option>";
                        }
                      }
                    ?>
                  </optgroup>
                </select>
              </div>
              <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <button name='filterBtn' id='filterBtn' type='submit' onclick="addFilter()" class='btn btn-primary pull-left center-block'><?php echo $lang['home_filter_Filter'] ?></button>
              </div>
            </div>    
        </form>

        <p id="count" class="text-center col-xs-12 col-sm-12 col-md-12 col-lg-12"></p>

        <!-- Table -->
        <table id="myTable" class="table table-striped table-light table-hover table-bordered">
          <thead class="thead-dark">
            <tr>
              <th class="text-right table-title col-xs-6 col-sm-6 col-md-6 col-lg-6" data-field="Name"><?php echo $lang['home_table_Name'] ?></th>
              <th class="text-left table-title col-xs-6 col-sm-6 col-md-6 col-lg-6" data-field="Author"><?php echo $lang['home_table_Author'] ?></th>
            </tr>
          </thead>
          <tbody class="search-box" id="tableRow" name="tableRow">
            <?php
            include_once 'getSqlQuery.php';
            ?>
          </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn btn-dark col-md-12 center-block" data-dismiss="modal"><?php echo $lang['home_modal_Close'] ?></button>  
              </div>
              <div class="modal-body">
                <form action="update.php" method="post">
                  <?php
                    include 'includes/db_connect.php';

                    $btnId = isset($_GET['id']) ? $_GET['id'] : '';
                    $sql = "SELECT * FROM $table_name WHERE $id_no='$btnId'";
                    $result = $mysqli->query($sql);
                    $row = $result->fetch_array();
                    echo "<div class='form-group'>
                            <label for='id'>".$lang['home_modal_ID']."</label>
                            <input name='id' type='text' class='form-control' id='id' value='".$row[$id_no]."' readonly>
                          </div>
                          <div class='form-group'>
                            <label for='isbn'>".$lang['home_modal_ISBN']."</label>
                            <input name='isbn' type='number' class='form-control' id='isbn' value='".$row[$isbn_no]."'>
                          </div>
                          <div class='form-group'>
                            <label for='name'>".$lang['home_modal_Name']."</label>
                            <input name='name' type='text' class='form-control' id='name' value='".$row[$name]."'>
                          </div>
                          <div class='form-group'>
                            <label for='author'>".$lang['home_modal_Author']."</label>
                            <input name='author' type='text' class='form-control' id='author' value='".$row[$author]."'>
                          </div>
                          <div class='form-group'>
                            <label for='publisher'>".$lang['home_modal_Publisher']."</label>
                            <input name='publisher' type='text' class='form-control' id='publisher' value='".$row[$publisher]."'>
                          </div>
                          <div class='form-group'>
                            <label for='print_date'>".$lang['home_modal_PrintDate']."</label>
                            <input  name='print_date' type='text' class='form-control date-own' id='print_date' value='".$row[$print_date]."'>
                          </div>
                          <div class='form-group'>
                            <label for='date_received'>".$lang['home_modal_DateReceived']."</label>
                            <input name='date_received' type='text' class='form-control date-own2' id='date_received' value='".$row[$date_received]."'>
                          </div>
                          <div class='form-group'>
                            <label for='volume'>".$lang['home_modal_Volume']."</label>
                            <input name='volume' type='text' class='form-control' id='volume' value='".$row[$volume]."'>
                          </div>
                          <div class='form-group'>
                            <label for='language'>".$lang['home_modal_Language']."</label>
                            <select type='text' name='language' id='language' class='form-control'>
                              <option selected>".$row[$language]."</option>";

                    $sqlLang = "SELECT * FROM language";
                    $resultL = $mysqli->query($sqlLang);
                    if ($resultL->num_rows > 0) {
                      // output data of each row
                      while($row = $resultL->fetch_assoc()) {
                        echo "<option>" . $row['language'] . "</option>";
                      }
                    }

                    $btnId = isset($_GET['id']) ? $_GET['id'] : '';
                    $sql = "SELECT * FROM $table_name WHERE $id_no='$btnId'";
                    $result = $mysqli->query($sql);
                    $row = $result->fetch_array();
                    echo "</select>
                          </div>
                          <div class='form-group'>
                            <label for='category'>".$lang['home_modal_Category']."</label>
                            <select type='text' name='category' id='category' class='form-control'>
                              <option selected>".$row[$category]."</option>";

                    $sqlCat = "SELECT * FROM category";
                    $resultC = $mysqli->query($sqlCat);
                    if ($resultC->num_rows > 0) {
                      // output data of each row
                      while($row = $resultC->fetch_assoc()) {
                        echo "<option>" . $row['category'] . "</option>";
                      }
                    }

                    $btnId = isset($_GET['id']) ? $_GET['id'] : '';
                    $sql = "SELECT * FROM $table_name WHERE $id_no='$btnId'";
                    $result = $mysqli->query($sql);
                    $row = $result->fetch_array();

                    if ($row[$read]=="Yes") {
                      $TrueRead = $lang['yes'];
                    } else {$TrueRead = $lang['no'];}

                    if ($row[$lend]=="Yes") {
                      $TrueLend = $lang['yes'];
                    } else {$TrueLend = $lang['no'];}

                    echo "</select>
                          </div>
                          <div class='form-group'>
                            <label for='read'>".$lang['home_modal_Read']."</label>
                            <select type='text' name='read' id='read' class='form-control'>
                              <option value='".$row[$read]."' selected>".$TrueRead."</option>
                              <option value='No'>".$lang['no']."</option>
                              <option value='Yes'>".$lang['yes']."</option>
                            </select>
                          </div>
                          <div class='form-group'>
                            <label for='lend'>".$lang['home_modal_Lend']."</label>
                            <select type='text' name='lend' id='lend' class='form-control'>
                              <option value='".$row[$lend]."' selected>".$TrueLend."</option>
                              <option value='No'>".$lang['no']."</option>
                              <option value='Yes'>".$lang['yes']."</option>
                            </select>
                          </div>
                          <div class='form-group'>
                            <label for='lend_to'>".$lang['home_modal_LendTo']."</label>
                            <input name='lend_to' type='text' class='form-control' id='lend_to' value='".$row[$lend_to]."'>
                          </div>

                          <button name='save' id='save' type='submit' class='btn btn-primary col-md-3 pull-right'>".$lang['home_modal_Update']."</button>
                          <button name='delete' id='delete' type='submit' class='btn btn-danger col-md-3 pull-left'>".$lang['home_modal_Delete']."</button>";
                  ?>
                </form>
              </div>
              <div class="modal-footer">
                
              </div>
            </div>
          </div>
        </div>

        <a id="back-to-top" href="#" class="btn btn-secondary btn-lg back-to-top" role="button" title="<?php echo $lang['home_BackToTop'] ?>" data-toggle="tooltip" data-placement="left"><img class="button-image" src="images/top.png"></a>

        <!-- Script to filter table data by typing in SearchBar -->
        <script>
          function myFunction() {
            var input, filter, table, tr, td, i, searchSelect, strUser;

            searchSelect = document.getElementById("searchSelection");
            strUser = searchSelect.options[searchSelect.selectedIndex].value;

            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            if(strUser == "Name"){
              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }       
              }
            }

            else {
              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }       
              }
            }
            
            var totalRowCount, rowCount, message;
            totalRowCount = $("#myTable tr:visible").length - 1;
            //rowCount = $("#myTable td").closest("tr").length;
            message = "Count: " + totalRowCount;
            document.getElementById("count").innerHTML = message;
          }
        </script>

        <!-- Script to show the total count of rows -->
         <script type="text/javascript">
             $(function () {
                var totalRowCount, rowCount, message;
                totalRowCount = $("#myTable tr:visible").length - 1;
                //rowCount = $("#myTable td").closest("tr").length;
                message = "Count: " + totalRowCount;
                document.getElementById("count").innerHTML = message;
              });
          </script>

          <script>
              function addFilter(){
                var totalRowCount, rowCount, message;
                totalRowCount = $("#myTable tr:visible").length - 1;
                //rowCount = $("#myTable td").closest("tr").length;
                message = "Count: " + totalRowCount;
                document.getElementById("count").innerHTML = message;
              }
          </script>

      </div>

      <?php $mysqli->close(); ?>

    </body>
</html>