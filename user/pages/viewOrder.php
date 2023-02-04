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
          <select class="form-select" name="status" id="inputGroupSelect02">
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

  <div class="container-fluid" style="padding:10px">
    <table class="table">
      <thead>
        <tr class="table table-dark">
          <th scope="col">ID</th>
          <th scope="col">Punto di consegna</th>
          <th scope="col">Orario</th>
          <th scope="col">Stato</th>
        </tr>
      </thead>

      <?php
      include_once dirname(__FILE__) . '/../function/order.php';

      if ($_SERVER['REQUEST_METHOD'] != 'POST' || ($_SERVER['REQUEST_METHOD'] != 'POST' && $_POST['status'] == "")) {
        $order = getOrder($_SESSION['user_id']);
        ?>
        <?php if ($order != -1): ?>
          <?php foreach ($order as $row): ?>
            <tbody>
              <tr>
                <th scope="row">
                  <?php echo ($row['id']) ?>
                </th>
                <td>
                  <?php echo ($row['pickup']) ?>
                </td>
                <td>
                  <?php echo ($row['break']) ?>
                </td>
                <td>
                  <?php echo ($row['status']) ?>
                </td>
              </tr>
            </tbody>
          </table>
        <?php endforeach ?>
      <?php endif ?>
      <?php
      }
      ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>