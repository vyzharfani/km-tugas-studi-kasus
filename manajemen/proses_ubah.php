<?php
include "koneksi.php";

$id = $_GET["id"];

$name = $_POST['name'];
$isbn = $_POST['isbn'];
$category = $_POST['category'];
$language = $_POST['language'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$authorName = $_POST["author_name"];
$publisherName = $_POST["publisher_name"];

// Get the author_id based on the author_name
$authorQuery = "SELECT id FROM author WHERE author_name = '$authorName'";
$result = mysqli_query($conn, $authorQuery);
$row = mysqli_fetch_assoc($result);
$authorId = $row['id'];

// Update the book table with the new values
$updateBookQuery = "UPDATE book SET name = '$name', isbn = '$isbn', category_id = '$category', language = '$language', price = '$price', stock = '$stock', author_id = '$authorId', publisher_id = '$publisherName'";

// Check if a new image is uploaded
if ($_FILES["image"]["name"]) {
    $target_dir = "../assets/images/upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = true;
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $imageName = $_FILES["image"]["name"];
    $updateBookQuery .= ", image='$imageName'";
}

$updateBookQuery .= " WHERE id = $id";
mysqli_query($conn, $updateBookQuery);

// Check for errors
if (mysqli_error($conn)) {
    echo "Error: " . mysqli_error($conn);
    exit();
}

header("Location:index.php");
?>