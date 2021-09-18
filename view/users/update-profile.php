
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../../startbootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../startbootstrap/css/sb-admin-2.min.css" rel="stylesheet">

</head><body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

                <div class="col-lg-5 d-none d-lg-block"><img src="view/users/uploads/<?php echo $result->image ?>" style="width: 400px; height: 450px" alt="Error"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Information with user</h1>
                        </div>
                        <form method="post" class="user" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="text" name="password" hidden value="Input your password" class="form-control form-control-user" id="exampleLastName"
                                           placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" disabled name="username" value="<?php echo $result->username?>" class="form-control form-control-user" id="exampleFirstName">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?php echo $result->email?>" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                >
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="numberPhone" value="<?php echo $result->numberPhone?>" class="form-control form-control-user"
                                           id="exampleInputPassword" placeholder="Number Phone">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="address" value="<?php echo $result->address?>" class="form-control form-control-user"
                                           id="exampleRepeatPassword" placeholder="Address">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="file" name="image">
                            </div>
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Update Informaton">
                            <a href="home.php" class="btn btn-primary btn-user btn-block">Cancel</a>
                        </form>
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

<!-- Page level plugins -->
<script src="../../startbootstrap/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../startbootstrap/js/demo/chart-area-demo.js"></script>
<script src="../../startbootstrap/js/demo/chart-pie-demo.js"></script>

</body>

</html>