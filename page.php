<?php
$page=$_GET['page'];

if($page=='logout'){
	@session_destroy();
	echo "<script>window.location='./';</script>";
}
switch($page){
	case 'kriteria':
		$page="include 'form/kriteria.php';";
	break;
	case 'alternatif':
		$page="include 'form/alternatif.php';";
	break;
	case 'himpunan':
		$page="include 'form/himpunan.php';";
	break;
	case 'klasifikasi':
		$page="include 'form/klasifikasi.php';";
	break;
	case 'analisa-saw':
		$page="include 'form/analisa-saw.php';";
	break;
	case 'login':
		$page="include 'form/login.php';";
	break;
	default:
		$page="include 'welcome.php';";
	break;
}
$CONTENT_["main"]=$page;