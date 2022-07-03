<?php if($_GET['act']=='edit'){
	foreach($conn->get_results("Select *from himpunan where idhimpunan='$_GET[id]'")as $row);
}
?>


<div class="row">
<div class="col-sm-12">
<div class="card-box table-responsive">
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  <tr>
    <td width="10%" bgcolor="#CCCCCC"><strong>No</strong></td>
    <td width="5%" bgcolor="#CCCCCC"><strong>Kode</strong></td>
    <td width="85%" bgcolor="#CCCCCC"><strong>Nama</strong></td>
  </tr>
  <?php 
  $no=1;
  foreach($conn->get_results("select *from alternatif ORDER by idalternatif ASC")as $data){
	  
	  ?>
  <tr>
    <td><?php echo $no;?></td>
    <td><a href="#" id="data_<?php echo $data['idalternatif'];?>"><?php echo $data['code'];?></a></td>
    <td><?php echo $data['name'];?></td>
  </tr>
  <tr style="display:none;" id="row<?php echo $data['idalternatif'];?>">
    <td colspan="3">
    <form action="" method="post" target="_self">
    <table class="table">
    <?php foreach($conn->get_results("select *from kriteria ORDER BY idkriteria ASC")as $rkriteria){?>
      
      <tr>
        <td width="20%" style="border-bottom:1px solid red;">
        <input type="hidden" name="kriteria[]" id="kriteria[]" value="<?php echo $rkriteria['idkriteria'];?>"  class="form-control"/>
        <input type="hidden" name="idalternatif" id="idalternatif" value="<?php echo $data['idalternatif'];?>"   class="form-control"/>
		<?php echo $rkriteria['kriteria'];?></td>
        <td width="1%" style="border-bottom:1px solid red;">:</td>
        <td width="79%" style="border-bottom:1px solid red;"><select name="himpunan[]" id="himpunan[]"   class="form-control">
        <option value=""></option>
        <?php foreach($conn->get_results("select *from himpunan where idkriteria='$rkriteria[idkriteria]'")as $rhim){
			foreach($conn->get_results("select *from klasifikasi where idalternatif='$data[idalternatif]' and idkriteria='$rkriteria[idkriteria]'")as $r);
			if($r['idhimpunan']==$rhim['idhimpunan']){
				$sel[$no]="selected";
			}else{
			$sel[$no]="";	
			}
			?>
        <option value="<?php echo $rhim['idhimpunan'];?>" <?php echo $sel[$no];?>><?php echo $rhim['nama'];?></option>
        <?php }?>
        </select>
        </td>
      </tr>
      <?php }?>
      <tr>
        <td colspan="2">&nbsp;</td>
        <td><input type="submit" name="submit" value="Simpan" class="btn btn-primary" /></td>
      </tr>
    </table>
    </form>
    </td>
    </tr>
  <script type="text/javascript">
  $(document).ready(function(e) {
	  
    $('#row<?php echo $data['idalternatif'];?>').hide();
	$('#data_<?php echo $data['idalternatif'];?>').click(function(e) {
        $('#row<?php echo $data['idalternatif'];?>').attr('style','diplay:block');
    });
	});
	</script>
  <?php 
  $no++;
  }
  ?>
  
</table>
</div>
</div>
</div>


<?php 
if(!empty($_POST['submit'])){

$jkriteria=$_REQUEST['kriteria'];
for($i=0; $i < count($jkriteria); $i++){
	
$idkriteria[$i]=$_POST['kriteria'][$i];
$idhimpunan[$i]=$_POST['himpunan'][$i];
foreach($conn->get_results("select *from klasifikasi where idalternatif='$_POST[idalternatif]' and idkriteria='$idkriteria[$i]'") as $cekdata);
if($cekdata['idhimpunan']==''){
	$conn->get_results("insert into klasifikasi set idalternatif='$_POST[idalternatif]',idkriteria='$idkriteria[$i]',idhimpunan='$idhimpunan[$i]'");
}else{
	$conn->get_results("update klasifikasi set idhimpunan='$idhimpunan[$i]' where idalternatif='$_POST[idalternatif]' and idkriteria='$idkriteria[$i]'");
}
	
}
echo "<script>window.location='./?page=klasifikasi';</script>";

}

if($_GET['act']=='hapus'){
	$conn->get_results("delete from himpunan where idhimpunan='$_GET[id]'");
	echo "<script>window.alert('Hapus data sukses');window.location='./?page=himpunan';</script>";
}

?>	

