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
        include_once dirname(__FILE__) . '/../function/product.php';
        $tag_arr = getTag();
        ?>
        <?php if ($tag_arr != "-1"): ?>
            <form method="post" style="margin: 10px 40px;">
                <div class="input-group mb-3">
                    <select class="form-select" id="inputGroupSelect02">
                        <option selected>Tutte le categorie</option>
                        <?php foreach ($tag_arr as $row): ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <label class="input-group-text btn btn-warning" for="inputGroupSelect02" type="submit">Cerca</label>
                </div>
            </form>
        <?php endif ?>
    </div>

    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
            <?php
            include_once dirname(__FILE__) . '/../function/product.php';

            $prod_arr = getArchiveProduct();

            if ($prod_arr != -1) {
                foreach ($prod_arr as $row) {
                    echo ('
            <div class="col">
            <div class="card">
                <img src="../assets/img/panino.jpeg" class="card-img-top" alt="panino">
                <div class="card-body">
                    <h5 class="card-title">' . $row['name'] . '</h5>
                    <h4>' . $row['Price'] . '</h4>
                    <a href="product.php?id=' . $row['ID'] . '">
                    <button class="btn btn-warning">Visualizza</button>
                    </a>
                </div>
            </div>
        </div>
            ');
                }
            }
            ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>