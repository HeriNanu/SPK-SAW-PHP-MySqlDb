<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SPK | SAW </title>
	<?php include('style-head.php');?>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="./" class="site_title"><i class="fa fa-paw"></i> <span>SPK SAW</span></a>
                    </div>

                    <div class="clearfix"></div>
					<?php if($_SESSION['username']<>''){?>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo ucfirst(ucwords($_SESSION['username']));?></h2>
                        </div>
                    </div>
                    <?php }?>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Menu</h3>
                            <ul class="nav side-menu">
                                <li><a href="./"><i class="fa fa-home"></i> Beranda</a></li>
                                <?php if($_SESSION['username']<>''){?>
                                <li><a href="./?page=kriteria"><i class="fa fa-gear"></i> Kriteria</a></li>
                                <li><a href="./?page=himpunan"><i class="fa fa-copy"></i> Himpunan Kriteria</a></li>
                                <li><a href="./?page=alternatif"><i class="fa fa-gear"></i> Alternatif</a></li>
                                <li><a href="./?page=klasifikasi"><i class="fa fa-sitemap"></i> Klasifikasi</a></li>
                                <li><a href="./?page=analisa-saw"><i class="fa fa-laptop"></i> Analisa SAW</a></li>
                                <li><a href="./?page=logout"><i class="fa fa-unlock"></i> Logout</a></li>
                                <?php }else{?>
                                <li><a href="./?page=login"><i class="fa fa-lock"></i> Login</a></li>
                                <?php }?>
                            </ul>
                        </div>
                        

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/img.jpg" alt=""><?php echo ucfirst(ucwords($_SESSION['username']));?>
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                <?php if($_SESSION['username']<>''){?>
                                    <a class="dropdown-item" href="javascript:;"> Profile</a>
                                    
                                    <a class="dropdown-item" href="./?page=logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    <?php }else{?>
                                    
                                    <a class="dropdown-item" href="./?page=login"><i class="fa fa-sign-in pull-right"></i> Log In</a>
                                    <?php }?>
                                </div>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php if($_GET['page']==''){echo "Welcome ". ucfirst(ucwords($_SESSION['username']));}else{echo "Form Data ".ucfirst(ucwords(str_replace('-',' ',$_GET['page'])));}?></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <!-- CONTENT-->
                                    <?php eval($CONTENT_["main"]);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    SPK SAW - By <a href="https://herinanu.com">Heri Nanu</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

<?php include('style-foot.php');?>

</body>

</html>
