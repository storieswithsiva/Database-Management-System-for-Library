<?php
include_once 'psl-config.php'; 
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

$table_name = TABLE;

$id_no = ID;
$isbn_no = ISBN;
$name = NAME;
$author = AUTHOR;
$publisher = PUBLISHER;
$print_date = PRINT_DATE;
$date_received = DATE_RECEIVED;
$volume = VOLUME;
$language = LANGUAGE;
$category = CATEGORY;
$read = READ;
$lend = LEND;
$lend_to = LEND_TO;

// If you try it on a real server than you might be add to the start of this link your url of your website
$link_getSqlQuery_id = "index.php?id=";
$link_register_en = "register.php?lang=en";
$link_register_tr = "register.php?lang=tr";
$link_register_de = "register.php?lang=de";
$link_download_en = "downloadExcel.php?lang=en";
$link_download_tr = "downloadExcel.php?lang=tr";
$link_download_de = "downloadExcel.php?lang=de";

// Displays Turkish letters
mysqli_select_db($mysqli, DATABASE);
mysqli_query($mysqli, "SET NAMES UTF8");