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

    <section class="content">
        <table id="myTable" class="table table-striped table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Decription</th>
                <th>Price</th>
                <th>Discount</th>
                <th>On sale</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Decription</th>
                <th>Price</th>
                <th>Discount</th>
                <th>On sale</th>

            </tr>
            </tfoot>
        </table>
    </section>
</div>

</body>
<script>
    $(document).ready(function () {
        let user = 'admin';
        let password = 'admin';

        $('#myTable').DataTable({

            "processing": true,
            "ajax": "http://shopside.test/api/listProducts",

        });
    });

</script>

</html>
