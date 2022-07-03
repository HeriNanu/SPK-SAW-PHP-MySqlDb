<?php if($_GET['act']=='edit'){
	foreach($conn->get_results("Select *from himpunan where idhimpunan='$_GET[id]'")as $row);
}
?>
<form action="" method="post" target="_self">
<table width="100%" border="0">
  
    <td width="13%">Kriteria</td>
    <td width="1%">:</td>
    <td width="86%">
    <input type="hidden" name="idhimpunan" id="idhimpunan" value="<?php echo $row['idhimpunan'];?>"   class="form-control">
    <select name="kriteria" id="kriteria"  class="form-control" >
    <option value="">Pilih</option>
    <?php foreach($conn->get_results("select *from kriteria ORDER BY idkriteria ASC") as $rkriteria){?>
    <option value="<?php echo $rkriteria['idkriteria'];?>"><?php echo $rkriteria['kriteria'];?></option>
    <?php }?>
    </select></td>
  </tr>
  <tr>
    <td>Himpunan Kriteria</td>
    <td>:</td>
    <td><input type="text" name="nama" id="nama" value="<?php echo $row['nama'];?>"  class="form-control">
    </td>
  </tr>
  <tr>
    <td>Nilai Bobot</td>
    <td>:</td>
    <td><input type="text" name="nilai" id="nilai" value="<?php echo $row['nilai'];?>"  class="form-control"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
  </tr>
  
</table>
</form>

<div>
<div class="divider"></div>
<div class="row">
 <div class="col-sm-12">
 <div class="card-box table-responsive">
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
<thead>
  <tr>
    <td width="2%" bgcolor="#CCCCCC"><strong>No</strong></td>
    <td width="41%" bgcolor="#CCCCCC"><strong>Kriteria</strong></td>
    <td width="34%" bgcolor="#CCCCCC"><strong>Himpunan</strong></td>
    <td width="8%" bgcolor="#CCCCCC" align="center"><strong>Nilai</strong></td>
    <td width="15%" bgcolor="#CCCCCC" align="center"><strong>Action</strong></td>
  </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  foreach($conn->get_results("select kriteria.*,himpunan.* from himpunan,kriteria where himpunan.idkriteria=kriteria.idkriteria ORDER by idhimpunan ASC")as $data){
	  
	  ?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo $data['kriteria'];?></td>
    <td><?php echo $data['nama'];?></td>
    <td align="center"><?php echo $data['nilai'];?></td>
    <td align="center"><a href="./?page=himpunan&id=<?php echo $data['idhimpunan'];?>&act=edit">Edit</a> | <a href="./?page=himpunan&id=<?php echo $data['idhimpunan'];?>&act=hapus">Hapus</a></td>
  </tr>
  <?php 
  $no++;
  }
  ?>
  </tbody>
</table>
</div>
</div>
</div>


<?php 
if(!empty($_POST['submit'])){
if($_POST['idhimpunan']==''){
	$conn->get_results("insert into himpunan set idkriteria='$_POST[kriteria]',nama='$_POST[nama]',nilai='$_POST[nilai]'");
	echo "<script>window.alert('Himpunan Kriteria telah ditambahkan');window.location='./?page=himpunan';</script>";
}else{
	$conn->get_results("update himpunan set code='$_POST[code]',name='$_POST[name]',nilai='$_POST[nilai]' where idhimpunan='$_POST[idhimpunan]'");
	echo "<script>window.alert('Update data sukses');window.location='./?page=himpunan';</script>";
}
}

if($_GET['act']=='hapus'){
	$conn->get_results("delete from himpunan where idhimpunan='$_GET[id]'");
	echo "<script>window.alert('Hapus data sukses');window.location='./?page=himpunan';</script>";
}

?>	

