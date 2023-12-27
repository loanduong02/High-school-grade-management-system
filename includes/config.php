<?php

$conn=mysqli_connect('localhost','root','','quanlydiem1');
if(mysqli_connect_errno() !== 0){
	die("Không Thể Kết Nối Tới CSDL".mysqli_connect_errno);
}
mysqli_set_charset($conn,'utf8');
?>