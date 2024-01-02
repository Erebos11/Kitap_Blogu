<?php 
require "connect.php";
session_start();
if (isset($_POST["logout"])) {
    unset($_SESSION["login"]);
    unset($_SESSION["role"]);
    unset($_SESSION["username"]);

    $_SESSION['message'] = "Başarılı bir şekilde çıkış yapılmıştır.";
    header("Location: ../anasayfa/index.php");
    exit(0);
}
?>