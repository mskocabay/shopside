<?php
session_start();

if ($_SESSION['login'] != 'ok') {

    header("Location:login.php");

}
unset($_SESSION['error_message']);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="asssets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="asssets/css/datatables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <script src="asssets/js/datatable/jquery.dataTables.js"></script>
</head>
<body>
<div class="content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="products.php">Products <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="newproduct.php">New Product</a>
                </li>

            </ul>
            <span class="navbar-text">
      <a class="nav-link" href="logout.php">Logout</a>
    </span>
        </div>
    </nav>

    <section class="content" style="width: 600px; margin-right: auto;margin-left: auto;">

        <form id="sendFormData">
            <div class="form-group">
                <label for="title">Title</label>
                <input required type="text" maxlength="100" class="form-control" id="title" placeholder="Title">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input required type="text"  maxlength="100" class="form-control" id="description" placeholder="Description">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input required type="number" maxlength="10" class="form-control" id="price" placeholder="Price">
            </div>

            <div class="form-check">
                <input checked type="checkbox" class="form-check-input" id="discount">
                <label class="form-check-label" for="discount">Discount</label>
            </div>

            <div class="form-check">
                <input checked type="checkbox" class="form-check-input" id="issale">
                <label class="form-check-label" for="issale">On Sale</label>
            </div>
            <button id="sendbtn" type="submit" class="btn btn-primary">Send</button>
        </form>

    </section>
</div>
<div class="modal" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><span id="modalmessage"></span></p>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>

    $("#sendFormData").on('submit', function (e) {

        e.preventDefault();
        let title = $('#title').val();
        let description = $('#description').val();
        let price = $('#price').val();
        let is_discount =  ($("#discount").prop('checked') == true) ? 1 : 0;
        let is_sale = ($("#issale").prop('checked') == true) ? 1 : 0;


        $.ajax({
            url: 'http://shopside.test/api/addProduct',
            type: 'POST',
            dataType: 'json',
            data: {
                product_title: title,
                product_description: description,
                price: price,
                is_discount: is_discount,
                on_sale: is_sale
            },
            success: function (response) {

                if (response['error'] == false) {
                    $("#modalmessage").html('Ürün eklenmiştir.');
                } else {
                    $("#modalmessage").html('Hata oluştu.');
                }
                $("#myModal").modal('show');
            },
            error: function (hata) {
            }
        });
    });


</script>

</body>
</html>