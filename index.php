<?php
session_start();
include("connection.php");
include "funkcije.php";
include("header.php");

$page="";

if(isset($_GET['page'])){
	$page = $_GET['page'];
}



switch($page){
	case "reg":
		include "reg.php";
		break;
	case "author":
		include "author.php";
        break;
    case "contact":
        include "contact.php";
        break;    
    case "about":
        include "about.php";
        break;
    case "shop":
        include "shop.php";
        break;
  
    
    case "user":
        include "user.php";
        break;
    case "admin":
        include "admin.php";
        break;                        
	default:
	    include "home.php";
		break;
}

include("footer.php");

?>