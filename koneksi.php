<?php 

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {


$koneksi = mysqli_connect("localhost", "root", "", $_SESSION['user_name']);
}

?>