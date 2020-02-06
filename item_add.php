<?php

include "db.php";



//if (empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) ||
//        empty($mobile) || empty($address1) || empty($address2)) {
//
//    echo "
//			<div class='alert alert-warning'>
//				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
//			</div>
//		";
//    exit();
//} else {
//    if (!preg_match($name, $f_name)) {
//        echo "
//			<div class='alert alert-warning'>
//				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
//				<b>this $f_name is not valid..!</b>
//			</div>
//		";
//        exit();
//    }
//    if (!preg_match($name, $l_name)) {
//        echo "
//			<div class='alert alert-warning'>
//				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
//				<b>this $l_name is not valid..!</b>
//			</div>
//		";
//        exit();
//    }
//    if (!preg_match($emailValidation, $email)) {
//        echo "
//			<div class='alert alert-warning'>
//				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
//				<b>this $email is not valid..!</b>
//			</div>
//		";
//        exit();
//    }
//    if (strlen($password) < 9) {
//        echo "
//			<div class='alert alert-warning'>
//				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
//				<b>Password is weak</b>
//			</div>
//		";
//        exit();
//    }
//    if (strlen($repassword) < 9) {
//        echo "
//			<div class='alert alert-warning'>
//				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
//				<b>Password is weak</b>
//			</div>
//		";
//        exit();
//    }
//    if ($password != $repassword) {
//        echo "
//			<div class='alert alert-warning'>
//				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
//				<b>password is not same</b>
//			</div>
//		";
//    }
//    if (!preg_match($number, $mobile)) {
//        echo "
//			<div class='alert alert-warning'>
//				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
//				<b>Mobile number $mobile is not valid</b>
//			</div>
//		";
//        exit();
//    }
//    if (!(strlen($mobile) == 10)) {
//        echo "
//			<div class='alert alert-warning'>
//				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
//				<b>Mobile number must be 10 digit</b>
//			</div>
//		";
//        exit();
//    }
//existing email address in our database
//$pro_id = $_POST["product_id"];
$pro_cat = $_POST["product_cat"];
$pro_brand = $_POST["product_brand"];
$pro_title = $_POST["product_title"];
$pro_price = $_POST["product_price"];
$pro_image = $_POST["product_image"];
//
//if (!isset($pro_image)) {
//    $target_dir = "product_images/";
//    $imageFileType = $_FILES["file"]["tmp_name"];
//    $path = $_FILES['file']["name"];
//    $imageFileType = pathinfo($path, PATHINFO_EXTENSION);
//
//    $target_file = $target_dir . $pro_image . "." . $imageFileType;
//    (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file));
//} 
//else {
//    $target_file = $_POST['img'];
//}
if (!$_POST["product_title"]) {
    echo "
				<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Fill All Details..!</b>
				</div>
			";
} else {
    $sql = "INSERT INTO `products` 
		( `product_cat`, `product_brand`, `product_title`, 
		`product_price`,`product_keywords`,`product_image`) 
		VALUES ( '$pro_cat', '$pro_brand', '$pro_title', 
		'$pro_price','$pro_title','$pro_image')";
    $run_query = mysqli_query($con, $sql);
    if ($run_query) {
        echo "
				<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>You are ADDED successfully..!</b>
				</div>
			";
    }
}
?>






















































