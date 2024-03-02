<?php
    class hanghoa{
        function __construct(){}
            // phuong thuc lay hang hoa all
            function getHangHoaAll(){
                $db=new connect();
                $select="select * from hanghoa";
                $result=$db->getList($select);
                return $result;
            }

             // phương thức insert vào database
        function insertsp($tenhh,$dongia,$giamgia,$hinh,$nhom,$maloai,$dacbiet,$soluotxem,$ngaylap,$mota,$soluongton,$mausac,$size)
        {
            $date=new DateTime($ngaylap);
            $ngay=$date->format("Y-m-d");
            $db=new connect();
            $query="insert into hanghoa(mahh,tenhh,dongia,giamgia,hinh,Nhom,maloai,dacbiet,soluotxem,ngaylap,mota,soluongton,mausac,size)
                    values (NULL,'$tenhh',$dongia,$giamgia,'$hinh',$nhom,$maloai,'$dacbiet',$soluotxem,'$ngay','$mota',$soluongton,'$mausac',$size)";
            $db->exec($query);
        }
            // phuong thuc lay thong tin cua 1 sp
        function getHangHoaId($id)
        {
            $db=new connect();
            $select="select * from hanghoa where mahh=$id";
            $result=$db->getInstance($select);
            return $result;
        }

            // phương thức cập nhật hàng hóa
        function updatesp($id,$tenhh,$dongia,$giamgia,$hinh,$Nhom,$maloai,$dacbiet,$soluotxem,$ngaylap,$mota,$soluongton,$mausac,$size)
        {
            $db=new connect();
            $query="update hanghoa
                    set tenhh='$tenhh',
                    dongia=$dongia,
                    giamgia=$giamgia,
                    hinh='$hinh',
                    Nhom=$Nhom,
                    maloai=$maloai,
                    dacbiet=$dacbiet,
                    soluotxem=$soluotxem,
                    ngaylap='$ngaylap',
                    mota='$mota',
                    soluongton=$soluongton,
                    mausac='$mausac',
                    size=$size
                    where mahh=$id
            ";
            $db->exec($query);
        }

        // pt thong ke

  
        public function getThongKeHangHoa($range) {
            //     echo '<script> alert("hello");</script>'
            $db=new connect();
            switch ($range) {
                case "seven":
                    $select = "select a.tenhh, SUM(b.soluongmua) AS soluongmua
                        FROM hanghoa a
                        JOIN cthoadon1 b ON a.mahh = b.mahh
                        JOIN hoadon1 c ON b.masohd = c.masohd
                        WHERE c.ngaydat > DATE_SUB(CURDATE(), INTERVAL 7 DAY)
                        GROUP BY a.tenhh;";
                    // echo $select;
                    break;
                case "twentyeight":
                    $select = "select a.tenhh, SUM(b.soluongmua) AS soluongmua
                    FROM hanghoa a
                    JOIN cthoadon1 b ON a.mahh = b.mahh
                    JOIN hoadon1 c ON b.masohd = c.masohd
                            WHERE c.ngaydat > DATE_SUB(CURDATE(), INTERVAL 28 DAY)
                            GROUP BY a.tenhh;";
                    break;
                case "nightty":
                    $select = "select a.tenhh, SUM(b.soluongmua) AS soluongmua
                    FROM hanghoa a
                    JOIN cthoadon1 b ON a.mahh = b.mahh
                    JOIN hoadon1 c ON b.masohd = c.masohd
                        WHERE c.ngaydat > DATE_SUB(CURDATE(), INTERVAL 90 DAY)
                        GROUP BY a.tenhh;";
                    break;
                case "year":
                    $select = "select a.tenhh, SUM(b.soluongmua) AS soluongmua
                    FROM hanghoa a
                    JOIN cthoadon1 b ON a.mahh = b.mahh
                    JOIN hoadon1 c ON b.masohd = c.masohd
                        WHERE c.ngaydat > DATE_SUB(CURDATE(), INTERVAL 365 DAY)
                        GROUP BY a.tenhh;";
                    break;
                default:
                    $select = "select a.tenhh,sum(b.soluongmua) as soluongmua from hanghoa a, cthoadon1 b where a.mahh=b.mahh group by a.tenhh";
                    break;
            };
            $result = $db->getList($select);
            return $result;
        }
    
    }
    
    ?>
    