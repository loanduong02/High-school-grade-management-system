<?php
session_start();
require "../classes/giaovien.class.php";
$con=new giaovien();
$ma=$_GET['cma'];
$t=$gt=$dc=$dt=$p="";
if(isset($_POST['ok'])){
	

	if($_POST['txtten'] == null){
		echo "Bạn Chưa Nhập Vào Ten Giao Vien";
	}else{
		$t=$_POST['txtten'];
	}
	if($_POST['txtgt'] == null){
		echo "Bạn Chưa Nhập gt";
	}else{
		$gt=$_POST['txtgt'];
	}

	if($_POST['txtdiachi'] == null){
		echo "Bạn Chưa Nhập Vào Ten Giao Vien";
	}else{
		$dc=$_POST['txtdiachi'];
	}

	if($_POST['txtdienthoai'] == null){
		echo "Bạn Chưa Nhập Vào Ten Giao Vien";
	}else{
		$dt=$_POST['txtdienthoai'];
	}

	if($_POST['txtpass'] == null){
		echo "Bạn Chưa Nhập Vào Ten Giao Vien";
	}else{
		$p=$_POST['txtpass'];
	}
	 
	if( $t && $gt  && $dc && $dt && $p){
		$giaovien=$con->edit($ma,$t,$gt,$dc,$dt,$p);
		header("location:index.php?mod=gv");
		$dis=$con->dis();
		exit();
	}
	$dis=$con->dis();
}
?>
<?php
$row=$con->selectgv($ma);

?>
<center><img style="height: 250px; width: 1200px;margin-left: 30px;" src="../assets/img/banner.png"></center>
<body style="background-color: rgb(204, 223, 239);">
	<h1 align="center">Trang Sửa giáo viên</h1>
	<center>
<a href="./index.php?mod=gv"><button >Trở về</button></a> <br/> <br/>
</center>
<form action="sua_gv.php?cma=<?php echo $row['Magv'];?>" method="post">
<table align="center" border="1" cellspacing="0" cellpadding="10">
		
		<tr>
			<td>Tên giáo viên:</td>
			<td><input type="text" name="txtten" size="25" value="<?php echo $row['Tengv']; ?>" /></td>
		</tr>
		<tr>
		<td> Giới Tính</td>
			<td><input type="text" name="txtgt" size="25" value="<?php echo $row['GioiTinh']; ?>" /></td>
		</tr>
		<tr>
			<td>Địa Chỉ: </td>
			<td><textarea type="text" name="txtdiachi"><?php echo $row['DiaChi']; ?> </textarea></td>
		</tr>
		<tr>
			<td>Điện Thoại:</td>
			<td><input type="text" name="txtdienthoai" size="25" value="<?php echo $row['SDT']; ?>" /> </td>
		</tr>
		<tr>
			<td>Password giáo viên:</td>
			<td><input type="password" name="txtpass" size="25" value="<?php echo $row['passwordgv']; ?>"/></td>
		</tr>
		<tr>
			<td> </td>
			<td>  <input type="submit" name="ok" value="Sửa" /><br/>
			</td>
		</tr>
</table>
</form>
</body>
