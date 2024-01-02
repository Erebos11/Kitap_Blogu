<?php 
$conn = mysqli_connect("localhost", "root","","users");

if (!$conn) {
    die("Bağlantı Kurulamadı: ". mysqli_connect_error());
}
?>