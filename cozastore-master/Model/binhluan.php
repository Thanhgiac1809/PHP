<?php
class binhluan
{
    public function __construct()
    {
    }

    //pt insert vào bảng bình luận
    function InsertComment($mahh, $makh, $noidung)
    {
        $db = new connect();
        $date = new DateTime('now');
        $datecreate = $date->format('Y-m-d');
        $query = "insert into binhluan1(mabl,mahh,makh,ngaybl,noidung) values(Null,$mahh,$makh,'$datecreate','$noidung')";
        $db->exec($query);
    }

    function HienThicomment($mahh){
        $db = new connect();
        $select = "select a.username,b.noidung,b.ngaybl from khachhang1 a 
        INNER join binhluan1 b on a.makh=b.makh where b.mahh=$mahh ORDER by b.mabl DESC";
        $result = $db->getList($select);
        return $result;
    }

    function getCount($mahh){
        $db = new connect();
        $select = "select count(mabl) from binhluan1 where mahh=$mahh";
        $result = $db->getInstance($select);
        return $result[0];
    }
}
