<?php 
session_start();
include("../mysql/connect.php");

if (!isset($_SESSION["login"])) {
     $_SESSION['message'] = "Erişim için giriş yapınız!";
     header("Location: ../mysql/login.php");
     exit(0);
 }
 else {
     if ($_SESSION['role'] == "0") {
         $_SESSION['message'] = "Yetkiniz bulunmamaktadır!";
         header("Location: ../mysql/login.php");
         exit(0);
     }
 }                                

?>