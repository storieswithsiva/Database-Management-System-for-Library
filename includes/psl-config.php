<?php
/* 
	Settings to change
 */
	
define("HOST", "localhost");     // Host to connect
define("USER", "root");    // Database Username
define("PASSWORD", "");    // Database Password
define("DATABASE", "library");    // Name of Database

define("TABLE", "books");    // Name od the Table

// Columns of the Table
define("ID", "id");    // Columnname
define("ISBN", "ISBN");    // Columnname
define("NAME", "Name");    // Columnname
define("AUTHOR", "Author");    // Columnname
define("PUBLISHER", "Publisher");    // Columnname
define("PRINT_DATE", "Print_Date");    // Columnname
define("DATE_RECEIVED", "Date_Received");    // Columnname
define("VOLUME", "Volume");    // Columnname
define("LANGUAGE", "Language");    // Columnname
define("CATEGORY", "Category");    // Columnname
define("READ", "IsRead");    // Columnname
define("LEND", "Lend");    // Columnname
define("LEND_TO", "Lend_To");    // Columnname
 
define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");
 
define("SECURE", FALSE);    // Just for the Developement!
