<?php
class hanghoa{
    function __construct()
    {
    }
    public function getHanghoall(){
        $db = new connect();
        $select = "SELECT * FROM hanghoa ";
        $result = $db->getList($select);
        return $result;
    }
    public function gethanghoaid($id){
        $db = new connect();
        $select = "SELECT * FROM hanghoa where mahh=$id";
        $result = $db->getInstance($select);
        return $result;
    }
    function getHangHoaNhom($nhom){
        $db = new connect();
        $select="SELECT mausac,hinh FROM hanghoa where Nhom=$nhom ";
        $result=$db->getList($select);
        return $result;
    }
    public function gethanghoanhomsize($nhom){
        $db = new connect();
        $select = "SELECT DISTINCT size  FROM hanghoa WHERE Nhom=$nhom ORDER BY size";
        $result = $db->getList($select);
        return $result;
    }

    function getListpageHH($start,$limit)
    {
        $db = new connect();
        $select = "select * from hanghoa limit ".$start.",".$limit;
        $result=$db->getList($select);
        return $result;
    }

    /// Timf kim
    function getHoangHoaTimKiem($tenhh)
    {
        $db = new connect();
        $select="SELECT * FROM hanghoa where tenhh like '%$tenhh%'";
        $result=$db->getList($select);
        return $result;
    }
    
    
}
