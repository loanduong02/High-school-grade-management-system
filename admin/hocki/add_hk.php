<?php
session_start();
$n=$ten="";
REQUIRE "../../classes/hocki.class.php";

if(isset($_POST['ok'])){
    $connect=new hocki();
    $d=$connect->allquery();
    if($_POST['txthk'] == null){
        echo "Bạn Chưa Nhập Mã Học Kỳ!";
    }
    else{
        $hocky="/^[0-9]{5}$/";
        if(preg_match($hocky,$_POST['txthk'])) {
            $n = $_POST['txthk'];
        }else{
            ?>
            <script type="text/javascript">
                alert("Ma Hoc Ky Khong Hop Le.!");
                window.location="add_hk.php";
            </script>
            <?php
            exit();
        }
    }
    if($_POST['txtten'] == null){
		echo "Bạn Chưa Nhập Vào Tên Học Kỳ";
	}else{
		$ten=$_POST['txtten'];
	}

    

   $namhoc=$_POST['nh'];

    if($n && $ten && $namhoc ){
        $con=$connect->add($n,$ten,$namhoc);
        ?>
        <script type="text/javascript">
            alert("Bạn Đã Thêm Học Kỳ Thành Công.Nhấn OK Để Tiếp Tục !");
            window.location="../index.php?mod=hk";
        </script>
        <?php
        exit();
        require ("../classes/DB.class.php");

    }
}
?>
<center><img style="height: 250px; width: 1200px;margin-left: 30px;" src="../../assets/img/banner.png"></center>
<body style="background-color: rgb(204, 223, 239);">
<h1 align="center">Trang Thêm Học Kỳ</h1>
<center>
<a href="../index.php?mod=hk"><button >Trở về</button></a> <br/> <br/>
</center>
<form action="add_hk.php" method="post">
    <table align="center" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Mã Số Học Kỳ:</td>
            <td>  <input type="text" name="txthk" size="25"  placeholder="Mẫu:12016"/><br/>
            </td>
        </tr>

        <tr>
            <td>Tên Học Kỳ:</td>
            <td><input type="text" name="txtten" size="25" placeholder="1 hoặc 2"/></td>
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
            <td>  <input type="submit" name="ok" value="Thêm Học Kỳ" /><br/>
            </td>
        </tr>
    </table>
</form>
</body>