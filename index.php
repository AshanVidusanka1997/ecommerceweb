<?php
session_start();
if (isset($_SESSION["uid"])) {
    header("location:profile.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ABC Store</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script src="js/jquery2.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="main.js"></script>
        <style>
            @media screen and (max-width:480px){
                #search{width:80%;}
                #search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}
            }
        </style>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">	
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
                        <span class="sr-only">navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">ABC Store</a>
                </div>
                <div class="collapse navbar-collapse" id="collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                        <li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
                        <li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
                        <li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        include 'db.php';
                        if ($_SESSION["name"] === "admin") {
                            echo"<li><a href=\"item.php\"><span class=\"glyphicon glyphicon-home\"></span>Item Add</a></li>";
                        }else {
                             echo 'hi';
                        }
                        ?>

                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
                            <div class="dropdown-menu" style="width:550px;">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <div class="row">

                                            <div class="col-md-1">No</div>
                                            <div class="col-md-3">Product Image</div>
                                            <div class="col-md-4">Product Name</div>
                                            <div class="col-md-3">Price in $.</div>
                                            <div class="col-md-1"></div>

                                        </div>
                                    </div>
                                    <div class="panel-body"></div>
                                    <div class="panel-footer"></div>
                                </div>
                            </div>
                        </li>
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>SignIn</a>
                            <ul class="dropdown-menu">
                                <div style="width:300px;">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Login</div>
                                        <div class="panel-heading">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" required/>
                                            <label for="email">Password</label>
                                            <input type="password" class="form-control" id="password" required/>
                                            <p><br/></p>
                                            <a href="#" style="color:white; list-style:none;">Forgotten Password</a><input type="submit" class="btn btn-success" style="float:right;" id="login" value="Login">
                                        </div>
                                        <!--<div class="panel-footer" id="e_msg"></div>-->
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li><a href="customer_registration.php"><span class="glyphicon glyphicon-user"></span>SignUp</a></li>
                    </ul>
                </div>
            </div>
        </div>	
        <p><br/></p>
        <p><br/></p>
        <p><br/></p>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-2 col-xs-12">
                    <div id="get_category">
                    </div>
                    <div id="get_brand">
                    </div>
                </div>
                <div class="col-md-8 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-xs-12" id="product_msg">
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading">Products</div>
                        <div class="panel-body">
                            <div id="get_product">

                            </div>

                        </div>
                        <div class="panel-footer">Khan Store</div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </body>
</html>






















