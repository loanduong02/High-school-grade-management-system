<?php
session_start();
$ma = $ten = $khoi = $nam= "";
require "../../classes/lop.class.php";


$con = new lop();

if(isset($_POST['ok'])){
	$ma=$_POST['txtma'];
	$ten=$_POST['txtlop'];
	$khoi=$_POST['txtkhoi'];
    $nam=$_POST['txtnam'];

	$day = $con->add($ma, $ten, $khoi, $nam);
	header('location:../index.php?mod=lop');
}

?>

<style type="text/css">
	#menu table td
{
	font-weight: bold;
}
</style>
<center><img  style="height: 250px; width: 1200px;margin-left: 30px;" src="../../assets/img/banner.png"></center>
<body style="background-color: rgb(204, 223, 239);">
	<h1 align="center">Trang Thêm Lớp Học</h1>

<center>
	<a href="../index.php?mod=lop"><button >Trở về</button></a> <br/> <br/>
</center>

<form action="themlop.php" method="post" >

	<div id="menu">
<table align="center" border="1" cellspacing="0" cellpadding="10">
	<tr>
		<td>Mã Lớp:</td>
		<td>  <input required type="text" name="txtma" size="25" /><br/>
		</td>
	</tr>
	
    <tr>
		<td> Tên Lớp</td>
		<td><input required type="text" name="txtlop" size="25" /><br/> </td>
	</tr>

    <tr>
            <td> Khối Lớp</td>
            <td> <input required type="text" name="txtkhoi" size="25"  /><br/></td>
    </tr>

    <tr>
		<td>Năm Học:</td>
		<td><select required name="txtnam">

			<?php
			$connect=new db();
			$conn=$connect->connect();
			$query="select * from namhoc";
			$results = mysqli_query($conn,$query);
			while ($data = mysqli_fetch_assoc($results)) {
			    echo "<option value='$data[NamHoc]'>$data[NamHoc]</option>";
		    }
			?>

			</select></td>
	</tr>
  
    <tr>
			<td> </td>
			<td>  <input  type="submit" name="ok" value="Thêm Lớp Học" /><br/>
			</td>
		</tr>
</table>
		</div>
</form>

</body>