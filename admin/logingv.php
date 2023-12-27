<?php
session_start();
require '../classes/DB.class.php';
$connect=new DB();
$con=$connect->connect();
$ugv=$pgv="";
if(isset($_POST['gv'])){
	if($_POST['txtusergv'] == null){
		?>
<script type="text/javascript">
alert("Bạn Chưa Nhập Tên Tài Khoản.");
window.location = "logingv.php";
</script>
<?php
		exit();
	}else{
		$ugv=$_POST['txtusergv'];
	}
	if($_POST['txtpassgv'] == null){
		?>
<script type="text/javascript">
alert("Bạn Chưa Nhập mật khẩu Tài Khoản.");
window.location = "logingv.php";
</script>
<?php
		exit();
	}
	else{
		$pgv=$_POST['txtpassgv'];
	}
	if($ugv && $pgv){
		$query="select * from giaovien where Magv='$ugv' and passwordgv='$pgv'";
		$results = mysqli_query($con,$query);

		if($rowscount = mysqli_num_rows($results) == 0){
			?>
<script type="text/javascript">
alert("Tên tài khoản hoặc mật khẩu chưa chính xác.Vui lòng nhập lại!!");
window.location = "logingv.php";
</script>
<?php
		exit();
		}else{

			$data=mysqli_fetch_assoc($results);
			$_SESSION['ses_Magv']=$data['Magv'];
			$_SESSION['ses_passwordgv']=$data['passwordgv'];
			header("location:qlgv.php");
			exit();
		}

	}
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>TRANG ĐĂNG NHẬP GIÁO VIÊN</title>

</head>

<body>
    <style>
    body {
        background-color: rgb(204, 223, 239);

    }

    .h1 {
        color: #0f65be;
        margin-top: 35px;
        text-align: center;
        font-weight: bold;
        font-size: 25px;
        font-family: Tahoma
    }

    .h2 {
        color: #0f65be;
        margin-top: 25px;
        text-align: center;
        font-weight: bold;
        font-size: 25px;
        font-family: Tahoma
    }

    .wrap {
        text-align: center;
    }

    .wrap input {
        border: none;
        background: #fff;
        height: 50px;
        width: 500px;
        outline: none;
        padding: 6px 12px 6px 12px;
    }

    .bar i {
        width: 90px;
        margin: auto;
        height: 1px;
        display: block;
        background: #d1d1d1;
    }

    .wrap input[type="text"] {
        border-radius: 7px 7px 0px 0px;
    }

    .wrap input[type="password"] {
        border-radius: 0px 0px 7px 7px;
    }

    .wrap button {
        width: 525px;
        border-radius: 7px;
        background: #b6ee65;
        text-decoration: center;
        border: none;
        color: #51771a;
        margin-top: 10px;
        padding-top: 14px;
        padding-bottom: 14px;
        outline: none;
        font-size: 13px;
        border-bottom: 3px solid #307d63;
        cursor: pointer;
    }

    .avatar {
	
        width: 87px;
        margin: auto;
        border-radius: 100px;
        height: 90px;
        background: #448ed3;
        position: relative;
        bottom: -15px;
    }

    .avatar img {
        width: 85px;
        height: 85px;
        border-radius: 100px;
        margin: auto;
        border: 3px solid #fff;
        display: block;
    }
    </style>



    <div class="h1">TRƯỜNG THPT VÕ THÀNH TRINH</div>
    <div class="h2">TRANG GIÁO VIÊN</div>

    <div class="wrap">
        <div class="avatar">
            <img src="../assets/img/boss.png">
        </div>
        <form action="logingv.php" method="post">
            <input type="text" name="txtusergv" placeholder="Tên tài khoản" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="password" name="txtpassgv" placeholder="Mật Khẩu" required>

            <br>
            <button type="submit" name="gv" value="Đăng Nhập" > Đăng Nhập</button>
        </form>
    </div>

    <script src="js/index.js"></script>

</body>

</html>