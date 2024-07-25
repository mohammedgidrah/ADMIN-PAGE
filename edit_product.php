<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/ADMIN-PAGE/css/theme.css">
</head>
<body>
    
</body>
<?php
include 'db_connection.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $result = $conn->query("SELECT * FROM product WHERE product_id=$id");
    $product = $result->fetch_assoc();
}
?>

<div class="page-container">

    <div class="main-content">

        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-15">
                    <div class="card">
                        <div class="card-header">edit product</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">edit product information</h3>
                            </div>
                            <form action="add_product.php" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <input id="cc-pament" name="id" type="hidden" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $product['product_id']; ?>" />
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">product name</label>
                                    <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $product['product_name']; ?>" />
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">product description</label>
                                    <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $product['product_description']; ?>" />
                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                </div>
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">product price</label>
                                    <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="<?php echo $product['product_price']; ?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number"  />
                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                </div>

                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">submit</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>



    <!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit product</title>
    <link rel="stylesheet" href="/ADMIN-PAGE/css/theme.css">

</head>
<body>
    <h1>Edit product</h1>

    <form action="index.php" method="POST">
        <input type="hidden" name="id" value="">
        <label for="title">Title:</label>
        <input type="text" name="id" id="title" value="" required>
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>
        
        <input class="update_product" type="submit" value="Update product">
    </form>
</body>
</html> --> 

<?php
// Include database connection file
include 'db_connection.php'; // Adjust the path as needed

// Check if product_id is provided
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Prepare and execute the SQL statement to fetch product details
    $stmt = $conn->prepare("SELECT * FROM product WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Fetch the product details
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        exit;
    }
    
    // Close the statement
    $stmt->close();
} else {
    echo "No product ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>
    <form action="update_product.php" method="post">
        <input type="hidden" name="product_id"  value="<?php echo $product['product_id']; ?>">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" required>
        <br>
        <label for="product_description">Product Description:</label>
        <textarea name="product_description" required><?php echo $product['product_description']; ?></textarea>
        <br>
        <label for="product_price">Product Price:</label>
        <input type="text" name="product_price" value="<?php echo $product['product_price']; ?>" required>
        <br>
        <label for="product_rating">Product Rating:</label>
        <select name="product_rating">
            <option value="Poor" <?php echo $product['product_rating'] == 'Poor' ? 'selected' : ''; ?>>Poor</option>
            <option value="Fair" <?php echo $product['product_rating'] == 'Fair' ? 'selected' : ''; ?>>Fair</option>
            <option value="Good" <?php echo $product['product_rating'] == 'Good' ? 'selected' : ''; ?>>Good</option>
            <option value="Very Good" <?php echo $product['product_rating'] == 'Very Good' ? 'selected' : ''; ?>>Very Good</option>
            <option value="Excellent" <?php echo $product['product_rating'] == 'Excellent' ? 'selected' : ''; ?>>Excellent</option>
        </select>
        <br>
        <label for="stock">Stock Status:</label>
        <select name="stock">
            <option value="In Stock" <?php echo $product['stock'] == 'In Stock' ? 'selected' : ''; ?>>In Stock</option>
            <option value="Out of Stock" <?php echo $product['stock'] == 'Out of Stock' ? 'selected' : ''; ?>>Out of Stock</option>
            <option value="Backordered" <?php echo $product['stock'] == 'Backordered' ? 'selected' : ''; ?>>Backordered</option>
        </select>
        <br>

        <input type="submit" value="Update Product">
    </form>
</body>
</html>

