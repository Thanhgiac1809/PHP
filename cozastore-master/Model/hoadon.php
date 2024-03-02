<?php
    class hoadon {
        // ham tao
        public function __construct(){}

        public function InsertOrder($makh)
        {
            $db=new connect();
            $date=new DateTime("now");
            $datecreate=$date->format("Y-m-d");
            $query="insert into hoadon1(masohd,makh,ngaydat,tongtien) values(NULL,$makh,'$datecreate',0)";
            // echo $query;
            $db->exec($query);//chen vao 
            // lay ma so hoa don moi vau insert vao
            $select="select masohd from hoadon1 order by masohd desc limit 1";
            $int=$db->getInstance($select);
            return $int[0];
        }

        function insertOrderDetail($masohd, $mahh, $soluong, $thanhtien)
        {
            $db=new connect();  
            $query="insert into cthoadon1(masohd,mahh,soluongmua,thanhtien,tinhtrang) values($masohd,$mahh,$soluong,$thanhtien,0)";
            // echo $query;
            $db->exec($query);
        }

        function updateOrderTotal($sohdid,$total)
        {
            $db=new connect();
            $query="update hoadon1 set tongtien=$total where masohd=$sohdid";
            $db->exec($query);
        }
        //phương thức lấy hóa đơn
        function getOrder($sohdid)
        {
            $db= new connect();
            $select="select b.masohd, a.tenkh, a.diachi, a.sodienthoai, b.ngaydat from khachhang1
            a INNER join hoadon1 b on a.makh=b.makh where b.masohd=$sohdid";
            $result=$db->getInstance($select);
            return $result;
        }

        function getOrderDetail($sohdid)
        {
            $db = new connect();
            $select =" select a.tenhh,a.dongia,b.soluongmua,b.thanhtien from hanghoa a 
            INNER join cthoadon1 b on a.mahh=b.mahh where masohd=$sohdid";
            $result=$db->getList($select);
            return $result;
        }

    }
