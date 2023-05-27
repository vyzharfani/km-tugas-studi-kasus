<?php include "koneksi.php" ?>
<!DOCTYPE html>
<html>
<head>
<title>Manajemen Toko Buku</title>
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
    <h5><b><i class="fa fa-table"></i> DataTables</b></h5>
  </header>

  <div class="w3-container">
    <a href="tambah.php" class="btn btn-primary m-2">+ADD NEW BOOK</a>

    <table id="book" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>ISBN</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
                  <?php
                  
                    $query = mysqli_query($conn ,"SELECT *, book.id, publisher_name, author_name, category_name FROM book JOIN publisher ON book.publisher_id = publisher.id JOIN author ON book.author_id = author.id JOIN category ON book.category_id = category.id;");
                    $count = mysqli_num_rows($query);
                  
                    if($count>0){ 
                      while($book=mysqli_fetch_array($query)){
                  ?>
                  <tr>
                  <td><?php echo $book['id'];?> </td>
                    <td><?php echo $book['name'];?> </td>
                    <td><?php echo $book['isbn'] ?></td>
                    <td><?php echo $book['author_name'];?> </td>
                    <td><?php echo $book['publisher_name'];?> </td>
                    <td><?php echo $book['category_name'] ?></td>
                    <td><?php echo "IDR ".number_format($book['price'], 0, ',', '.'); ?></td>
                    <td><?php echo $book['stock'] ?></td>
                    <td><a href="ubah.php?id=<?php echo $book["id"]; ?>"> Edit </a> | <a href="proses_hapus.php?id=<?php echo $book["id"]; ?>"> Delete </a></td>
                  </tr>
                  <?php 
                      }
                    }
                  ?>
                  </tbody>
                  <!--<tfoot>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>ISBN</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>-->
    </table>
    
  </div>

  <br>
  
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
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#book').dataTable({
                'pagingType': 'numbers',
                'processing': true,
            });
        });
    </script>

</body>
</html>
