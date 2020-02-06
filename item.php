<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ABC Store</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script src="js/jquery2.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="main.js"></script>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">	
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">ABC Store</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                    <li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
                </ul>
            </div>
        </div>
        <p><br/></p>
        <p><br/></p>
        <p><br/></p>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" id="signup_msg1">
                    <!--Alert from signup form-->
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Product Add Form</div>
                        <div class="panel-body">

                            <!--<form method="post" enctype="multipart/form-data" action="item_add.php">-->
                            <div class="container" style="margin-left: 120px">
                                <div class="row">
                                    <!--                                    <div class="col-md-6">
                                                                            <label for="product_id">Product Id</label>
                                                                            <input type="text" id="product_id" name="product_id" class="form-control">
                                                                        </div>-->
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="product_title">Product Title</label>
                                                <input type="text" id="product_title" name="product_title"class="form-control">
                                            </div>
                                        </div>
                                        <label for="product_cat">Product Category</label>
                                        <select name="product_cat" id="product_cat" onkeypress="keyset('cat_title', event);" class="form-control">
                                            <?php
                                            include 'db.php';

                                            $sql = "SELECT * FROM categories";
                                            $run_query = mysqli_query($con, $sql);

                                            while ($row = mysqli_fetch_array($run_query)) {
                                                echo "<option value='" . $row["cat_id"] . "'>" . $row["cat_title"] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="product_brand">Product Brand</label>
                                        <select name="product_brand" id="product_brand" onkeypress="keyset('brand_title', event);" class="form-control">
                                            <?php
                                            include 'db.php';

                                            $sql = "SELECT * FROM brands";
                                            $run_query = mysqli_query($con, $sql);

                                            while ($row = mysqli_fetch_array($run_query)) {
                                                echo "<option value='" . $row["brand_id"] . "'>" . $row["brand_title"] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <!--<input type="text" id="product_brand" name="product_brand"class="form-control">-->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="product_price">Product Price</label>
                                        <input type="number" id="product_price" name="product_price"class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="product_image">Product Image</label>
                                        <!--<input id="doldimg" name="doldimg" type="hidden">-->
                                        <input type="file" id="file" name="file"  class="form-control">
                                        <!--<input id="product_image" name="product_image" class="file" type="file" data-preview-file-type="any" data-upload-url="#">-->

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <!--<input style="float:right;" value="ADD" type="button" id="signup_button" name="signup_button"class="btn btn-success btn-lg">-->
                                        <!--<input style="float:right;" value="ADD" type="button" id="signup_button1" name="signup_button1"class="btn btn-success btn-lg">-->
                                        <input style="float:right;" value="ADD" type="button" id="save_item" onclick="save_item()" class="btn btn-success btn-lg">
                                    </div>
                                </div>
                            </div>
                            <!--</form>-->
                        </div>

                        <div class="panel-footer"></div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </body>
</html>

<script src="main.js" type="text/javascript"></script>

















