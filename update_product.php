<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['product_id'];
    $title = $_POST['product_name'];
    $description = $_POST['product_description'];
    $price = $_POST['product_price'];
    $stock = $_POST['stock'];

    $stmt = $conn->prepare("UPDATE product SET product_name=?, product_description=?, product_price=?,stock=? WHERE product_id=?");
    $stmt->bind_param("ssisi", $title, $description, $price,$stock,$id);
    // $stmt->execute();


    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
