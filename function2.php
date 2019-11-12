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
    
    function emailValid($email) 
    { 
        $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i"; 
        if(!preg_match($regex, $email)) { 
            echo "Địa chỉ email phù hợp"; 
        } 
        else { 
            echo "Email không đúng";  
        }
    } 

?>