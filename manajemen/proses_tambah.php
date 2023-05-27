<?php
include "koneksi.php";

$target_dir = "../assets/images/upload/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = true;
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

$name = $_POST['name'];
$isbn = $_POST['isbn'];
$category = $_POST['category'];
$language = $_POST['language'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$imageName = $_FILES["image"]["name"];
$authorName = $_POST["author_name"];
$publisherName = $_POST["publisher_name"];

// Insert the author into the author table
$insertAuthorQuery = "INSERT INTO author (author_name) VALUES ('$authorName')";
mysqli_query($conn, $insertAuthorQuery);

// Get the inserted author_id
$authorId = mysqli_insert_id($conn);

// Insert the book into the book table
$insertBookQuery = "INSERT INTO book (name, isbn, category_id, language, price, stock, image, publisher_id, author_id) VALUES ('$name', '$isbn', '$category', '$language', '$price', '$stock', '$imageName', '$publisherName', '$authorId')";
mysqli_query($conn, $insertBookQuery);

// Check for errors
if (mysqli_error($conn)) {
    echo "Error: " . mysqli_error($conn);
    exit();
}

header("Location:index.php");
?>
