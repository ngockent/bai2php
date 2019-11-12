<?php
    include 'connect2.php';
    // lấy địa điểm trong database
    function abc($con){
        $sql = "select * from diadiem where id";
        $exe = mysqli_query($con,$sql);
        $a = [];
        while($num = mysqli_fetch_array($exe))
        {
            array_push($a,$num);
        }
        return $a;
    }
    // kiểm tra email
    
    function emailValid($string) 
    { 
        if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $string)) 
            return true; 
    } 

?>