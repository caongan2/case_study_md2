<?php
include_once "vendor/autoload.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location:index.php");
}
if (isset($_REQUEST['logOut'])) {
    session_destroy();
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="../../startbootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../startbootstrap/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add new product</h1>
                                </div>
                                <?php foreach ($products as $product): ?>
                                    <form method="post" class="user" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" value="<?php echo $product->name?>" name="name" class="form-control form-control-user"
                                                   placeholder="Product name">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" value="<?php echo $product->price?>"  name="price" class="form-control form-control-user"
                                                   id="exampleInputPassword" placeholder="Product price">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="image">
                                        </div>
                                        <input type="submit" name="login" class="btn btn-primary btn-user btn-block"
                                               value="Update">
                                        </a>
                                        <a href="index.php?page=product&product=home"
                                           class="btn btn-secondary btn-user btn-block">Cancel</a>
                                    </form>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="../../startbootstrap/vendor/jquery/jquery.min.js"></script>
<script src="../../startbootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../startbootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../startbootstrap/js/sb-admin-2.min.js"></script>

</body>

</html>