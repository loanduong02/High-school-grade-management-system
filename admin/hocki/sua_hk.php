<?php
session_start();
require "../../classes/hocki.class.php";
$connect=new hocki();
$ten="";
$mahk=$_GET['cmahk'];
if(isset($_POST['ok'])){
	
	if($_POST['txtten'] == null){
		echo "Bạn Chưa Nhập Tên Học Kỳ.";
	}else{
		$ten=$_POST['txtten'];
	}
	
	$namhoc=$_POST['nh'];
	
	if( $ten && $namhoc){
	    $con=$connect->edit($mahk,$ten,$namhoc);
		header("location:../index.php?mod=hk");
		exit();
	}
}
$conn=$connect->selectquery($mahk);
?>
<center><img  style="height: 250px; width: 1200px;margin-left: 30px;" src="../../assets/img/banner.png"></center>
<body style="background-color: rgb(204, 223, 239);">
<h1 align="center">Trang Sửa Học Kỳ</h1>

<center> 
<a href="../index.php?mod=hk"><button>Trở về</button></a> <br/> <br/>
</center>
<form action="sua_hk.php?cmahk=<?php echo $conn['MaHocKy'];?>" method="post">
<table align="center" border="1" cellspacing="0" cellpadding="10">
	
<tr>
			<td>Tên Học Kỳ:</td>
			<td><input type="text" name="txtten" size="25" value="<?php echo $conn['TenHocKy']; ?>"/></td>
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