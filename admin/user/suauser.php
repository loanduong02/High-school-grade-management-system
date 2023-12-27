
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thông tin thành viên</title>

    <!-- Bootstrap core CSS -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<center><img style="height: 250px; width: 1200px;margin-left: 30px;" src="../../assets/img/banner.png"></center>
<center><body  style="background-color: rgb(204, 223, 239);">
<div class="container">
    <div class="row">
        <?php
        require_once("ketnoiuser.php");

        if (isset($_POST["save"])) {
            $id_user = $_POST["id_user"];
            $name = $_POST["name"];
            //$password = $_POST["password"];
            $tennguoidung = $_POST["tennguoidung"];
            $sql = "update user set username = '$name', tennguoidung = '$tennguoidung' where userid = $id_user";
            mysqli_query($conn, $sql); 

            echo '<script>alert("Sửa Thông Tin Thành Công");</script>';
            echo ' <script>window.location.href = "hienthiuser.php";</script>';
            
          //  header("location:hienthiuser.php");
        }
        
        $id = "";
        $name = "";
        //$password = "";
        $tennguoidung = "";
        if (isset($_GET["id"])) {
            //thực hiện việc lấy thông tin user
            $id = $_GET["id"];
            $sql = "select * from user where userid = $id";
            $query = mysqli_query($conn, $sql);
            while ( $data = mysqli_fetch_array($query) ) {
                $name = $data["username"];
                $tennguoidung = $data["tennguoidung"];
            }
        }
        ?>

        
        <h3> THÔNG TIN ADMIN</h3>
        <form method="POST" name="fr_update">
            <table class="table">
                <caption>Sửa Admin</caption>
                <input type="hidden" name="id_user" value="<?php echo $id; ?>">
                <tr>
                    <td>Tên Đăng Nhập : </td>
                    <td><input type="text" name="name" value="<?php echo $name; ?>" /></td>
                </tr>

                <tr>
                    <td> Tên Người Dùng : </td>
                    <td><input type="text" name="tennguoidung" value="<?php echo $tennguoidung; ?>" /></td>
                </tr>
                <tr><td colspan="2"><input type="submit" name="save" value="Lưu thông tin"></td></tr>
            </table>
        </form>
    </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>


</body></html>