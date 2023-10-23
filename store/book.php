<?php
  session_start();
  $book_isbn = $_GET['bookisbn'];
  // connect to the database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT * FROM books WHERE book_isbn = '$book_isbn'";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if (!$row) {
    echo "Empty book";
    exit;
  }

  $title = $row['book_title'];
  require "./template/header.php";
?>

<style>
    body {
    background-image: url("try101.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    color:white;
  }
  h4 {
    font-size: 35px;
    color:#6ec19f;
  }
  h2{
    color:#38aea8;
  }
  .description {
    font-size: 18px;
    margin-bottom: 20px; /* Adjust the margin-bottom value as needed */
  }
  .book-details-table {
    width: 100%;
    margin-bottom: 20px;
    border: 1px solid #dee2e6;
    border-collapse: collapse;
  }

  .book-details-table td {
    padding: 10px;
    border: 1px solid #dee2e6;
  }
  th{
    text-align:center;
  }
  .bottom{
    margin-bottom:30px;
  }
  button{
    color:Black;
  }
  
 
</style>

<div class="container ">
  <div class="row justify-content-center">
    <div class="col-md-12 text-center">
      <h2 class="page-heading"><?php echo $row['book_title']; ?></h2>
      <hr>
    </div>
  </div>
  
  <div class="container bottom col-xxl-12 col-xl-12 col-sm-12 col-md-12 col-lg-12 col-12">
    <div class="text-center">
      <img class="img-responsive img-thumbnail bottom" src="./bootstrap/img/<?php echo $row['book_image']; ?>" style="margin: 0 auto;">
    </div>
  </div>

  <div class="row justify-content-center col-xxl-12 col-xl-12 col-sm-12 col-md-12 col-lg-12 col-12">
    <div class="margin col-md-9 offset-md-3 text-center">
      <h4 class="mb-4 text-center" style="margin-left: 324px">Book Description</h4>
      <p class="description bottom" style="margin-left: 324px ;color:#dee5e4"><?php echo $row['book_descr']; ?></p>
      <h4 class="mb-4 text-center" style="margin-left: 324px";>Book Details</h4>
  

      <table class="book-details-table " style="margin-left: 159px">
        <?php foreach ($row as $key => $value) {
          if ($key == "book_descr" || $key == "book_image" || $key == "publisherid" || $key == "book_title") {
            continue;
          }
          switch ($key) {
            case "book_isbn":
              $key = "ISBN";
              break;
            case "book_author":
              $key = "Author";
              break;
            case "book_price":
              $key = "Price";
              break;
          }
        ?>
          <tr>
            <th class="text-align-center"><?php echo $key; ?></th>
            <td><?php echo $value; ?></td>
          </tr>
        <?php
        }
        ?>
      </table>

      <form method="post" action="cart.php">
        <input type="hidden" name="bookisbn" value="<?php echo $book_isbn; ?>">
        <button type="submit" class="btn btn-dark text-dark" style="margin-left: 324px;">Add to Cart</button>
      </form>
    </div>
  </div>
</div>







<?php
  require "./template/footer.php";
?>
