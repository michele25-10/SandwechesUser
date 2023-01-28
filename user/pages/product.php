<?php

session_start();
if (empty($_SESSION['user_id'])) {
  header('location: ../index.php');
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="js/custom.js"></script>
  <title>Product</title>
</head>

<body>
  <?php require_once(__DIR__ . '\navbar.php'); ?>

  <?php
  include_once dirname(__FILE__) . '/../function/product.php';


  $id = $_GET['id'];

  $prod = getProduct($id);

  if ($prod == -1) {
    echo ('
      <div class="d-flex justify-content-center">
        <h1 class="text-danger"><b>Errore, server non risponde</b></h1>
      </div>
    ');
  } ?>
  <?php if ($prod[0]['quantity'] > 0): //serve per visualizzare l'html senza l'eco?>
    <div class="container" style="padding: 20px 10px ">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2">
        <div class="col">
          <img src="../assets/img/panino.jpeg" class="card-img-top" alt="panino">
        </div>
        <div class="col" style="padding: 20px">
          <h1>
            <?php echo $prod[0]['name'] ?>
          </h1>
          <p>
            <?php echo $prod[0]['description'] ?>
          </p>
          <div class="col">
            <h4>
              <?php echo $prod[0]['price'] ?>
            </h4>

            <div class="row">
              <div class="col-6">
                <div class="input-group quantity" style="width: 150px">
                  <div class="input-group-prepend decrement-btn" style="cursor: pointer">
                    <span class="input-group-text text-white" style="background-color: #dc3545">-</span>
                  </div>
                  <input type="text" name="qty" class="qty-input form-control" maxlength="3" max="50" value="1">
                  <div class="input-group-append  increment-btn" style="cursor: pointer">
                    <span class="input-group-text text-white" style="background-color: #28a745">+</span>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <button class="btn btn-success">Carrello</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  <?php endif //ricordatelo?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>