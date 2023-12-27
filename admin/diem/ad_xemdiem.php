<?php
require '../includes/config.php';
?>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">
    function XacNhan() {
        if (!window.confirm('Bạn Có Chắc Muốn Xóa Học Sinh Này Không!!!')) {
            return false;
        }
    }
</script>
<!DOCTYPE html>
<html>

<head>
    <title>Danh sách học sinh</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body bgcolor="#CAFFFF">
    <br />
    <h1 class="h1">Điểm Học Sinh</h1>
    <h2 align="center">
        <form action="index.php?mod=diem" method="post">
            
            <div style="text-align:center">
                <?php
                ?>
                <center>
                    <table>
                        <th>
                        <td>Học Kỳ</td>
                        <td>
                            <select name="hk">

                                <?php
                                $query = "select MaHocKy from hocky";
                                $results = mysqli_query($conn, $query);
                                while ($data = mysqli_fetch_assoc($results)) {
                                    echo "<option value='$data[MaHocKy]'>$data[MaHocKy]</option>";
                                }
                                ?>
                            </select>
                        </td>
                        </th>
                        <th>
                        <td>Lớp</td>
                        <td>
                            <select name="lop">
                                <?php
                                $query2 = "select * from lophoc";
                                $results2 = mysqli_query($conn, $query2);
                                while ($data2 = mysqli_fetch_assoc($results2)) {
                                    echo "<option value='$data2[MaLopHoc]'>$data2[MaLopHoc]</option>";
                                }
                                ?>
                            </select>
                        </td>
                        </th>
                        <th>
                        <td>Môn Học</td>
                        <td>
                            <select name="mon">
                                <?php
                                $query3 = "select  * from monhoc";
                                $results3 = mysqli_query($conn, $query3);
                                while ($data3 = mysqli_fetch_assoc($results3)) {
                                    echo "<option value='$data3[MaMonHoc]'>$data3[MaMonHoc]</option>";
                                }
                                ?>

                            </select>
                        </td>
                        </th>
                        <th>
                        <td>Năm Học</td>
                        <td>
                            <select name="namhoc">
                                <?php
                                $query4 = "select  * from namhoc";
                                $results4 = mysqli_query($conn, $query4);
                                while ($data4 = mysqli_fetch_assoc($results4)) {
                                    echo "<option value='$data4[NamHoc]'>$data4[NamHoc]</option>";
                                }
                                ?>

                        </td>

                        </select>
                        </th>

                    </table>
                </center>
              <br>  <input type="submit" name="add" value="Chọn">

            </div>
        </form>
        <form action="ad_xemdiem.php" method="post">
        </form>
    </h2>
    <table width="95%" border="1" cellspacing="0" cellpadding="6" style="margin-left:40px">
        <tr class="diem" style="font-weight: bold;color: #0A246A">
            <td >Mã Học Sinh</td>
            <td width="15%">Tên Học Sinh</td>
            <td>Lớp Học</td>
            <td>Học Kỳ</td>
            <td width="10%" > Môn Học</td>
            <td>Điểm Miệng</td>
            <td>Điểm 15 phút</td>
            <td>Điểm 15 phút</td>
            <td>Điểm 1 tiết</td>
            <td>Điểm 1 tiết</td>
            <td>Điểm Thi</td>
            <td>Điểm TB môn</td>
            <td>Sửa Điểm</td>
            <td>Xóa Điểm</td>
        </tr>
        <?php
        ?>
        <?php
        require "../classes/diem.class.php";
        $connect = new diem();
        $students = $connect->alldiem();

        // $query1="select * from day,hocky, lophoc,monhoc WHERE day.MaHocKy= hocky.MaHocKy && 
        //  day.MaLopHoc = lophoc.MaLopHoc && monhoc.MaMonHoc= day.MaMonHoc";
        // $results1 =mysqli_query($conn, $query1);
        // $row=mysqli_fetch_assoc($results1);

        if (isset($_POST['add'])) {
            foreach ($students as $item) {
                if ($_POST['hk'] == $item['MaHocKy'] && $_POST['lop'] == $item['MaLopHoc'] && $_POST['mon'] == $item['MaMonHoc']) {
        ?>
                    <tr>
                        <td><?php echo $item['MaHS']; ?></td>
                        <td><?php echo $item['TenHS']; ?></td>

                        <td><?php echo $item['MaLopHoc']; ?></td>
                        <td><?php echo $item['MaHocKy']; ?></td>
                        <td><?php echo $item['MaMonHoc']; ?></td>
                        
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
                        <td><?php echo "<a href='diem/suadiem.php?cma=$item[MaDiem]'><button type='button'>Sửa</button></a>"; ?></td>
                        <td><?php echo "<a href='diem/xoadiem.php?cma=$item[MaDiem]'  onclick='return XacNhan();'><button type='button'>Xóa</button></a>"; ?></td>
                    </tr>
        <?php
                }
            }
        }
        //disconnect_db();
        ?>
    </table>

</body>

</html>