<?php
session_start();
require "../../classes/lop.class.php";
$connect=new lop();
$ten=$khoi="";
$ma=$_GET['id'];
if(isset($_POST['ok'])){
	if($_POST['txtten'] == null){
		echo "Bạn Chưa Nhập Tên Học Kỳ.";
	}else{
		$ten=$_POST['txtten'];
	}
	if($_POST['txtkhoi'] == null){
		echo "Bạn Chưa Nhập Tên Học Kỳ.";
	}else{
		$khoi=$_POST['txtkhoi'];
	}
	$namhoc=$_POST['nh'];
	
	if( $ma && $ten && $khoi && $namhoc){
	    $con=$connect->edit($ma, $ten,$khoi,$namhoc);
		header("location:../index.php?mod=lop");
		exit();
	}
}
$conn=$connect->selectlop($ma);
?>
<center><img  style="height: 250px; width: 1200px;margin-left: 30px;" src="../../assets/img/banner.png"></center>
<body style="background-color: rgb(204, 223, 239);">
<h1 align="center">Trang Sửa Lớp Học</h1>

<center> 
<a href="../index.php?mod=lop"><button>Trở về</button></a> <br/> <br/>
</center>
<form action="sualop.php?id=<?php echo $conn['MaLopHoc'];?>" method="post">
<table align="center" border="1" cellspacing="0" cellpadding="10">
	
        <tr>
			<td> Lớp Học:</td>
			<td><input type="text" name="txtten" size="25" value="<?php echo $conn['Tenlophoc']; ?>"/></td>
		</tr>

        <tr>
			<td> Khối:</td>
			<td><input type="text" name="txtkhoi" size="25" value="<?php echo $conn['KhoiHoc']; ?>"/></td>
		</tr>

		<tr>
			<td> Năm Học</td>
				<td><select name="nh">
					<?php
					$db=new DB();
					$conn=$db->connect();
					$query="select * from namhoc";
					$results = mysqli_query($conn,$query);
					while ($data = mysqli_fetch_assoc($results)) {
					echo "<option value='$data[NamHoc]'>$data[NamHoc]</option>";
						$di=$db->close();
			}
					?>

				</select></td>
		</tr>


<tr>
			<td> </td>
			<td>  <input type="submit" name="ok" value=" Lưu" /><br/>
			</td>
		</tr>
</table>
</form>
</body>