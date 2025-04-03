<?php
session_start();
include('server.php');

$products = [
    [
        'name' => 'บอนนาน่า ชีส',
        'price' => 150,
        'description' => 'บอนนาน่า ชีส M ',
        'cost' => 100,
        'user_id' => 1
    ],
    [
        'name' => 'บอนนาน่า นูเทลล่าชีส',
        'price' => 150,
        'description' => 'บอนนาน่า นูเทลล่าชีส M ',
        'cost' => 100,
        'user_id' => 1
    ]
];

// เพิ่มข้อมูลสินค้า
foreach ($products as $product) {
    $stmt = $conn->prepare("INSERT INTO product (Name_Product, Price, Description, Cost_Product, User_ID) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsi", $product['name'], $product['price'], $product['description'], $product['cost'], $product['user_id']);
    $stmt->execute();
}

echo "Products added successfully!";
$stmt->close();
?>
