<?php

ini_set('display_errors', 0);
include '../db.php';
include '../functions.php';


$jsonArray = array();
$jsonArray["error"] = FALSE;

$_code = 200;
$_method = $_SERVER["REQUEST_METHOD"];

if ($_method == "POST") {


    $product_title = $_POST["product_title"];
    $product_description = $_POST["product_description"];
    $price = $_POST["price"];
    $is_discount = $_POST["is_discount"];
    $on_sale = $_POST["on_sale"];


    $product = $db->query("SELECT * from tbl_products WHERE product_title='$product_title'");

    if (!isset($product_title) || !isset($product_description) || !isset($price) || !isset($is_discount) || !isset($on_sale)) {
        $_code = 400;
        $jsonArray["error"] = TRUE;
        $jsonArray["errormessage"] = "Tüm alanları doldurunuz";
        error_log('Tüm alanları doldurunuz');
    }
    elseif (!is_numeric($price)){
        $_code = 400;
        $jsonArray["error"] = TRUE;
        $jsonArray["errormessage"] = "Fiyat text olamaz.";
        error_log('Fiyat text olamaz.');

    }

    else if ($product->rowCount() != 0) {
        $_code = 400;
        $jsonArray["error"] = TRUE;
        $jsonArray["errormessage"] = "Ürün daha önce eklenmiş";
       error_log('Ürün daha önce eklenmiş');

    } else {
        $ex = $db->prepare("INSERT INTO tbl_products set  
                                             product_title= :productTitle, 
                                             product_description= :productDescription, 
                                             price= :price, 
                                             is_discount= :isDiscount, 
                                             on_sale= :onSale");
        $ekle = $ex->execute(array(
            "productTitle" => $product_title,
            "productDescription" => $product_description,
            "price" => $price,
            "isDiscount" => $is_discount,
            "onSale" => $on_sale

        ));
        if ($ekle) {
            $_code = 200;
            $jsonArray["mesaj"] = "Ekleme Başarılı.";
        } else {
            $_code = 400;
            $jsonArray["error"] = TRUE;
            $jsonArray["errormessage"] = "Sistem Hatası.";
            error_log('Sistem hatası');
        }
    }


}
else{

    $_code = 400;
    $jsonArray["hata"] = TRUE;
    $jsonArray["hataMesaj"] = "only supports post method";
    error_log('ony supports post method');
}

SetHeader($_code);
$jsonArray[$_code] = HttpStatus($_code);
echo json_encode($jsonArray);