<?php
session_start();
require '../../classes/day.class.php';
$con = new day();
require '../../includes/config.php';
$ma = $_GET['id'];
$mon=$gv=$lop=$hk=$nh=$mt="";

if(isset($_POST['ok'])){
    if($_POST['txtmon'] == null){
        echo 'Bạn chưa nhập mã môn!!';
    }else{
        $mon = $_POST['txtmon'];
    }

    if($_POST['txtgv'] == null){
        echo 'Bạn chưa nhập mã giáo viên!!';
    }else{
        $gv = $_POST['txtgv'];
    }

    if($_POST['txtlop'] == null){
        echo 'Bạn chưa nhập lớp!!';
    }else{
        $lop = $_POST['txtlop'];
    }

    if($_POST['txthk'] == null){
        echo 'Bạn chưa nhập học kỳ!!';
    }else{
        $hk = $_POST['txthk'];
    }

    if($_POST['txtnh'] == null){
        echo 'Bạn chưa nhập năm học!!';
    }else{
        $nh = $_POST['txtnh'];
    }

    if($_POST['txtmt'] == null){
        echo 'Bạn chưa nhập mô tả phân công!!';
    }else{
        $mt = $_POST['txtmt'];
    }

   

    if($ma && $mon && $gv && $lop && $hk && $nh && $mt ){
        

        $d = $con->edit ($ma, $mon, $gv, $lop, $hk, $nh, $mt);
        
       // $results = mysqli_query($conn, $query);
        header('location:../index.php?mod=day');
        exit();
    }
}
$row=$con->selectquery($ma);
?>

<center><img style="height: 250px; width: 1200px;margin-left: 30px;" src="../../assets/img/banner.png"></center>
<body  style="background-color: rgb(204, 223, 239);">
<h1 style="text-align: center">TRANG SỬA PHÂN CÔNG LỊCH DẠY</h1>
<center>
	<a href="../index.php?mod=day"><button >Trở về</button></a> <br/> <br/>
</center>
<table align="center" border="1" cellspacing="0" cellpadding="10">
<form action="suaday.php?id=<?php echo $row['MaDayHoc']; ?>" method="post">


	
    <tr>
		<td>Môn Học</td>
		<td><select required name="txtmon">

			<?php
			$connect=new db();
			$conn=$connect->connect();
			$query="select * from monhoc";
			$results = mysqli_query($conn,$query);
			while ($data = mysqli_fetch_assoc($results)) {
			    echo "<option value='$data[MaMonHoc]'>$data[MaMonHoc]</option>";
		    }
			?>

			</select></td>
	</tr>

    <tr>
            <td>Mã Giáo Viên:</td>
            <td><select name="txtgv">
                    <?php
                    $db=new DB();
                    $conn=$db->connect();
                    $query="select * from giaovien";
                    $results = mysqli_query($conn,$query);
                    while ($data = mysqli_fetch_assoc($results)) {
                        echo "<option value='$data[Magv]'>$data[Magv]</option>";
                    }
                    ?>
                </select></td>
    </tr>

    <tr>
		<td>Lớp:</td>
		<td><select required name="txtlop">

			<?php
			$connect=new db();
			$conn=$connect->connect();
			$query="select * from lophoc";
			$results = mysqli_query($conn,$query);
			while ($data = mysqli_fetch_assoc($results)) {
			    echo "<option value='$data[MaLopHoc]'>$data[MaLopHoc]</option>";
		    }
			?>

			</select></td>
	</tr>

    
    <tr>
		<td>Học Kỳ</td>
		<td><select required name="txthk">

			<?php
			$connect=new db();
			$conn=$connect->connect();
			$query="select * from hocky";
			$results = mysqli_query($conn,$query);
			while ($data = mysqli_fetch_assoc($results)) {
			    echo "<option value='$data[MaHocKy]'>$data[MaHocKy]</option>";
		    }
			?>

			</select></td>
	</tr>

    <tr>
		<td>Năm Học:</td>
		<td><select required name="txtnh">

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
            <td>Mô Tả:</td>
            <td><input type="text" name="txtmt" size="25" value="<?php echo $row['MoTa'];?>" /></td>
    </tr>
	
	    </tr>

			<td> </td>
			<td>  <input type="submit" name="ok" value="Sửa" /><br/>
			</td>
		</tr>
</form>
</TABLE>
</body>