<?php
session_start();
include 'db.php';
$message = $_SESSION['error_message']??'';
if($_POST){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $db->prepare("select * from tbl_users where email=:email and password=:password");
    $user->execute(['email' => $email,'password' => md5($password)]);
    $userCount = $user->rowCount();

    if($userCount == 1 ){
        $_SESSION['login'] = "ok";
        header("Location:products.php");
    }
    else{

        $_SESSION['error_message'] = '<div class="alert alert-danger" role="alert">Wrong email or password!</div>';
        header("Location:login.php");
    }

}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="asssets/css/style.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>
<body>
<div class="wrapper">
    <div id="formContent">
        <!-- Tabs Titles -->


        <div style="height: 50px" class="fadeIn first">
 <?php echo $message;?>
        </div>

        <!-- Login Form -->
        <form action="login.php" method="post">
            <input type="text" maxlength="50" id="login" class="form-control" name="email" placeholder="email" required>
            <input type="text" maxlength="50" id="password" class="form-control" name="password" placeholder="password" required>
            <input type="submit" class="btn btn-primary" value="Log In">
        </form>


        <div id="formFooter">

        </div>

    </div>
</div>

</body>
</html>


