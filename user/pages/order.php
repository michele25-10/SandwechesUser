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

  <div class="container-fluid">
    <form class="form" method="post">
      <div class="row">
        <div class="col-7 mx-auto">
          <img class="mb-4" src="assets/img/logo.png" alt="" width="100%" height="">
        </div>
      </div>
      <h1 class="h3 mb-3 fw-bold">I dati del tuo ordine</h1>
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
      <div class="row" style="margin-top: 10px; ">
        <button class="btn btn-lg btn-success btn-block mx-auto" type="submit">Conferma Ordine</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>

<style>
  html,
  body {
    height: 100%;
  }


  .form {
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
  }

  .form .checkbox {
    font-weight: 400;
  }

  .form .form-control {
    position: relative;
    box-sizing: border-box;
    height: auto;
    padding: 10px;
    font-size: 16px;
  }

  .form-order .form-control:focus {
    z-index: 2;
  }
</style>