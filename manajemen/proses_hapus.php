<?php
include_once("koneksi.php");

$id = $_GET["id"];

$result = mysqli_query($conn, "DELETE FROM book WHERE id='$id';");

error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Location:index.php");
?>