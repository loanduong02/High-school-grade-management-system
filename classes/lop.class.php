<?php
require 'DB.class.php';
class lop extends DB
{
 function alllop()
 {
     $con=$this->connect();
     $sql="select * from lophoc";
     $query=mysqli_query($con,$sql);
     $result=array();
     if($query)
     {
       while ($row=mysqli_fetch_assoc($query))
       {
           $result[]=$row;
       }
     }
     return $result;
 }
    function selectlop($id)
    {
        $con=$this->connect();
        $query="select * from lophoc where MaLopHoc='$id'";
        $results = mysqli_query($con,$query);
        $row=mysqli_fetch_assoc($results);
        return $row;
    }
    function add($id,$ten, $khoi, $namhoc)
    {
        $con=$this->connect();
        $mysql="
        insert into lophoc (MaLopHoc,Tenlophoc,KhoiHoc,NamHoc) 
        values('$id','$ten','$khoi', '$namhoc')";
        $query=mysqli_query($con,$mysql);
        return $query;

    }
    function edit($id,$ten,$khoi,$namhoc)
    {
        $con=$this->connect();
        $sql="update lophoc set
        Tenlophoc='$ten',
        KhoiHoc='$khoi' ,
        NamHoc='$namhoc'
        where MaLopHoc='$id'";
        $query=mysqli_query($con,$sql);
        return $query;
    }
}