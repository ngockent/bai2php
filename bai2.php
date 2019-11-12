<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css" text="text/css">
    <link rel="stylesheet" href="style.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="css/bootstrap.min.css"></script>
    <title>bai2</title>
</head>

<body>
    <?php
    include 'connect2.php';
    include 'function2.php';
    ?>
    <div class="container bg-dark text-light">
        <form method="POST" class="needs-validation" novalidate>
            <h3>Thông tin liên hệ</h3>
            <div class="row">
                <div class="col-md-2">
                    <label for="quydanh">Quý danh</label>
                    <select name="quydanh" class="form-control" required>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="hoten">Họ và tên</label>
                    <input type="text" class="form-control" name="hoten" required>
                    <div class="invalid-feedback">
                        Họ và tên không được để trống.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="thanhpho">Thành phố</label>
                    <select name="thanhpho" class="form-control" required="required">
                        <?php
                        foreach (abc($con) as $key => $value) {
                            ?>
                            <option value="<?php echo $value['thanhpho']; ?>"><?php echo $value['thanhpho']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="diachi">Địa chỉ</label>
                    <input type="text" class="form-control" name="diachi" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="sodienthoai">Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt" required>
                    <div class="invalid-feedback">
                        Điện thoại không được để trống.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="sodienthoaikhac">Số điện thoại khác</label>
                    <input type="text" class="form-control" name="sdtk" required>
                </div>
                <div class="col-md-6">
                    <label for="yeucau">Nội dung yêu cầu</label>
                    <textarea name="yeucau" class="form-control" rows="3" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div>
                    <input type="checkbox" value="Có"  name="xuathd[]" style="margin-left:15px">
                    <label>Tôi muốn xuất hóa đơn</label> 
                </div>
            </div>
            <div class="row">
                <input type="submit" class="btn btn-danger" name="OK" style="margin-left:30%" value="Gửi yêu cầu">
            </div>
        </form>
        <?php
        if (isset($_POST['OK'])) {
            $inhoadon ="";
            $quydanh = $_POST['quydanh'];
            $hoten = $_POST['hoten'];
            $thanhpho = $_POST['thanhpho'];
            $diachi = $_POST['diachi'];
            $sdt = $_POST['sdt'];
            $sdtk = $_POST['sdtk'];
            $yeucau = $_POST['yeucau'];
            $email = $_POST['email'];
            $hoadon = $_POST['xuathd'];
            foreach($hoadon as $dem)
			{
				$inhoadon .= $dem." ";	
			}

            //Kiểm tra họ tên
            if ($hoten == "") {
                echo "<script>alert('Họ tên không được để trống')</script>";
                die();
            }
            //kiểm tra email có đúng định dạng không
            $regex = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/";
            if (preg_match($regex, $email)) {
                //thêm dữ liệu vào database
                $sqlInsert = "insert into hoadon(quydanh,hoten,thanhpho,diachi,sdt,sdtk,yeucau,email,inhoadon)
                            values('$quydanh','$hoten','$thanhpho','$diachi','$sdt','$sdtk','$yeucau','$email','$inhoadon')";
                $exeInsert = mysqli_query($con, $sqlInsert);
                echo "<script>alert('Đã gửi thông tin')</script>";
            } else {
                echo "Email không đúng";
                die();
            }
        }
        ?>
</body>

</html>