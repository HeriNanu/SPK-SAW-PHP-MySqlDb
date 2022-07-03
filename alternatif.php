<?php if($_GET['act']=='edit'){
	foreach($conn->get_results("Select *from alternatif where idalternatif='$_GET[id]'")as $row);
}
?>
<form action="" method="post" target="_self">
<table width="100%" border="0">
  <tr>
    <td width="13%">Kode</td>
    <td width="1%">:</td>
    <td width="86%">
    <input type="hidden" name="idalternatif" id="idalternatif" value="<?php echo $row['idalternatif'];?>">
    <input type="text" name="code" id="code" value="<?php echo $row['code'];?>" class="form-control"></td>
  </tr>
  <tr>
    <td>Alternatif</td>
    <td>:</td>
    <td><input type="text" name="name" id="name" value="<?php echo $row['name'];?>" class="form-control">
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

<div class="row">
 <div class="col-sm-12">
 <div class="card-box table-responsive">
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
<thead>
  <tr>
    <td width="3%" bgcolor="#CCCCCC"><strong>No</strong></td>
    <td width="6%" bgcolor="#CCCCCC"><strong>Kode</strong></td>
    <td width="79%" bgcolor="#CCCCCC"><strong>Alternatif</strong></td>
    <td width="12%" bgcolor="#CCCCCC"><strong>Action</strong></td>
  </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  foreach($conn->get_results("select *from alternatif ORDER by idalternatif ASC")as $data){?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo $data['code'];?></td>
    <td><?php echo $data['name'];?></td>
    <td><a href="./?page=alternatif&id=<?php echo $data['idalternatif'];?>&act=edit">Edit</a> | <a href="./?page=alternatif&id=<?php echo $data['idalternatif'];?>&act=hapus">Hapus</a></td>
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
if($_POST['idalternatif']==''){
	$conn->get_results("insert into alternatif set code='$_POST[code]',name='$_POST[name]'");
	echo "<script>window.alert('Alternatif telah ditambahkan');window.location='./?page=alternatif';</script>";
}else{
	$conn->get_results("update alternatif set code='$_POST[code]',name='$_POST[name]' where idalternatif='$_POST[idalternatif]'");
	echo "<script>window.alert('Update data sukses');window.location='./?page=alternatif';</script>";
}
}

if($_GET['act']=='hapus'){
	$conn->get_results("delete from alternatif where idalternatif='$_GET[id]'");
	echo "<script>window.alert('Hapus data sukses');window.location='./?page=alternatif';</script>";
}

?>	

