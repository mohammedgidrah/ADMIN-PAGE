<?php
include("includes/header.php");
include("db_connection.php");
?>

<div class="page-container">

    <div class="main-content">

        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-15">
                    <div class="card">
                        <div class="card-header">add product</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">product information</h3>
                            </div>
                            <form action="add_product.php" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <input id="cc-pament" name="id" type="hidden" class="form-control" aria-required="true" aria-invalid="false" />
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">product name</label>
                                    <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" />
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">product description</label>
                                    <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" />
                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                </div>
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">product price</label>
                                    <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number" />
                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                </div>
                                <div class="form-group">

                                    <label for="stock">Stock Status:</label>
                                    <br>
                                    <select name="stock">
                                        <option value="In Stock">In Stock</option>
                                        <option value="Out of Stock">Out of Stock</option>
                                        <option value="Backordered">Backordered</option>
                                    </select>
                                </div>
                                <label for="product_rating">Product Rating:</label>
                                <div class="form-group">
                                    <select name="product_rating">
                                        <option value="Poor">Poor</option>
                                        <option value="Fair">Fair</option>
                                        <option value="Good">Good</option>
                                        <option value="Very Good">Very Good</option>
                                        <option value="Excellent">Excellent</option>
                                    </select>
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

    <div class="row m-t-80">
        <div class="col-md-9.9">
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <th>product id</th>
                        <th>product name</th>
                        <th>product description</th>
                        <th>price</th>
                        <th>stock</th>
                        <th>actione</th>
                    </thead>
                    <?php
                    $result = $conn->query("SELECT * FROM product");
                    $counter = 0;
                    while ($row = $result->fetch_assoc()) {
                        $counter++;
                        echo "<tr>
                    <td>$counter</td>
                    <td>{$row['product_name']}</td>
                    <td>{$row['product_description']}</td>
                    <td>{$row['product_price']}</td>
                    <td>{$row['stock']}</td>
                    <td>
                        <a class='edit' href='edit_product.php?id={$row['product_id']}'>Edit</a>
                        <a class='delete' href='delete_product.php?id={$row['product_id']}'>Delete</a>
                    </td>
                </tr>";
                    }
                    ?>
                </table>
                <?php
                include("includes/footer.php");
                ?>
            </div>
        </div>