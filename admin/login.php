<?php
require '../classes/DB.class.php';
session_start();
$connect= new DB();
$con=$connect->connect();
if(isset($_POST['ok'])){
	if($_POST['txtuser'] == null){
		?>
		<script type="text/javascript">
		alert("Bạn Chưa Nhập Tên Tài Khoản.");
		window.location="login.php";
		</script>
		<?php
		exit();

	}else{
		$u=$_POST['txtuser'];
	}
	if($_POST['txtpass'] == null){
		?>
		<script type="text/javascript">
		alert("Bạn Chưa Nhập Mật Khẩu.Vui lòng Nhập Mật Khẩu!");
		window.location="login.php";
		</script>
		<?php
		exit();
	}else{
		$p=$_POST['txtpass'];
	}
	if($u && $p){
		
		//require("../includes/config.php");

		$query="select * from user where username='$u' and password='$p'";
		$results = mysqli_query($con,$query);
		if	($numrows = mysqli_num_rows($results) == 0){
			?>
		<script type="text/javascript">
		alert("Tên Truy cập Hoặc Mật Khẩu chưa chính Xác.Vui Lòng Nhập Lại!");
		window.location="login.php";
		</script>
		<?php
		exit();
			
		}else{
			$data=mysqli_fetch_assoc($results);
			$_SESSION['ses_userid']=$data['userid'];
			$_SESSION['ses_username']=$data['username'];
			$_SESSION['password']=$data['password'];
			header("location:index.php");
			exit();
		}

	}
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>TRANG QUẢN TRỊ VIÊN</title>

    <!--  <link rel="stylesheet" href="../assets/css/css/style.css">
-->
  
</head>

<body>
		<style>
			body{
			background-color: rgb(204, 223, 239);

		}
.h1{
			color:#0f65be ;
			margin-top:35px;
			text-align: center;
			font-weight: bold;
			font-size: 25px;
			font-family: Tahoma
			
		}
.h2{
			color:#0f65be ;
			margin-top:25px;
			text-align: center;
			font-weight: bold;
			font-size: 25px;
			font-family: Tahoma
		}
.wrap{
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
		height: 1px ;
		display: block;
		background: #d1d1d1;
		}
.wrap input[type="text"] {
		border-radius: 7px 7px 0px 0px ;
	}
.wrap input[type="password"] {
		border-radius: 0px 0px 7px 7px ;
	}
.wrap button {
		width: 525px;
		border-radius: 7px;
		background: #b6ee65;
		text-decoration: center;
		border: none;
		color: #51771a;
		margin-top:10px;
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
	background: #448ed3 ;
	position: relative;
	bottom: -15px;
}
.avatar img {
	width: 85px;
	height: 85px;
	border-radius: 100px;
	margin: auto;
	border:3px solid #fff;
	display: block;
}
</style>



<div class="h1" >TRƯỜNG THPT VÕ THÀNH TRINH</div>
<div class="h2" >TRANG QUẢN TRỊ</div>
  <div class="wrap">
		<div class="avatar">
      <img src="../assets/img/boss.png">
		</div>
		<form action="login.php" method="post">
		<input type="text" name="txtuser" placeholder="Tên tài khoản" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpass" placeholder="Mật Khẩu" required>
		<br>
		<button type="submit" name="ok" value="Đăng Nhập" > Đăng Nhập</button>
	</form>
	</div>
  
    <script src="js/index.js"></script>

</body>
</html>