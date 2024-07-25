<?php
include 'db_connection.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['cc-payment'];
    $description = $_POST['cc-name'];
    $price = $_POST['cc-number'];

    $stmt = $conn->prepare("INSERT INTO product (product_name, product_description, product_price) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $title, $description, $price);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit(); 
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

?>
