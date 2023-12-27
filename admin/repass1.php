
<?php
session_start();
$u=$_SESSION['ses_Magv'];
$pgv=$_SESSION['ses_passwordgv'];
require ("../classes/DB.class.php");
$connect=new db();
?>
<?php
$old=$new=$pre=" ";
if(isset($_POST['gv'])){
	if($_POST['txtpassgv'] == null){
		echo "ban chua nhap mat khau.";
	}else{
		if($_POST['txtpassgv'] != $pgv){
			echo "mat khau va mat khau cu khong trung.";
		}else{
			$old=$_POST['txtpassgv'];
		}
	}
	if($_POST['txtpassgv2'] == null){
		echo "ban chua nhap mat khau moi.";
	}else {
		if ($_POST['txtpassgv2'] != $_POST['txtpassgv3']) {
			echo "mat khau nhap vao khong trung nhau";
		} else {
			if ($_POST['txtpassgv2'] != $_POST['txtpassgv3']) {
				echo "mat khau nhap vao khong trung nhau";
			} else {
				$mk = "/^[a-zA-Z0-9]{6,}$/";
				if (preg_match($mk, $_POST["txtpassgv2"])) {
					$new = $_POST['txtpassgv2'];
				} else {
					?>
					<script type="text/javascript">
						alert("Password Nhap Vao Khong Hop Le.!");
						window.location = "repass1.php";
					</script>
					<?php
					exit();
				}
			}
		}
	}
	if($u && $pgv && $old && $new && $pre){

		$conn=$connect->connect();
		$query="update giaovien SET passwordgv='$new' where Magv=$u";
		$results = mysqli_query($conn,$query);
		?>
		<script type="text/javascript">
		alert("Đã Thay doi mat khau thanh cong!");
		window.location="qlgv.php";
		</script>
		<?php
		exit();

	}
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Thay Đổi Mât Khẩu</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
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
			margin-top: 50px;
			text-align: center;
		}
.wrap input {
		border: none;
		background: #fff;
		height: 50px;
		width: 500px;
		outline: none;
		padding: 6px 12px 5px 10px;
		margin-bottom: 3px;
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
		border-radius: 7px 7px 7px 7px ;
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
.btn{	 text-decoration:none;

		margin-left:380px;
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
}		
</style>


  <div class="wrap">
  <div class="avatar">
      <img src="../assets/img/boss.png">
		</div>
		<form action="repass1.php" method="post">
		<input type="password" name="txtpassgv" placeholder="mật khẩu" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpassgv2" placeholder="mật khẩu mới" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpassgv3" placeholder="nhập lại mật khẩu mới" required>
		
		<br>
		<button type="submit" name="gv" value="Đăng Nhập" > Thay Đổi</button>
		
	</form>
	</div>
  
    <script src="js/index.js"></script>

</body>
</html>