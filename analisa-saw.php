<?php
foreach($conn->get_results("select *from alternatif order by code ASC")as $data){
	$kode[]=$data['code'];
	$nama[]=$data['name'];
	foreach($conn->get_results("select *from klasifikasi where idalternatif='$data[idalternatif]'") as $dataKlF){
		
		foreach($conn->get_results("select *from himpunan where idhimpunan='$dataKlF[idhimpunan]' and idkriteria='$dataKlF[idkriteria]'") as $dataHim);
		$bobot[$data['code']][$dataKlF['idkriteria']]=$dataHim['nilai'];
		$xij[$data['code']][]=$dataHim['nilai'];
	}
}
$c=1;
foreach($conn->get_results("select *from kriteria ORDER BY idkriteria ASC") as $dataK){
	$kdK[]="C".$c;
	$idK[]=$dataK['idkriteria'];
	$kriteria[]=$dataK['kriteria'];
	$bobotK[]=$dataK['bobot'];
	$atribut[]=$dataK['atribut'];
	$c++;
}
?>
<h3>Analisa Bobot Kriteria Alternatif</h3>
<div class="divider"></div>
<div class="row">
 <div class="col-sm-12">
 <div class="card-box table-responsive">
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
<thead>
  <tr>
    <td width="5%" bgcolor="#CCCCCC"><strong>No</strong></td>
    <td width="60%" bgcolor="#CCCCCC"><strong>Alternatif/ Kriteria</strong></td>
    <?php for($ic=0; $ic <count($kdK); $ic++){?>
    <td width="10%" align="center" bgcolor="#CCCCCC"><strong><?php echo $kdK[$ic];?></strong></td>
    <?php }?>
  </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  for($i=0; $i <count($kode); $i++){?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo $kode[$i]." ". $nama[$i];?></td>
    <?php for($ic=0; $ic <count($kdK); $ic++){?>
    <td width="6%" align="center"><?php echo $bobot[$kode[$i]][$idK[$ic]];?></td>
    <?php }?>
  </tr>
  <?php $no++;
  }?>
  </tbody>
</table>


<h3>Normalisasi</h3>
<div class="divider"></div>
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
<thead>
  <tr>
    <td width="5%" bgcolor="#CCCCCC"><strong>No</strong></td>
    <td width="60%" bgcolor="#CCCCCC"><strong>Alternatif/ Kriteria</strong></td>
    <?php for($ic=0; $ic <count($kdK); $ic++){?>
    <td width="10%" align="center" bgcolor="#CCCCCC"><strong><?php echo $kdK[$ic].":".$atribut[$ic];?></strong></td>
    <?php }?>
  </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  for($i=0; $i <count($kode); $i++){?>
  
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo $kode[$i]." ". $nama[$i];?></td>
    <?php for($ic=0; $ic <count($kdK); $ic++){
		// Normaslisasi
		if($atribut[$ic]=='benefit'){
			$x_ij=max($xij[$kode[$i]]);
			$r_ij[$kode[$i]][$idK[$ic]]=number_format(($bobot[$kode[$i]][$idK[$ic]]/$x_ij),2);
		}elseif($atribut[$ic]=='cost'){
			$x_ij=min($xij[$kode[$i]]);
			$r_ij[$kode[$i]][$idK[$ic]]=number_format(($x_ij/$bobot[$kode[$i]][$idK[$ic]]),2);
		}
		// Nilai Normalisasi x Bobot Kriteria
		$bb[$kode[$i]][$idK[$ic]]=($r_ij[$kode[$i]][$idK[$ic]] * $bobotK[$ic]);
		//Hitung Total Nilai per Alternatif
		$total[$i] +=$bb[$kode[$i]][$idK[$ic]];
		
		?>
    <td width="10%" align="center"><?php echo $r_ij[$kode[$i]][$idK[$ic]];?></td>
    <?php }?>
  </tr>
  <?php $no++;
  }?>
  </tbody>
</table>

<?php 
for($ix=0; $ix <count($kode); $ix++){
	$bobot_tot[]=$total[$ix];
	$alt[$total[$ix]]=$kode[$ix];
	$nama[$kode[$ix]]=$nama[$ix];
}
$bobot_sort=array_values($bobot_tot);
rsort($bobot_sort,SORT_NUMERIC);
$rnk=1;
foreach($bobot_sort as $key=>$cols){
	$rank[$cols]=$rnk;
	$rnk++;
}

?>

<h3>Perangkingan</h3>
<div class="divider"></div>
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
<thead>
  <tr>
    <td width="5%" rowspan="2" valign="middle" bgcolor="#CCCCCC"><strong>No</strong></td>
    <td width="60%" valign="middle" bgcolor="#CCCCCC"><strong>Alternatif/ Kriteria</strong></td>
    <?php for($ic=0; $ic <count($kdK); $ic++){?>
    <td width="10%" align="center" valign="middle" bgcolor="#CCCCCC"><strong><?php echo $kdK[$ic];?></strong></td>
    <?php }?>
    <td width="10%" rowspan="2" align="center" valign="middle" bgcolor="#CCCCCC">Total</td>
    <td width="10%" rowspan="2" align="center" valign="middle" bgcolor="#CCCCCC">Rangking</td>
  </tr>
  <tr>
    <td align="center" valign="middle"><em><strong>Bobot Kriteria</strong></em></td>
   <?php for($ic=0; $ic <count($kdK); $ic++){?>
    <td width="6%" align="center" valign="middle"><em><strong><?php echo $bobotK[$ic];?></strong></em></td>
    <?php }?>
    </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  for($i=0; $i <count($kode); $i++){?>
  
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo $kode[$i]." ". $nama[$i];?></td>
    <?php for($ic=0; $ic <count($kdK); $ic++){
		
		
		?>
    <td width="10%" align="center"><?php echo $bb[$kode[$i]][$idK[$ic]];?></td>
    <?php }?>
    <td width="10%" align="center"><?php echo $total[$i];?></td>
    <td width="10%" align="center"><?php echo $rank[$total[$i]];?></td>
  </tr>
  <?php $no++;
  $nilai_mx[]=$total[$i];
  }
  
  ?>
  </tbody>
</table>

<p>
Berdasarkan hasil perhitungan metode Simple Additive Weighting (SAW), maka Rangking tertinggi diperoleh <strong><?php echo $alt[max($nilai_mx)].". ".$nama[$alt[max($nilai_mx)]];?></strong> dengan Score nilai<strong> <?php echo max($nilai_mx);?></strong>
</p
></div>
</div>
</div>