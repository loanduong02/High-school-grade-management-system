<div class="banner">

<center><img  style="height: 250px; width: 1200px;margin-left: 30px;" src="../assets/img/banner.png"></center>
<body  style="background-color: rgb(204, 223, 239);">
<?php
session_start();
echo '<br/>';
?>
<div style="text-align:right;margin-right:186px ">
<?php
echo "<b>Chào Bạn ".$_SESSION['ses_MaHS'];echo "</b>"
?>
</div>
<style type="text/css">
		#menu ul{
			margin-left:145px;

		}
		.menu{

			}
		#menu ul li{
		display:inline;

		}
		#menu ul a{
		text-decoration:none;
		width:245px;
		float:left;
		background:#336699;
		color:#FFFFFF;
		text-align:center;
		line-height:27px;
		font-weight:bold;
		border-left:1px solid #FFFFFF;
		}

		#menu ul a:hover{
		background:#000000;
		}

</style>

<link rel="stylesheet" type="text/css" href="style.css">
<div id="menu" >
		
    	<ul>
        	<li><a href="hocsinh/xemdiem_hs.php">Xem Điểm</a></li>
			<li><a href="hocsinh/hocsinh_xemthongtin.php">Thông Tin Học Sinh</a></li>
        	<li><a href="repass2.php">Thay Đổi Mật Khẩu</a></li>
        	<li><a href="logout.php">Đăng Xuất</a></li>

		</ul>
</div>
<table   border=0 cellpadding=4 cellspacing=0 align="center" width="1200">
<TR>
        <TD>	<tr>
        <td  colspan="2" bgcolor="#336699" align="center" style="color:white; height: 30px" >
            Copyright &copy; 2016 Trường THPT Võ Thành Trinh<br>
        </td>
    </tr>
    </td>
    </TR>
</table>

</body>
