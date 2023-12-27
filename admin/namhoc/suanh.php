
<?php
session_start();
require "../../classes/namhoc.class.php";
$con=new namhoc();
        $id=$_GET['id'];
if (!empty($_POST['edit_nh'])) {
// Lay data
    $data['NamHoc'] = isset($_POST['name']) ? $_POST['name'] : '';
   
    $errors = array();
    if (empty($data['NamHoc'])){
        $errors['NamHoc'] = 'Chưa nhập năm học';
    }

   

    // Neu ko co loi thi insert
    if (!$errors){
        $nh=$con->edit($data['Namhoc']);
        // Trở về trang danh sách
        header("location:../index.php?mod=nh");
    }
}
    ?>
<?php
$data =$con-> selectnamhoc($id);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Năm Học</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<center><img style="height: 250px; width: 1200px;margin-left: 30px;" src="../../assets/img/banner.png"></center>
<center><body  style="background-color: rgb(204, 223, 239);">
<h1>Sửa Năm Học </h1>
<a href="../index.php?mod=nh"><button>Trở về</button></a> <br/> <br/>
<form method="post" action="suanh.php?id=<?php echo $data['NamHoc']; ?>">
    <table width="50%" border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>Năm Học</td>
            <td>
                <input type="text" name="name" value="<?php echo $data['NamHoc']; ?>"/>
                <?php if (!empty($errors['NamHoc'])) echo $errors['NamHoc']; ?>
            </td>
        </tr>
       
        <tr>
            <td></td>
            <td>
                <!-- <input type="hidden" name="id" value="<?php echo $data['NamHoc']; ?>"/> -->
                <input type="submit" name="edit_nh" value="Lưu"/>
            </td>
        </tr>
    </table>
</form>
</body></center>
</html>
