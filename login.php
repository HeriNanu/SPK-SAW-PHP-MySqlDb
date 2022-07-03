<?php if($_GET['act']=='edit'){
	foreach($conn->get_results("Select *from kriteria where idkriteria='$_GET[id]'")as $row);
}
?>
<form action="" method="post" target="_self">
<table width="30%" border="0" align="center">
 
  <tr>
    <td width="13%">Username</td>
    <td width="1%">:</td>
    <td width="86%">
    <input type="text" name="username" id="username" value="<?php echo $row['username'];?>" class="form-control"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td> <input type="password" name="password" id="password" value="<?php echo $row['password'];?>" class="form-control">
    </td>
  </tr><tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><button type="submit" name="login" id="login" class="btn btn-primary"><i class="fa fa-unlock"></i> Login </button></td>
  </tr>
  
</table>
</form>


<?php 
if(!empty($_POST['username'])){
	if($_POST['username']<>'' && $_POST['password']<>''){
		foreach($conn->get_results("select *from admin where username='$_POST[username]' and password='".md5($_POST['password'])."'")as $cek_login);
		if($cek_login['username']<>''){
			$_SESSION['username']=$cek_login['username'];
		echo "<script>window.location='./';</script>";
		}else{
			
		echo "<script>window.alert('Username atau Password Salah');window.location='./?page=login';</script>";
		}
	}else{
		
		echo "<script>window.alert('Username atau Passowrd tidak boleh kosong');window.location='./?page=login';</script>";
	}
}

?>	

