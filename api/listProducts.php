<?php
include '../db.php';
include '../functions.php';



$jsonArray = array(); // array değişkenimiz bunu en alta json objesine çevireceğiz.
$jsonArray["error"] = FALSE; // Başlangıçta hata yok olarak kabul edelim.

$_code = 200; // HTTP Ok olarak durumu kabul edelim.

$_method = $_SERVER["REQUEST_METHOD"];
if($_method == "GET") {

    $products = $db->query("select * from  tbl_products")->fetchAll(PDO::FETCH_OBJ);


    $draw = 1;

    $data = [];
    $i = 1;
    foreach ($products as $product) {

    $data[] = array(
        $i,
        $product->product_title,
        $product->product_description,
        $product->price,
        ($product->is_discount == 1) ? 'Yes' : 'No',
        ($product->on_sale == 1 )? 'Yes' : 'No',

    );
    $i++;
}

$result = array(
    "draw" => $draw,
    "recordsTotal" => sizeof($products),
    "recordsFiltered" => sizeof($products),
    "data" => $data
);
echo json_encode($result);

exit;

    $jsonArray["products"] = $products;
    $_code = 200;
}
else {

    $_code = 400;
    $jsonArray["error"] = TRUE;
    $jsonArray["errormessage"] = "only supports get method";
    error_log('only supports get method');
}
SetHeader($_code);
$jsonArray[$_code] = HttpStatus($_code);
echo json_encode($jsonArray);

