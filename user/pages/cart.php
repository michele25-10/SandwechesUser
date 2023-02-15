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
  <title>Homepage</title>
</head>

<body>
  <?php require_once(__DIR__ . '\navbar.php'); ?>

  <div class="container fluid" style="padding: 20px;">
    <h2 style="margin-bottom:20px">Carrello:</h2>
    <div class="row">
      <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-8">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 g-1">
          <?php
          include_once dirname(__FILE__) . '/../function/cart.php';

          $id = $_SESSION['user_id'];
          $cart = getCartUser($id);
          ?>
          <?php if ($cart == -1): ?>
            <div class="d-flex justify-content-center">
              <h1 class="text-danger"><b>Non hai prodotti nel Carrello</b></h1>
            </div>
          <?php endif ?>

          <?php if ($cart != -1): ?>
            <?php foreach ($cart as $row): ?>
              <div class="col">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2"
                  style="border-color: orange; border-style: solid; border-radius: 10px; margin-top: 5px">
                  <div class="col" style="padding: 10px; ">
                    <img src="../assets/img/panino.jpeg"></img>
                  </div>
                  <div class="col" style="vertical-align: middle;">
                    <h5><b>prodotto:</b>
                      <?php echo $row['name'] ?>
                    </h5>
                    <h5><b>quantità:</b>
                      <?php echo $row['quantity'] ?>
                    </h5>
                    <h5><b>prezzo:</b>
                      <?php echo $row['price'] ?>€
                      <h5>
                        <form method="post">
                          <button class="btn btn-danger" type="submit">Rimuovi</button>
                        </form>
                        <?php
                        include_once dirname(__FILE__) . '/../function/cart.php';

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                          $_SERVER['REQUEST_METHOD'] = 'GET';
                          $res = deleteProduct($row['product'], $_SESSION['user_id']);

                          if ($res == "-1") {
                            echo ("<p class=" . "text-danger" . ">Errore</p>");
                          } else {
                            header("Refresh:1");
                          }

                        }
                        ?>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-4">
          <h1>Dettagli carrello</h1>
          <hr>
          </hr>
          <div class="row">
            <div class="col-8">
              <h2>Totale:</h2>
            </div>
            <div class="col-4">
              <?php
              include_once dirname(__FILE__) . '/../function/cart.php';

              $price = getPrice($_SESSION['user_id']);
              $total = $price[0]->price;
              if (!empty($total)) {
                echo ("<h2><b>" . $total . "€</h2></b>");
              }
              ?>

            </div>
          </div>
          <hr>
          <div>
            <label for="pickup" class="sr-only mb-2">Punto di consegna</label>
            <?php
            include_once dirname(__FILE__) . '/../function/order.php';

            $pick_arr = getPickup();
            ?>
            <?php if ($pick_arr != -1): ?>
              <select class="form-select" name="pickup" id="inputGroupSelect02">
                <option selected value="" disabled>Tutti i punti</option>
                <?php foreach ($pick_arr as $row): ?>
                  <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                <?php endforeach ?>
              </select>
            <?php endif ?>
            <label for="break" class="sr-only mb-2">Orario</label>

            <select class="form-select" name="break" id="inputGroupSelect02">
              <option selected value="" disabled>Tutte le categorie</option>
              <?php foreach ($tag_arr as $row): ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="row">
            <a href="order.php">
              <button class="btn btn-lg btn-success" id="ordina">Ordina ora!</button>
            </a>
          </div>
        </div>
      </div>
    <?php endif ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>


<style>
  hr {
    border: 1;
    height: 2px;
    background-color: #CCC;
  }

  label {
    margin-top: 5px;
    font-weight: 500;
  }

  #ordina {
    margin-top: 10px;
  }
</style>