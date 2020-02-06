<?php

if ($_POST["Command"] == "save_item") {
    require_once 'db.php';
    date_default_timezone_set('Asia/Colombo');
    $pro_cat = $_POST["product_cat"];
    $pro_brand = $_POST["product_brand"];
    $pro_title = $_POST["product_title"];
    $pro_price = $_POST["product_price"];
    $pro_image = $_POST["file"];

    $target_dir = "product_images/";
    $imageFileType = $_FILES["file"]["tmp_name"];
    $path = $_FILES["file"]["name"];
    $imageFileType = pathinfo($path, PATHINFO_EXTENSION);
    
     $no = uniqid();
    
    $target_file = $target_dir . $no . "." . $imageFileType;
    $sfile = explode(".", $target_file);

    $sfile = $no . "." . $sfile[1];
    $uploadOk = 1;
    
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    $mok = "no";
//while ($mok == "ok") {
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $mok = "ok";
    } else {
        $mok = "ok";
    }
//} 

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
//            echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    $sql = "insert into products (product_cat,product_brand,product_title,product_price,product_keywords, product_image) values ('$pro_cat','$pro_brand','$pro_title','$pro_price','$pro_title', '$sfile')";
    echo $sql;
    $run_query = mysqli_query($con, $sql);
    echo "Saved";
}
?>