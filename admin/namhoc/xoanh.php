<?php
require "../../classes/namhoc.class.php";
$con=new namhoc();
$id = $_GET['id'];
$xoa=$con->xoa($id);
header("location: ../index.php?mod=nh");
?>