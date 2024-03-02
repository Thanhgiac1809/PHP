<?php
class user
{
    // ham tao
    public function __construct()
    {
    }

    // phuong thuc chen vao database
    function InsertUser($tenkh, $user, $matkhau, $email, $diachi, $dt)
    {
        $db = new connect();
        $query = "insert into khachhang1(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro) values(NULL,'$tenkh','$user','$matkhau','$email','$diachi','$dt',default)";
        $db->exec($query);
    }

    // phuong thuc kiem tra xem username va pass co ton tai trong database
    function loginUser($username, $password)
    {
        $db = new connect();
        $select = "select * from khachhang1 where username='$username' and matkhau='$password'";
        $result = $db->getList($select);
        $set = $result->fetch();
        return $set;
    }

    //phuong thuc kiem tra username da ton tai
    function exitUser($tendn)
    {
        $dn = new connect();
        $select = "select * from khachhang1 where username='$tendn'";
        $result = $dn->getInstance($select);
        return $result;
    }
    //pt kt email
    function getEmail($email)
    {
        $dn = new connect();
        $select = "select * from khachhang1 where email='$email'";
        $result = $dn->getInstance($select);
        return $result;
    }

    //pt update
    function getUpdateemail($emailold, $codenew)
    {
        $db = new connect();
        $query = "update khachhang1 set matkhau='$codenew' where email='$emailold'";
        $db->exec($query);
    }
}
