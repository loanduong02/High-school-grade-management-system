<?php
require 'DB.class.php';
class hocki extends DB
{
    function allquery()
    {
        $con=$this->connect();
        $sql='select * from hocky';
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
    function selectquery($id)
    {
        $con=$this->connect();
        $sql="select * from hocky where MaHocKy={$id}";
        $query=mysqli_query($con,$sql);
        $result=array();
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $result = $row;
        }
        return $result;
    }
    
    function add($id,$ten,$namhoc)
    {
        $con=$this->connect();
        $mysql="
        insert into hocky(MaHocKy,TenHocKy,NamHoc) 
        values('$id','$ten', '$namhoc')";
        $query=mysqli_query($con,$mysql);
        return $query;

    }
    function edit($id,$ten,$namhoc)
{
    $con=$this->connect();
    $mysql="
    update hocky set
    TenHocKy='$ten',
    NamHoc='$namhoc' 
    where MaHocKy=$id ";
    $query=mysqli_query($con,$mysql) ;
    return $query;
}
}