<?php 
 class connect{
    //thuộc tính 
    var $db= null;
    //hàm tạo PDO(dsn,user,password,array)
    public function __construct()
    {
        $dsn='mysql:host=localhost;dbname=shopnew';
        $user ='root';
        $pass='';
        try {
            //code...
            $this->db = new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
        } catch (\Throwable $th) {
            //throw $th;
             echo " thất bại";
        }
    }
    public function getList($select)
    {
    $result = $this->db->query($select);
    return $result;
    }
    public function getInstance($select){
        $result = $this->db->query($select);
        $result = $result->fetch();
        return $result;
    }
    ///thực hiện  các  câu querry
    
    // thuc hien phuong thuc thuc thi cac cau query : insert, update, delete
    public function exec($query){
        $result=$this->db->exec($query);
        return $result;
    }
 
 }