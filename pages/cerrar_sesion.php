<?php

 $roles = $_SESSION ['roles'];
 switch ($roles) {
   case $roles==1:
     session_start();
     session_unset();
     session_destroy();
     header("Location: ../index.php");
     break;
     case $roles==2:
      session_start();
      session_unset();
      session_destroy();
      header("Location: ../index.php");
      break;
   default:
     echo "error de registro";
     break;
 }
 
   session_start();
   session_unset();
   session_destroy();
   header("Location: ../index.php");
?>