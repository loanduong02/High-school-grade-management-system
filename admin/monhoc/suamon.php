
<?php
session_start();
require "../../classes/monhoc.class.php";
$con=new monhoc();
$id=$_GET['id'];
if (!empty($_POST['edit_mon'])) {
// Lay data
    $data['TenMonHoc'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['SoTiet'] = isset($_POST['tiet']) ? $_POST['tiet'] : '';
    //$data['HeSoMonHoc'] = isset($_POST['heso']) ? $_POST['heso'] : '';
    $data['MaMonHoc'] = isset($_POST['id']) ? $_POST['id'] : '';
    $errors = array();
    if (empty($data['TenMonHoc'])){
        $errors['TenMonHoc'] = 'Chưa nhập tên môn học';
    }

    if (empty($data['SoTiet'])){
        $errors['SoTiet'] = 'Chưa nhâp số tiết';
    }
    

    // Neu ko co loi thi insert
    if (!$errors){
        $mon=$con->edit($data['MaMonHoc'], $data['TenMonHoc'], $data['SoTiet']);
        // Trở về trang danh sách
        header("location:../index.php?mod=mh");
    }
}
    ?>
<?php
$data =$con-> selectmon($id);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Môn Học</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<center><img style="height: 250px; width: 1200px;margin-left: 30px;" src="../../assets/img/banner.png"></center>
<center><body  style="background-color: rgb(204, 223, 239);">
<h1>Sửa Môn Học </h1>
<a href="../index.php?mod=mh"><button>Trở về</button></a> <br/> <br/>
<form method="post" action="suamon.php?id=<?php echo $data['MaMonHoc']; ?>">
    <table width="50%" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Tên Môn Học</td>
            <td>
                <input type="text" name="name" value="<?php echo $data['TenMonHoc']; ?>"/>
                <?php if (!empty($errors['TenMonHoc'])) echo $errors['TenMonHoc']; ?>
            </td>
        </tr>
        <tr>
            <td>Số Tiết</td>
            <td>
                <input type="text" name="tiet" value="<?php echo $data['SoTiet']; ?>"/>
                <?php if (!empty($errors['SoTiet'])) echo $errors['SoTiet']; ?>
            </td>
        </tr>
       
        <tr>
            <td></td>
            <td>
                <input type="hidden" name="id" value="<?php echo $data['MaMonHoc']; ?>"/>
                <input type="submit" name="edit_mon" value="Lưu"/>
            </td>
        </tr>
    </table>
</form>
</body></center>
</html>
