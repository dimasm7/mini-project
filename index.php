<?php
    session_start();    
    error_reporting();
    // require_once "function.php";

    $koneksi = new mysqli('localhost', 'root', '', 'penjualan');
    $login = $koneksi->query("SELECT * FROM logins where username='$username' and password='$pass'");

if($_SESSION['admin']/* || $_SESSION['user']*/){

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Penjualan</title>
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
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Penjualan</a> 
            </div>
            <div style="color: white;
                padding: 15px 50px 5px 50px;
                float: right;
                font-size: 16px;"> <?=date('d-m-Y');?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>

                    <li>
                        <a href="?page=users"><i class="fa fa-desktop fa-3x"></i> Data Users</a>
                    </li>

                    <li>
                        <a href="?page=products"><i class="fa fa-table fa-3x""></i> Data Produk</a>
                    </li>

                    <li>
                        <a href="?page=transaksi"><i class="fa fa-edit fa-3x"></i> Transaksi</a>
                    </li>
                      
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        
                        $page = isset($_GET['page']) ? $_GET['page'] : false; 
                        $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : false;

                            if($page == "buku"){
                                
                                if($aksi == ""){
                                    require_once "page/buku/buku.php";

                                }elseif($aksi == "tambah"){
                                    require_once "page/buku/tambah.php";
                                
                                }elseif($aksi == "ubah"){
                                    require_once "page/buku/ubah.php";
                                
                                }elseif($aksi == "hapus"){
                                    require_once "page/buku/hapus.php";
                                }

                            }elseif($page == "users"){
                                require_once "page/user/users.php";
                            }elseif($page == "transaksi"){

                                if($aksi == ""){
                                    require_once "page/transaksi/transaksi.php";

                                }elseif($aksi == "tambah"){
                                    require_once "page/transaksi/tambah.php";
                                
                                }elseif($aksi == "kembali"){
                                    require_once "page/transaksi/kembali.php";
                                
                                }elseif($aksi == "perpanjang"){
                                    require_once "page/transaksi/perpanjang.php";
                                }
                            }elseif($page==""){
                                require_once "home.php";
                            }
                        ?>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
       
</body>
</html>
<?php
}else{
    header("location:login.php");
}
?>