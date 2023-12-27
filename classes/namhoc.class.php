<?php
require 'DB.class.php';
class namhoc extends DB
{
    function allnamhoc()
    {
        $con=$this->connect();
        $sql="select * from namhoc";
        $query=mysqli_query($con,$sql);
        $result=array();
        if($query)
        {
            while($row=mysqli_fetch_assoc($query))
            {
                $result[]=$row;
            }
        }
        return $result;
    }
    function selectnamhoc($id)
    {
        $conn=$this->connect();
        $query="select * from namhoc where NamHoc='$id'";
        $mang=array();
        $results = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($results);
        $mang=$row;
        return $mang;
    }
    function add($id)
    {
        $con=$this->connect();
        $sql="insert into namhoc (NamHoc)
        values('$id')
        ";
        $query=mysqli_query($con,$sql);
        return $query;
    }
    function edit($id)
    {
        $con=$this->connect();
        $sql="
        update namhoc set
        NamHoc='$id',
        where NamHoc='$id' ";
        $query=mysqli_query($con,$sql);
        return $query;
    }
    function xoa($id)
    {
        $con=$this->connect();
        $sql="delete from namhoc where NamHoc='$id'";
        $query=mysqli_query($con,$sql);
        return $query;
    }

}

?>