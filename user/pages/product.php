<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">
  <title>Homepage</title>
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
  }
  if($prod[0]['quantity']>0){
    echo ('
      <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2">
      <div class="col">
          <img src="../assets/img/panino.jpeg" class="card-img-top" alt="panino">
      </div>
      <div class="col">
        <h1>'.$prod[0]['name'].'</h1>
        <p>'.$prod[0]['description'].'</p>
        <h4>'.$prod[0]['price'].'</h4>
        <button class="btn btn-success">Carrello</button>
      </div>
    </div>
  </div>
      ');
  }
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>