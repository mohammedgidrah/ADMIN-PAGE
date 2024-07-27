<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM product WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        exit;
    }

    $stmt->close();
} else {
    echo "No product ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <title>Edit Product</title>
</head>

<body>
  

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
                                <form action="update_product.php" method="post" novalidate="novalidate">
                                    <div class="form-group">
                                        <input id="cc-pament" name="product_id" type="hidden" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $product['product_id']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">product name</label>
                                        <input id="cc-pament" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?php echo $product['product_name']; ?>" />
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">product description</label>
                                        <input id="cc-name" name="product_description" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="<?php echo $product['product_description']; ?>" />
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-number" class="control-label mb-1">product price</label>
                                        <input id="cc-number" name="product_price" type="tel" class="form-control cc-number identified visa" value="<?php echo $product['product_price']; ?>" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" />
                                        <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                    </div>
                                    <!-- <label for="product_rating">Product Rating:</label>
                                    <div class="form-group">

                                        <select name="product_rating">
                                            <option value="Poor" <?php echo $product['product_rating'] == 'Poor' ? 'selected' : ''; ?>>Poor</option>
                                            <option value="Fair" <?php echo $product['product_rating'] == 'Fair' ? 'selected' : ''; ?>>Fair</option>
                                            <option value="Good" <?php echo $product['product_rating'] == 'Good' ? 'selected' : ''; ?>>Good</option>
                                            <option value="Very Good" <?php echo $product['product_rating'] == 'Very Good' ? 'selected' : ''; ?>>Very Good</option>
                                            <option value="Excellent" <?php echo $product['product_rating'] == 'Excellent' ? 'selected' : ''; ?>>Excellent</option>
                                        </select>
                                    </div> -->
                                    <div class="form-group">

                                        <label for="stock">Stock Status:</label>
                                        <select name="stock">
                                            <option value="In Stock" <?php echo $product['stock'] == 'In Stock' ? 'selected' : ''; ?>>In Stock</option>
                                            <option value="Out of Stock" <?php echo $product['stock'] == 'Out of Stock' ? 'selected' : ''; ?>>Out of Stock</option>
                                            <option value="Backordered" <?php echo $product['stock'] == 'Backordered' ? 'selected' : ''; ?>>Backordered</option>
                                        </select>
                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">update product</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="vendor/jquery-3.2.1.min.js"></script>
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <script src="vendor/slick/slick.min.js"></script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js"></script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js"></script>

        <script src="js/main.js"></script>
</body>

</html>