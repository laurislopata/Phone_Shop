<?php
require_once 'src/products/ProductRepository.php'
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
        <div class="my-3 p-3 bg-white rounded box-shadow">
            <form action="index.php">
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
                <?php
                $sort = array_key_exists('sort', $_GET) ? $_GET['sort'] : null;
                $order = array_key_exists('order', $_GET) ? $_GET['order'] : null;
                $search = array_key_exists('search', $_GET) ? $_GET['search'] : null;  

                foreach (['Name', 'Price', 'Quality'] as $col) {
                ?>
                    <th 
                   
                        onclick="location.href = `index.php?sort=<?= $col ?><?=$search!==null? '&search='.$search:null ?>&order=<?= $col === $sort ? ($order === 'DESC' ? 'ASC' : 'DESC') : 'ASC' ?>`;"
                    >
                        <?= $sort === $col
                            ? $order === 'ASC' ? '↓' : '↑'
                            : null ?>
                        <?= $col ?>
                    </th>
                <?php } ?>
                    <th></th>
                </tr>
                <tbody>
                <?php 
                $products = array_key_exists('search', $_GET) 
                    ? ProductRepository::findByName($_GET['search'], $sort, $order)
                    : ProductRepository::getAll($sort, $order);

                foreach ($products as $product) { ?>
                    <tr>
                    <td><?= $product->getName() ?></td>
                    <td><?= $product->getPrice() ?></td>
                    <td><?= $product->getQuality() ?></td>
                    <td style="width: 10%">
                        <a class="btn btn-primary" href="order.php?id=<?=$product->getId()?>">
                            Order
                        </a>
                    </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
    <!-- <script>
        const columns = document.getElementsByClassName("table-head");
        for (col of columns) {
                console.log(col);
            col.addEventListener('click', () => {
                // location.href = `index.php?sort=${col.dataset.name}&order=${col.dataset.order || 'ASC'}`;
            }
            );
        }
    </script> -->
</body>
</html>


