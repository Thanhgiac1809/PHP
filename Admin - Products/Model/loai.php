






<?php
    class loai {
        function __constuct(){}
        function getLoai() {
            $db= new connect();
            $select="select * from loai";
            $result=$db->getList($select);
            return $result;
        }
 
    }

?>
