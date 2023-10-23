
<?php
session_start();
$count = 0;
// Connect to the database

$title = "Index";
require_once "./template/header.php";
require_once "./functions/database_functions.php";
$conn = db_connect();
$row = select4LatestBook($conn);
?>


<style>
  body {
    background-image: url("try101.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
  }
  .text-white{
    color: rgb(229, 236, 234);
  }
  
</style>


<!-- Example row of columns -->
<div class="container">
<h2 class="text-center my-4" style="font-family: 'Arial Black', sans-serif; font-size: 2.5rem; font-weight: 800; color: #928e8e; text-transform: uppercase; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); margin-bottom: 30px;">Latest Books</h2>
  <style>
    .card {
      margin-bottom: 60px; /* Adjust the value as desired */
    }
  </style>
  <div class="row">
    <?php foreach ($row as $book) { ?>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card h-100 shadow border border-dark text-center">
          <a href="book.php?bookisbn=<?php echo $book['book_isbn']; ?>">
            <img class="card-img-top img-fluid" src="./bootstrap/img/<?php echo $book['book_image']; ?>" alt="Book Image">
          </a>
          <div class="card-body p-3">
            <h5 class="card-title  text-center mt-3 mb-0 text-white"  style="font-size:2rem; font-weight: bold; margin-bottom: 10px;"><?php echo $book['book_title']; ?></h5>
            <p class="card-text text-muted text-white"><?php echo $book['book_author']; ?></p>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php
if (isset($conn)) {
  mysqli_close($conn);
}
require_once "./template/footer.php";
?>
