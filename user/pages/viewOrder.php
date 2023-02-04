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

  <div class="d-flex justify-content-center" style="margin-bottom: 10px; margin-top: 10px; ">
    <?php
    include_once dirname(__FILE__) . '/../function/order.php';
    $status_arr = getStatus();
    ?>
    <?php if ($status_arr != "-1"): ?>
      <form method="post" style="margin: 10px 40px;">
        <div class="input-group mb-3">
          <select class="form-select" name="tag" id="inputGroupSelect02">
            <option selected value="">Tutte le categorie</option>
            <?php foreach ($status_arr as $row): ?>
              <option value="<?php echo $row['id'] ?>"><?php echo $row['description'] ?></option>
            <?php endforeach ?>
          </select>
          <input class="input-group-text btn btn-warning" type="submit" value="Cerca">
        </div>
      </form>
    <?php endif ?>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>