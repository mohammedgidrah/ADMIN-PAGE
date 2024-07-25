<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['product_id'];
    $title = $_POST['product_name'];
    $description = $_POST['product_description'];
    $price = $_POST['product_price'];
    $rating = $_POST['product_rating'];
    $stock = $_POST['stock'];

    $stmt = $conn->prepare("UPDATE product SET product_name=?, product_description=?, product_price=?,product_rating=?,stock=? WHERE product_id=?");
    $stmt->bind_param("ssissi", $title, $description, $price, $rating,$stock,$id);
    // $stmt->execute();


    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
