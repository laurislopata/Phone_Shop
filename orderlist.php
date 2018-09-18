<?php
require_once 'src/orders/OrderRepository.php'
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
        <li class="nav-item">
            <a class="nav-link" href="index.php">Products</a>
        </li>
        
        <li class="nav-item active">
            <a class="nav-link" href="orderlist.php">Orders</a>
        </li>
        
        </ul>
    </div>
    </nav>
    <main role="main" class="container">
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <form action="orderlist.php">
                <div class="input-group mb-3">
                    <input type="search" class="form-control" placeholder="Search" aria-describedby="button-addon2" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>OrderId</th>
                    <th>Product Name</th>
                    <th>Customer</th>
                    <th style="text-align: right">Price</th>
                    <th style="text-align: right">Quantity</th>
                                    
                </tr>
                <tbody>
                <?php 
                $orders = array_key_exists('search', $_GET) 
                    ? OrderRepository::findByName($_GET['search'])
                    : OrderRepository::getAll();
                
                foreach($orders as $order) { ?>
                    <tr>
                    <td><?= $order->getId() ?></td>
                    <td><?= $order->getProduct()->getName() ?></td>
                    <td><?= $order->getName() ?></td>
                    <td style="text-align: right"><?= $order->getPrice() ?></td>
                    <td style="text-align: right"><?= $order->getQuantity() ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
