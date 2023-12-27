<?php
require 'db.class.php';
class day extends DB{
    function allday(){
        $con = $this->connect();
        $sql = "select * from day";
        $query = mysqli_query($con, $sql);
        $result = array();
        if($query){
            while ($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }
        }
        return $result;
    }

    function selectquery($id)
    {
        $con=$this->connect();
        $sql="select * from day where MaDayHoc={$id}";
        $query=mysqli_query($con,$sql);
        $result=array();
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $result = $row;
        }
        return $result;
    }

    function add($id, $mon, $gv, $lop, $hk, $nh, $mota){
        $con = $this->connect();
        $sql = "insert into day (MaDayHoc, MaMonHoc, Magv, MaLopHoc, MaHocKy, NamHoc, MoTa)
            values ('$id', '$mon', '$gv', '$lop', '$hk', '$nh', '$mota')";
        $query = mysqli_query($con, $sql);
        return $query;
    }

   

    function edit ($id, $mon, $gv, $lop, $hk, $nh, $mota){
        $con = $this->connect();
        $sql = "update day set MaMonHoc = '$mon',
            Magv = '$gv',
            MaLopHoc = '$lop',
            MaHocKy = '$hk',
            NamHoc = '$nh',
            MoTa = '$mota' where MaDayHoc = '$id'";

        $query = mysqli_query($con, $sql);
        return $query;
    }

    function alllop(){
        $con = $this->connect();
        $sql = "select * from lophoc";
        $query=mysqli_query($con, $sql);
        $result = array();
        if($query){
            while ($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }

        }
        return $result;
    }
}
?>