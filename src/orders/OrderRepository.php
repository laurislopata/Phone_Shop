<?php

require_once 'src/Database.php';
require_once 'src/products/ProductRepository.php';
require_once 'src/orders/Order.php';

class OrderRepository {
    static function getAll() {
        $sql = "SELECT * FROM orders;";
        $db = Database::connect();

        $orders = [];
        foreach ($db->query($sql) as $order) {
            $orders[] = new Order(
                $order['Price'],
                $order['ProductId'] !== null
                    ? ProductRepository::getById($order['ProductId'])
                    : null,
                $order['Quantity'],
                $order['Name'],
                $order['id']
            );
        }

        return $orders;
    }
    static function getById($id) {
        $sql = "SELECT * FROM orders WHERE id=:id;";

        $db = Database::connect();
        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $id]);

        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return new Order(
            $order['Price'],
            $order['ProductId']
                ? ProductRepository::getById($order['ProductId'])
                : null,
            $order['Quantity'],
            $order['Name'],
            $order['id']
        );

    }
    static function findByName(string $search) {
        $sql = "SELECT * FROM `orders` WHERE `Name` LIKE :search";

        $db = Database::connect();
        $stmt = $db->prepare($sql);
        $stmt->execute(['search' => '%'.$search.'%']);
        $orders = [];
        foreach ($stmt->fetchAll() as $order) {
            $orders[] = new Order(
                $order['Price'],
                $order['ProductId'] !== null
                    ? ProductRepository::getById($order['ProductId'])
                    : null,
                $order['Quantity'],
                $order['Name'],
                $order['id']
            );
        }

        return $orders;
} }
