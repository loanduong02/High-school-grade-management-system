<div class="banner">
<center><img  style="height: 250px; width: 1200px;margin-left: 30px;" src="../assets/img/banner.png"></center>

    <body  style="background-color: rgb(204, 223, 239);">
        <?php

define('ROOT', dirname(__FILE__) );
include "../includes/function.php";
session_start();
?>
     <style type="text/css">
		#menu ul{
			margin-left:100px;

		}
		
		#menu ul li{
		display:inline;

		}
		#menu ul a{
	
		text-decoration:none;
		width:200px;
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
        <div id="menu">
            <ul>
                <li><a href="diem/add_chon2.php">Nhập Điểm Lần Đầu</a></li>
                <li><a href="diem/capnhatdiem.php"> Cập Nhật Điểm</a></li>
                <li><a href="qlgv.php?mod=hs">Xem Điểm</a></li>
                <li><a href="repass1.php">Thay Đổi Mật Khẩu</a></li>
                <li><a href="logout.php">Đăng Xuất</a></li>

            </ul>
        </div>
        <br />
        <div>
            <p style="font-family:Tahoma;font-weight: bold;text-align: center;font-size: large">CHÀO MỪNG BẠN ĐẾN TRANG
                QUẢN LÝ CỦA GIÁO VIÊN</p>
        </div>
        <div class="right">
            <?php include"mod_gv.php";?>
        </div>

        <table border=0 cellpadding=4 cellspacing=0 align="center" width="1200">
            <TR>
                <TD>
            <tr>
                <td colspan="2" bgcolor="#336699" align="center" style="color:white; height: 30px">
                    Copyright &copy; 2016 Trường THPT Võ Thành Trinh<br>
                </td>
            </tr>
            </td>
            </TR>
        </table>
    </body>