<?php
define('ROOT', dirname(__FILE__) );
include "../includes/function.php";
session_start();


?>


  <?php include "./user/trangcapnhat.php" 
?> 

<div class="banner">


<img style="height: 250px; width: 1200px;margin-left: 30px;" src="../assets/img/banner.png">

    <body  style="background-color: rgb(204, 223, 239);">
    <style type="text/css">
        #menu ul{
            margin-left: -3px;

        }

        #menu ul li{
            color: #f1f1f1;
            display: inline-block;
            width: 144px;
            height: 40px;
            line-height: 40px;
            margin-left: -5px;
            text-align:center;
            font-weight:bold;

        }

        #menu ul a{
            text-decoration:none;
            width:149px;
            float:left;
            background:#336699;
            color:#FFFFFF;
            text-align:center;
            line-height:30px;
            font-weight:bold;
            border-left:1px solid #FFFFFF;
        }

        #menu ul a:hover{
            background:#000000;
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

    </style>

<link rel="stylesheet" type="text/css" href="style.css">
<div id="menu" >
    <p class="h1">CHÀO MỪNG BẠN ĐẾN TRANG QUẢN TRỊ HỆ THỐNG</p>
    <p class="h2">TRƯỜNG THPT VÕ THÀNH TRINH</p>
    	<ul>
            <li><a href="index.php?mod=gv">Quản Lý Giáo Viên</a></li>
            <li><a href="index.php?mod=hs">Quản Lý Học Sinh</a></li>
          
            <li><a href="index.php?mod=mh">Quản Lý Môn Học</a></li>
            <li><a href="index.php?mod=diem">Quản Lý Điểm</a></li>
        	<li><a href="index.php?mod=hk">Quản Lý Học Kỳ</a></li>
            <li><a href="index.php?mod=nh">Năm Học</a></li>
        	<li><a href="index.php?mod=lop">Quản Lý Lớp</a></li>
            <li><a href="index.php?mod=day">Lịch Dạy</a></li>
            
        </ul>
</div>
<?php include"mod.php";?>
<table  border=0 cellpadding5 cellspacing=0 align="center" width="1300">
    <TR>
        <TD>	<tr>
       <td  colspan="2" bgcolor="#336699" align="center" style="color:white; height: 30px" >
            Copyright &copy; 2016 Trường THPT Võ Thành Trinh<br>
        </td>
    </tr>
    </td>
    </TR>
</table>