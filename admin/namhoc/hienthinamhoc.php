<?php
require "../classes/namhoc.class.php";
$con=new namhoc();
$nh=$con->allnamhoc();
?>
<script type="text/javascript">
    function XacNhan(){
        if(!window.confirm('Bạn Có Chắc Muốn Xóa Năm Học Này Không?')){
            return false;
        }
    }
</script>
<!DOCTYPE html>
<html>
<head>
    <title>Danh sách Năm Học</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1 align="center">Danh sách Năm Học</h1>

<h3 align="center"><a href="namhoc/themnh.php"><button>Thêm Năm Học</button></a></h3>

<table align="center" border="1" cellspacing="0" cellpadding="10">
    <tr style="font-weight: bold">
        <td> Năm Học </td>
        <td>Chức Năng</td>
    </tr>
    <?php foreach ($nh as $row){ ?>
        <tr>
            <td><?php echo $row['NamHoc']; ?></td> 
            <td><?php echo "<a href='namhoc/suanh.php?id=$row[NamHoc]'><button type='button'>Sửa</button></a>"; ?>
                <?php echo "<a href='namhoc/xoanh.php?id=$row[NamHoc]' onclick='return XacNhan();'><button type='button'>Xóa</button></a>"; ?>
            </td>
        </tr>
    <?php } ?>
    <br/>
</table>
