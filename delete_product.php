<?php
include ("db_connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "hi";
    
    $stmt = $conn->prepare("DELETE FROM product WHERE product_id=?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
    