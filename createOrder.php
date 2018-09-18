<?php
require_once 'src/Database.php';
require_once 'src/products/ProductRepository.php';

$sql = "INSERT INTO orders (`ProductId`, `Price`, `Name`, `Quantity`) VALUES (:product, :price, :name, :quantity)";
$db = Database::connect();
$stmt = $db->prepare($sql);

$product = ProductRepository::getById($_POST['ProductId']);
$stmt->execute([
    'price' => $product->getPrice() * $_POST['Quantity'],
    'name' => $_POST['Name'],
    'quantity' => $_POST['Quantity'],
    'product' => $product->getId()
]);

header('Location: '.'index.php');
?>
