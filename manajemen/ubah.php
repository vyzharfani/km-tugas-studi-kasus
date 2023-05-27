<?php
include "koneksi.php";

$id = $_GET["id"];

// Fetch book details and associated author name
$result = mysqli_query($conn, "SELECT b.*, a.author_name FROM book b INNER JOIN author a ON b.author_id = a.id WHERE b.id = '$id'");
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$isbn = $row['isbn'];
$category = $row['category_id'];
$language = $row['language'];
$price = $row['price'];
$stock = $row['stock'];
$image = $row['image'];
$authorName = $row['author_name'];
$publisherName = $row['publisher_id']

?>
<!DOCTYPE html>
<html>
<head>
<title>Ubah Buku</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet"/>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="https://www.w3schools.com/howto/img_avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Ievy</strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-table fa-fw"></i>  DataTables</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-table"></i> Ubah Buku</b></h5>
  </header>

  <div class="w3-container">
  <form action="proses_ubah.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data" id="ubah">
        <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name ="name"  class="form-control" value="<?php echo $name ?>">
                  </div>
                  <div class="form-group">
                    <label for="ISBN">ISBN</label>
                    <input type="text" name ="isbn"  class="form-control" value="<?php echo $isbn ?>">
                  </div>
                  <div class="form-group">
                    <label for="author_name">Author</label>
                    <input type="text" name="author_name" class="form-control" value="<?php echo $authorName ?>">
                  </div>
                  <div class="form-group">
                    <label>Publisher</label>
                    <select name="publisher_name" class="form-control">
                      <option value="">Default</option>
                      <option value="1" <?php if ($publisherName == '1') echo 'selected'; ?>>Yen Press</option>
                      <option value="2" <?php if ($publisherName == '2') echo 'selected'; ?>>J-Novel Club</option>
                      <option value="3" <?php if ($publisherName == '3') echo 'selected'; ?>>Seven Seas</option>
                      <option value="4" <?php if ($publisherName == '4') echo 'selected'; ?>>Penerbit Haru</option>
                      <option value="5" <?php if ($publisherName == '5') echo 'selected'; ?>>Elex Media Komputindo</option>
                      <option value="6" <?php if ($publisherName == '6') echo 'selected'; ?>>m&c!</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control">
                    <option value="">Default</option>
                    <option value="1" <?php if ($category == '1') echo 'selected'; ?>>Novel</option>
                      <option value="2" <?php if ($category == '2') echo 'selected'; ?>>Comic</option>
                      <option value="3" <?php if ($category == '3') echo 'selected'; ?>>Non-fiction</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Language</label>
                    <select  name="language" class="form-control">
                      <option value="">Default</option>
                      <option value="English" <?php if ($language == 'English') echo 'selected'; ?>>English</option>
                      <option value="Indonesian" <?php if ($language == 'Indonesian') echo 'selected'; ?>>Indonesian</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name ="price"  class="form-control" value="<?php echo $price ?>">
                  </div>
                  <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name ="stock"  class="form-control" value="<?php echo $stock ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input  name="image" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile"><?php echo $image ?></label>
                      </div>
                    </div>
                  </div>

                </div>
                <button type="submit" class="btn btn-primary mt-2 mb-2">Ubah</button>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 bg-dark">
    <p class="text-white">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" style="color:#FFF">w3.css</a></p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>
<script>

$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      form.submit();
    }
  });
  $('#ubah').validate({
    rules: {
      name: {
        required: true,
      },
      isbn: {
        required: true,
      },
      author_name: {
        required: true,
      },
      publisher_name: {
        required: true,
      },
      category: {
        required: true
      },
      language: {
        required: true
      },
      price: {
        required: true,
      },
      stock: {
        required: true,
      },
      image: {
        required: true
      },
    },
    messages: {
      name: {
        required: "Please enter the title",
      },
      isbn: {
        required: "Please enter the ISBN",
      },
      author_name: {
        required: "Please enter the author's name",
      },
      publisher_name: {
        required: "Please enter the publisher's name",
      },
      category: {
        required: "Please enter the category",
      },
      language: {
        required: "Please enter the languange",
      },
      price: {
        required: "Please enter the price",
      },
      stock: {
        required: "Please enter the number of stock",
      },
      image: {
        required: "Please upload cover image",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});

/*function displayFileName(input) {
  var label = document.querySelector('.custom-file-label');
  label.textContent = input.files[0].name;
}*/
</script>

</body>
</html>
