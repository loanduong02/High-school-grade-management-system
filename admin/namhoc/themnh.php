<?php
session_start();
require "../../classes/namhoc.class.php";
$con=new namhoc();
$nh ="";
if (!empty($_POST['add_nh']))
{
    
    // Lay data
    if($_POST['txtnh'] == null){
		echo "Bạn Chưa Nhập Vào Năm Học";
	}else{
		$nh=$_POST['txtnh'];
	}
   
   
    // Neu ko co loi thi insert
    if (!$errors){
        $nh=$con->add($data['NamHoc']);
        // Trở về trang danh sách
        ?>
        <script type="text/javascript">alert ("Đã Thêm Năm Học Thành Công");</script>
<?php
        header("location:../index.php?mod=nh");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thêm Môn Học</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<center><img  style="height: 250px; width: 1200px;margin-left: 30px;" src="../../assets/img/banner.png"></center>
<body style="background-color: rgb(204, 223, 239);">
<center>
<h1>Thêm Năm Học </h1>
<a href="../index.php?mod=nh"><button>Trở về</button></a> <br/> <br/>

<form method="post" action="themnh.php">
    <table width="50%" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Năm Học</td>
            <td>
                <input type="text" name="txtnh"  placeholder="Mẫu: 2016-2017"/>
               
        </tr>
       
        <tr>
            <td></td>
            <td>
                <input type="submit" name="add_nh" value="Lưu"/>
            </td>
        </tr>
    </table>
</form>
    </center>
</body>
</html>