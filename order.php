<?php
require_once 'src/products/ProductRepository.php';
$product = ProductRepository::getById($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Shop</title>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="orderlist.php">Orders</a>
        </li>
        </ul>
    </div>
    </nav>
    <main role="main" class="container">
        <p style="font-size:200%">
            <?= $product->getName() ?>
        </p>
        <p style="font-size:140%">
            <?= $product->getDetails() ?>
        </p>

        <form method="post" action="createOrder.php">
            <div class="form-group">
                <label for="Name">Name</label>
                <input class="form-control" id="Name" name="Name" placeholder="Jonas Jonaitis">
            </div>
            <div class="form-group">
                <label for="Name">Quantity</label>
                <input class="form-control" name="Quantity"  id="Quantity" placeholder="" type="number">
            </div>
            <input style="display: none" name="ProductId" value="<?= $product->getId() ?>">
            <button type="submit" class="btn btn-primary mb-2">Confirm</button>
        </form>
    </main>
</body>
