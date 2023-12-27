<?php
session_start();
require "../../classes/monhoc.class.php";
$con=new monhoc();
if (!empty($_POST['add_mon']))
{
    
    // Lay data
    $mamon="/^[A-Z]{1,}$/";
    if(preg_match($mamon,isset($_POST['ma']) ? $_POST['ma'] : '')) {
        $data['MaMonHoc'] = isset($_POST['ma']) ? $_POST['ma'] : '';
    }else{
        ?>
        <script type="text/javascript">
            alert("Mon Hoc Khong Hop Le.!");
            window.location="themmon.php";
        </script>
        <?php
        exit();

    }
    $ten="/^[a-zA-Z'-'\ỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞ ỠỢỤỨỪỬỮỰỲỴÝỶỸửữựỵ ỷỹ]*$/";
    if(preg_match($ten,isset($_POST['name']) ? $_POST['name'] : '')) {
        $data['TenMonHoc'] = isset($_POST['name']) ? $_POST['name'] : '';
    }else{
        ?>
        <script type="text/javascript">
            alert("Them Mon Hoc Khong Hop Le.!");
            window.location="themmon.php";
        </script>
        <?php
        exit();
    }
    
    $sotiethoc="/^[0-9]{1,}$/";
    if(preg_match($sotiethoc,isset($_POST['tiet']) ? $_POST['tiet'] : '')) {
        $data['SoTiet'] = isset($_POST['tiet']) ? $_POST['tiet'] : '';
    }else{
        ?>
        <script type="text/javascript">
            alert("So Tiet Khong Hop Le.!");
            window.location="themmon.php";
        </script>
        <?php
        exit();
    }
   

    // Validate thong tin
    $errors = array();
    if (empty($data['MaMonHoc'])){
        $errors['MaMonHoc'] = 'Chưa nhập tên mã môn học';
    }

    if (empty($data['TenMonHoc'])){
        $errors['TenMonHoc'] = 'Chưa nhập tên môn học';
    }
    if (empty($data['SoTiet'])){
        $errors['SoTiet'] = 'Chưa nhập số tiết';
    }
   
    // Neu ko co loi thi insert
    if (!$errors){
        $mon=$con->add($data['MaMonHoc'], $data['TenMonHoc'], $data['SoTiet']);
        // Trở về trang danh sách
        ?>
        <script type="text/javascript">alert ("Đã Thêm Môn Học Thành Công");</script>
<?php
        header("location:../index.php?mod=mh");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thêm Môn Học</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<center><img  style="height: 250px; width: 1200px;margin-left: 30px;" src="../../assets/img/banner.png"></center>
<body style="background-color: rgb(204, 223, 239);">
<center>
<h1>Thêm Môn Học </h1>
<a href="../index.php?mod=mh"><button>Trở về</button></a> <br/> <br/>

<form method="post" action="themmon.php">
    <table width="50%" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Mã Môn Học</td>
            <td>
                <input type="text" name="ma" value="<?php echo !empty($data['MaMonHoc']) ? $data['MaMonHoc'] : ''; ?>" placeholder="Tối đa 2 kí tự, là chữ cái viết tắt của môn"/>
                <?php if (!empty($errors['MaMonHoc'])) echo $errors['MaMonHoc']; ?>
            </td>
        </tr>
        <tr>
            <td>Tên Môn Học</td>
            <td>
                <input type="text" name="name" value="<?php echo !empty($data['TenMonHoc']) ? $data['TenMonHoc'] : ''; ?>"/>
                <?php if (!empty($errors['TenMonHoc'])) echo $errors['TenMonHoc']; ?>
            </td>
        </tr>
        <tr>
            <td>Số Tiết</td>
            <td>
                <input type="text" name="tiet" value="<?php echo !empty($data['SoTiet']) ? $data['SoTiet'] : ''; ?>" placeholder="Số tiết là số nguyên"/>
                <?php if (!empty($errors['SoTiet'])) echo $errors['SoTiet']; ?>
            </td>
        </tr>
        
        <tr>
            <td></td>
            <td>
                <input type="submit" name="add_mon" value="Lưu"/>
            </td>
        </tr>
    </table>
</form>
    </center>
</body>
</html>