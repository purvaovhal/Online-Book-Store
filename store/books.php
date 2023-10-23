<?php
  session_start();
  $count = 0;
  // connect to database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT book_isbn, book_image, book_title FROM books";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $title = "Full Catalog of Books";
  require_once "./template/header.php";
?>

<style>
      body {
    background-image: url("try101.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    color:white;
  }

  .container {
    margin-top: 20px;
  }

  .card {
    height: 100%;
    transition: transform 0.3s;
  }

  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  }

  .card-img-top {
    height: 250px;
    object-fit: cover;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
  }

  .card-body {
    display: flex;
    flex-direction: column;
  }

  .card-title {
    margin-top: 10px;
    margin-bottom: 0;
    font-weight: bold;
    text-align: center;
  }

  .text-center {
    text-align: center;
  }

  .navbar {
    min-height: 50px;
  }
  
  .card-content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
  }
  h2{
    margin-bottom: 38px;
  font-size: 28px;
  font-weight: bold;
  color: #adaaa5;
  text-align: center;
  margin-top: 20px;
  text-transform: uppercase;
  letter-spacing: 1px;
}
  
  .row{
    margin-bottom: 31px;
  }
  .card-title{
    font-size: 16px;
    color: #d6ded5;
  }
</style>

<div class="container">
  <h2 class="text-center mb-4" >Full Catalog of Books</h2>
  <div class="row">
    <?php while ($query_row = mysqli_fetch_assoc($result)) { ?>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card mb-4">
          <a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>">
            <div class="card-content">
              <img class="card-img-top" src="./bootstrap/img/<?php echo $query_row['book_image']; ?>" alt="Book Image">
              <h5 class="card-title"><?php echo $query_row['book_title']; ?></h5>
            </div>
          </a>
        </div>
      </div>
    <?php
      $count++;
      if ($count % 4 === 0) {
        echo '</div><div class="row">';
      }
      if ($count >= 20) {
        $count = 0;
        break;
      }
    } ?>
  </div>
</div>

<?php
  if(isset($conn)) { mysqli_close($conn); }
  require_once "./template/footer.php";
?>
