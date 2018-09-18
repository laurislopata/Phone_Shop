<?php

require_once 'src/Database.php';
require_once 'src/products/Product.php';

class ProductRepository {
    static function getAll($col, $order) {
        $sql = "SELECT * FROM `products`";
        $db = Database::connect();
        $sorting = $col !== null
            ? " ORDER BY $col ".($order === 'ASC' ? 'ASC' : 'DESC')
            : "";
        $sql .= $sorting;

        $products = [];
        foreach ($db->query($sql) as $product) {
            $products[] = new Product(
                $product['Price'],
                $product['Quality'],
                $product['Name'],
                $product['id'],
                $product['Details']
            );
        }

        return $products;
    }
    static function getById(int $id) {
        $sql = "SELECT * FROM `products` WHERE `id`=:id;";
        
        $db = Database::connect();
        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $id]);

        $product = $stmt->fetch();

        return new Product(
            $product['Price'],
            $product['Quality'],
            $product['Name'],
            $product['id'],
            $product['Details']
        );
    }
    static function findByName(string $search, ?string $col, ?string $order) {
        $sql = "SELECT * FROM `products` WHERE `Name` LIKE :search";
        $sorting = $col 
            ? " ORDER BY :col :order"
            : "";
        $sql .= $sorting;

        $db = Database::connect();
        $stmt = $db->prepare($sql);      
        $stmt->execute(array_merge([
            'search' => '%'.$search.'%'
        ],
        $col !== null 
        ? [
            'col'=> $col,
            'order'=> $order
        ] : []));

        $products = [];
        foreach ($stmt->fetchAll() as $product) {
            $products[] = new Product(
                $product['Price'],
                $product['Quality'],
                $product['Name'],
                $product['id'],
                $product['Details']
            );
        }
        return $products;
    }
}  
