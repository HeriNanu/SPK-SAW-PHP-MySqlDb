<?php if($_GET['act']=='edit'){
	foreach($conn->get_results("Select *from kriteria where idkriteria='$_GET[id]'")as $row);
}
?>
<form action="" method="post" target="_self">
<table width="100%" border="0">
 
  <tr>
    <td width="13%">Kriteria</td>
    <td width="1%">:</td>
    <td width="86%">
    <input type="hidden" name="idkriteria" id="idkriteria" value="<?php echo $row['idkriteria'];?>" class="form-control">
    <input type="text" name="kriteria" id="kriteria" value="<?php echo $row['kriteria'];?>" class="form-control"></td>
  </tr>
  <tr>
    <td>Atribut</td>
    <td>:</td>
    <td><select name="atribut" id="atribut"  class="form-control">
    <option value="benefit" <?php if($row['atribut']=='benefit'){ echo "selected";}?>>Benefit</option>
    <option value="cost" <?php if($row['atribut']=='cost'){ echo "selected";}?>>Cost</option>
    </select>
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
    <th width="3%" bgcolor="#CCCCCC"><strong>No</strong></th>
    <th width="55%" bgcolor="#CCCCCC"><strong>Kriteria</strong></th>
    <th width="30%" bgcolor="#CCCCCC"><strong>Atribut</strong></th>
    <th width="12%" bgcolor="#CCCCCC"><strong>Action</strong></th>
  </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  foreach($conn->get_results("select *from kriteria ORDER by idkriteria ASC")as $data){?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo $data['kriteria'];?></td>
    <td><?php echo $data['atribut'];?></td>
    <td><a href="./?page=kriteria&id=<?php echo $data['idkriteria'];?>&act=edit">Edit</a> | <a href="./?page=kriteria&id=<?php echo $data['idkriteria'];?>&act=hapus">Hapus</a></td>
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
if($_POST['idkriteria']==''){
	$conn->get_results("insert into kriteria set kriteria='$_POST[kriteria]',atribut='$_POST[atribut]'");
	echo "<script>window.alert('Kriteria telah ditambahkan');window.location='./?page=kriteria';</script>";
}else{
	$conn->get_results("update kriteria set kriteria='$_POST[kriteria]',atribut='$_POST[atribut]' where idkriteria='$_POST[idkriteria]'");
	echo "<script>window.alert('Update data sukses');window.location='./?page=kriteria';</script>";
}
}

if($_GET['act']=='hapus'){
	$conn->get_results("delete from kriteria where idkriteria='$_GET[id]'");
	echo "<script>window.alert('Hapus data sukses');window.location='./?page=kriteria';</script>";
}

?>	

