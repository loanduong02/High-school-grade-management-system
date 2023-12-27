<?php
require "../includes/config.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>
    <title>Danh sách học sinh</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body bgcolor="#CAFFFF">

    <h1  class="h1" style="font-family:Tahoma;text-align: center; margin-top:0px;  ">Điểm Học Sinh</h1>
    
    <h2 align="center">

    <form action="qlgv.php?mod=hs" method="post">
    <center >
                <table style="text-align:center">
                    <th>
                    <td>Học Kỳ:</td>
                    <td>
                        <select name="hk" style="width:100px;height: 25px ">
                    <?php
                    $query="select MaHocKy from hocky";
                    $results=mysqli_query($conn,$query);
                    while($data=mysqli_fetch_assoc($results)){
                        echo "<option value='$data[MaHocKy]'>$data[MaHocKy]</option>";
                    }
                    ?>
                        </select>
                    </td>
                    </th>
                    
                    <th>
                    <td> Năm Học:</td>
                    <td>
                        <select name="nh" style="width:100px;height: 25px ">
                    <?php
                    $query="select NamHoc from hocky";
                    $results=mysqli_query($conn,$query);
                    while($data=mysqli_fetch_assoc($results)){
                        echo "<option value='$data[NamHoc]'>$data[NamHoc]</option>";
                    }
                    ?>
                        </select>
                    </td>
                    </th>


                    <th>
                        <td> Lớp: </td>
                        <td>
                        <select name="lop" style="width:100px;height: 25px">
                    <?php
                    $query2="select * from lophoc";
                    $results2=mysqli_query($conn,$query2);
                    while($data2=mysqli_fetch_assoc($results2)){
                        echo "<option value='$data2[MaLopHoc]'>$data2[MaLopHoc]</option>";
                    }
                    ?>
                </select>
                        </td>
                    </th>

                    <th>
                        <td>Môn Học:</td>
                        <td> 
                        <select name="mon" style="width:100px;height: 25px">
                            <?php
                        $query3="select * from monhoc";
                        $results3=mysqli_query($conn,$query3);
                        while($data3=mysqli_fetch_assoc($results3)){
                            echo "<option value='$data3[MaMonHoc]'>$data3[MaMonHoc]</option>";
                        }
                        ?>

                </select>
                        </td>
                    </th>
                     
                   
                </table>
                <input style="width:100px;height: 25px; margin-left:32px; " type="submit" name="add" value="Chọn" />
          
        </form>
        </center>
    
        <form action="xemdiem_gv.php" method="post">
    </h2>
    <table style="text-align: center; margin-left:80px" width="90%" border="1" cellspacing="0" cellpadding="10" >
        <tr class="diem" style="font-weight: bold;color: #0A246A">
            <td width="5%" >Mã Học Sinh</td>
            <td width="15%">Tên Học Sinh</td>
            <td>Lớp</td>
            <td width="3%">Học Kỳ</td>
            <td width="10%">Năm Học</td>
            <td width="10%" >Môn Học</td>
            <td>Điểm Miệng</td>
            <td>Điểm 15 phút</td>
            <td>Điểm 15 phút</td>
            <td>Điểm 1 tiết</td>
            <td>Điểm 1 tiết</td>
            <td>Điểm Thi</td>
            <td>Điểm TB môn</td>
        </tr>
        <?php
    ?>
        <?php
    require "../classes/diem.class.php";
    $connect=new diem();
    $students=$connect->alldiem();
    if(isset($_POST['add'])) {
        foreach ($students as $item) {
            if ($_POST['hk'] == $item['MaHocKy'] && $_POST['lop'] == $item['MaLopHoc'] && $_POST['mon'] == $item['MaMonHoc']) {

                ?>
        <tr>
            <td><?php echo $item['MaHS']; ?></td>
            <td><?php echo $item['TenHS']; ?></td>
            <td><?php echo $item['Tenlophoc']; ?></td>
            <td><?php echo $item['TenHocKy']; ?></td>
            <td><?php echo $item['NamHoc']; ?></td>
            <td><?php echo $item['TenMonHoc']; ?></td>
            <td><?php echo $item['DiemMieng']; ?></td>
            <td><?php echo $item['Diem15Phut1']; ?></td>
            <td><?php echo $item['Diem15Phut2']; ?></td>
            <td><?php echo $item['Diem1Tiet1']; ?></td>
            <td><?php echo $item['Diem1Tiet2']; ?></td>
            <td><?php echo $item['DiemThi']; ?></td>
            <?php
                    $tinh = 0;
                    $tinh = ($item['DiemMieng'] + $item['Diem15Phut1'] + $item['Diem15Phut2'] + ($item['Diem1Tiet1'] + $item['Diem1Tiet2']) * 2 + $item['DiemThi'] * 3) / 10;
                    $item['DiemTB'] = $tinh;
                    ?>
            <td><?php echo round($item['DiemTB'], 1); ?></td>
        </tr>
        <?php
            }
        }
    }
    ?>
    </table>
    </form>
</body>

</html>