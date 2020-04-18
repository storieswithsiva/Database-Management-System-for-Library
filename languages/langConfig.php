<?php

    // Gets the country code from the ip adress
    include_once 'geoplugin.php';

    // To have a multilingual page
    // Chcking if country code is available
    if (!isset($_SESSION['lang'])){
        if (ip_info("Visitor", "Country Code") == "TR"){
            $_SESSION['lang'] = "tr";
        }
        elseif (ip_info("Visitor", "Country Code") == "DE") {
            $_SESSION['lang'] = "de";
        }
        // If country code not available set default language
        else {$_SESSION['lang'] = "en";}
        
    }

    // Changing language with button click
    else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])){
        if ($_GET['lang'] == "tr"){
            $_SESSION['lang'] = "tr";
        }
        else if ($_GET['lang'] == "de"){
            $_SESSION['lang'] = "de";
        }
        else if ($_GET['lang'] == "en"){
            $_SESSION['lang'] = "en";
        }
    }

    require_once $_SESSION['lang'] . ".php";
?>
