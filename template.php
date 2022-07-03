<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SPK SAW</title>
<script type="text/javascript" src="js/jquery.min.js"></script>
<style>
.header{
	height:50px;
	border:1px solid #CCC;
}
.sidebar{
	width:18%;
	min-height:500px;
	float:left;
	border:1px solid #CCC;

}
.content{
	float:left;
	margin-left:1%;
	width:80%;
	border:1px solid #CCC;
	
}
.footer{
	clear:both;
	height:30px;
}
</style>
</head>

<body>
    <div class="header">
        <div style="font-size:22px;" align="center">SISTEM PENDUKUNG KEPUTUSAN METODE SIMPLE ADDITIVE WEIGHTING (SAW)</div>
    </div>
    <div class="sidebar">
        <ul>
             <li><a href="./">Beranda</a></li>
             <li><a href="./?page=alternatif">Alternatif</a></li>
             <li><a href="./?page=kriteria">Kriteria</a></li>
             <li><a href="./?page=himpunan">Himpunan Kriteria</a></li>
             <li><a href="./?page=klasifikasi">Klasifikasi</a></li>
             <li><a href="./?page=analisa-saw">Analisa SAW</a></li>
        </ul>
    </div>
    <div class="content"> <?php eval($CONTENT_["main"]);?></div>
    <div class="footer"></div>
</body>
</html>