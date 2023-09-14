<?php
    ob_start();
    session_start();
    $koneksi = new mysqli('localhost', 'root', '', 'penjualan');
    $admin = isset($_SESSION['admin']) ? $_SESSION['admin']: false;
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : false;
    if($admin || $user){ 
        header("location:index.php");
    }else{

?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <title>Halaman Login</title>
            <!-- BOOTSTRAP STYLES-->
            <link href="assets/css/bootstrap.css" rel="stylesheet" />
            <!-- FONTAWESOME STYLES-->
            <link href="assets/css/font-awesome.css" rel="stylesheet" />
                <!-- CUSTOM STYLES-->
            <link href="assets/css/custom.css" rel="stylesheet" />
            <!-- GOOGLE FONTS-->
            <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
            <!-- TABLE STYLES-->
            <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
        </head>
        <body>
            <div class="container">
                <div class="row text-center">
                    <div class="col-mid-12">
                        <br/><br/>
                        <br/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-mid-4 col-mid-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <h2 class="text-center">Login</h2>
                            <div class="panel-body">
                                <form action="check-login.php" role="form" method="post">
                                    <br/>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="username"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="password"/>
                                    </div>
                                    <div class="text-center">
                                        <input type="submit" name="login" value="Login" class="btn btn-primary"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- JQUERY SCRIPTS -->
            <script src="assets/js/jquery-1.10.2.js"></script>
            <!-- BOOTSTRAP SCRIPTS -->
            <script src="assets/js/bootstrap.min.js"></script>
            <!-- METISMENU SCRIPTS -->
            <script src="assets/js/jquery.metisMenu.js"></script>
            <!-- CUSTOM SCRIPTS -->
            <script src="assets/js/custom.js"></script>
        </body>
    </html>

<?php
    }
?>