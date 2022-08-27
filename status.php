<?php
session_start();
include 'protect.php';
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <title>
        Information Delivery Order Tel-U
    </title>
    <meta name="keywords" content="">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
    <!-- styles -->
    <link href="asset/css/font-awesome.css" rel="stylesheet">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/animate.min.css" rel="stylesheet">
    <link href="asset/css/owl.carousel.css" rel="stylesheet">
    <link href="asset/css/owl.theme.css" rel="stylesheet">
    <!-- theme stylesheet -->
    <link href="asset/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
    <!-- your stylesheet with modifications -->
    <link href="asset/css/custom.css" rel="stylesheet">
    <script src="asset/js/respond.min.js"></script>
    <style>

    #copyright {
        position: fixed;
        /*padding: 10px 0;*/
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #333;
        color: #ccc;
        font-size: 12px;
        text-align: center;
    }

    @media (max-width: 991px) {
        #content{
            margin-bottom: 54px;
        }
        #copyright p {
            margin-bottom: 0px;
        }
    }
</style>
</head>
<body>
        <!-- *** TOPBAR ***
            _________________________________________________________ -->
            <div id="top">
                <div class="container">
                    <div class="col-md-6" data-animate="fadeInDown">
                        <ul class="menu">
                            <li><a>Welcome, <?php echo $_SESSION['login']['nama_pelanggan']; ?></a>
                            </li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- *** TOP BAR END *** -->
    <!-- *** NAVBAR ***
        _________________________________________________________ -->
        <div class="navbar navbar-default yamm" role="navigation" id="navbar">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
                        <img class="hidden-xs">
                        <img class="visible-xs"><span class="sr-only">go to homepage</span>
                    </a>
                    <div class="navbar-buttons">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-align-justify"></i>
                        </button>
                        <a class="btn btn-default navbar-toggle" href="cart.php">
                            <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">Keranjang Belanja</span>
                        </a>
                    </div>
                </div>
                <!--/.navbar-header -->
                <div class="navbar-collapse collapse" id="navigation">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li> <a href="all-menu.php">Menu</a>
                        </li>
                        <li> <a href="warung.php">Patners</a>
                        </li>
                        <li> <a href="contact.php">Contact Us</a>
                        </li>
                        <li> <a href="status.php">Status Pesanan</a>
                    </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
                <?php
                error_reporting(0);                     
                    if (!$_SESSION['keranjang']) {
                    ?>
                        <div class="navbar-collapse collapse right" id="basket-overview">
                            <a href="cart.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">Keranjang Belanja</span></a>
                        </div>
                    <?php        
                    }
                    else{
                    $item = count($_SESSION['keranjang']);
                    ?>
                        <div class="navbar-collapse collapse right" id="basket-overview">
                            <a href="cart.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">Keranjang Belanja (<?php echo $item;?>)</span></a>
                        </div>
                    <?php
                    }
                ?>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#navbar -->
        <!-- *** NAVBAR END *** -->
        <div id="all"> <!-- wrap -->
            <div id="content"><!-- main -->
                <div class="container">
                    <div class="col-md-3">
                        <div class="panel panel-default sidebar-menu">
                            <?php
                            $id_pelanggan=$_SESSION['login']['id_pelanggan'];
                            $query = $conn->query("SELECT * FROM pelanggan WHERE id_pelanggan ='$id_pelanggan'");
                            $data = $query -> fetch_assoc();
                            ?>
                            <div class="panel-heading" style="padding: 15px;">
                                <center><h3 class="panel-title"><i class="fa fa-user"></i> Profile User</h3></center>
                            </div>
                            <div class="panel-body" align="center" style="min-height: 345px; max-height: 345px;">
                                <img src="foto_profil/<?php echo $data['foto_profil'];?>" onerror="this.src='foto_profil/default.png';" align="center" class="img-circle" width="100%" style="min-height: 235px; max-height: 235px;">
                                <p style="font-size: 20px";><br><i><b><?php echo $data['nama_pelanggan']; ?></b></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="padding: 21px;">
                                <center><h3 class="panel-title">Status Pesanan</h3></center>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table tab-content">
                                        <thead>
                                            <tr>
                                                <td style="padding: 20px"><b>Nama</b></td>
                                                <td style="padding: 20px"><?php echo $data['nama_pelanggan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 20px"><b>Email</b></td>
                                                <td style="padding: 20px"><?php echo $data['email_pelanggan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 20px"><b>No Telpon</b></td>
                                                <td style="padding: 20px"><?php echo $data['telepon_pelanggan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 18px"><b>Alamat</b></td>
                                                <td style="padding: 18px"><?php echo $data['alamat_pelanggan']; ?></td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="table-responsive">	
																	<table class="table table-bordered">
																		<thead>
																			<tr>
																				<th>No</th>
																				<th>No Invoice</th>
																				<th>Tanggal</th>
																				<th>Subtotal</th>
																				<th class="text-center">Status</th>
																			</tr>
																		</thead>
																		<tbody>

																			<?php
																			$no=1;
					                            $id_pelanggan=$_SESSION['login']['id_pelanggan'];
					                            $query = $conn->query("SELECT * FROM pembelian WHERE id_pelanggan ='$id_pelanggan'");
					                            $data = $query -> fetch_assoc();
					                            $ini = "invoice-"
					                            ?>
																				<tr>
																					<td><?php echo $no++; ?></td>
																					<td><?php echo $ini.$data['id_pembelian']; ?></td>
																					<td><?php echo $data['tanggal_pembelian']; ?></td>
																					<td>Rp.<?php echo number_format($data['total_pembelian']); ?></td>
																					<td class="text-center">
																                        <?php 
																                        if($data['status'] == 0){
																                          echo "<span class='label label-warning'>Menunggu Pembayaran</span>";
																                        }elseif($data['status'] == 1){
																                          echo "<span class='label label-default'>Menunggu Konfirmasi</span>";
																                        }elseif($data['status'] == 2){
																                          echo "<span class='label label-danger'>Ditolak</span>";
																                        }elseif($data['status'] == 3){
																                          echo "<span class='label label-primary'>Dikonfirmasi & Sedang Diproses</span>";
																                        }elseif($data['status'] == 4){
																                          echo "<span class='label label-success'>Selesai Dikirim</span>";
																                        }
																                        ?>
																                      </td>
																				</tr>
																				<?php} ?>
																		</tbody>
																	</table>
																</div>

                               

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- /.col-md-9 -->
</div>
<!-- /.container -->
</div>
<!-- /#content -->
<!-- *** COPYRIGHT ***
    _________________________________________________________ -->
    <div id="copyright">
        <div class="container">
            <div class="col-md-6">
                <p class="pull-left">©2022</p>
            </div>
            <div class="col-md-6">
                <p class="pull-right">
                </p>
            </div>
        </div>
    </div>
    <!-- *** COPYRIGHT END *** -->
</div>
<!-- /#all -->
<!-- *** SCRIPTS TO INCLUDE ***
    _________________________________________________________ -->
    <script src="asset/js/jquery-1.11.0.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/jquery.cookie.js"></script>
    <script src="asset/js/waypoints.min.js"></script>
    <script src="asset/js/modernizr.js"></script>
    <script src="asset/js/bootstrap-hover-dropdown.js"></script>
    <script src="asset/js/owl.carousel.min.js"></script>
    <script src="asset/js/front.js"></script>
</body>
</html>