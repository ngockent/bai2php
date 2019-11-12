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
    <div class="container bg-primary">
        <form method="POST" class="needs-validation" novalidate>
            <h3>Thông tin liên hệ</h3>
            <div class="row">
                <div class="col-md-2">
                    <label for="quydanh">Quý danh</label>
                    <select name="quydanh" id="quydanh" class="form-control" required="required">
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="hoten">Họ và tên</label>
                    <input type="text" class="form-control" id="hoten" name="hoten" required>
                    <div class="invalid-feedback">
                        Họ và tên không được để trống.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="thanhpho">Thành phố</label>
                    <select name="thanhpho" id="input" class="form-control" required="required">
                        <?php
                        foreach (abc($con) as $key => $value) {
                            ?>
                            <option value="<?php echo $value['thanhpho']; ?>"><?php echo $value['thanhpho']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="diachi">Địa chỉ</label>
                    <input type="text" class="form-control" id="diachi" name="diachi" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="sodienthoai">Số điện thoại</label>
                    <input type="text" class="form-control" id="sodienthoai" name="sdt" required>
                    <div class="invalid-feedback">
                        Điện thoại không được để trống.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="sodienthoaikhac">Số điện thoại khác</label>
                    <input type="text" class="form-control" id="sodienthoaikhac" name="sdtk" required>
                </div>
                <div class="col-md-6">
                    <label for="yeucau">Nội dung yêu cầu</label>
                    <textarea name="yeucau" id="yeucau" class="form-control" rows="3" required="required"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="" required="required" title="">
                </div>
            </div>
            <div class="row">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="Có" style="margin-left:15px" name="xuathd">
                        Tôi muốn xuất hóa đơn
                    </label>
                </div>
            </div>
            <div class="row">
                <button type="button" class="btn btn-danger" name="OK" style="margin-left:30%">Gửi yêu cầu</button>
            </div>
        </form>
        <?php
            if(isset($_POST['OK'])){
                $quydanh = $_POST['quydanh'];
                $hoten = $_POST['hoten'];
                $thanhpho = $_POST['thanhpho'];
                $diachi = $_POST['diachi'];
                $sdt = $_POST['sdt'];
                $sdtk = $_POST['sdtk'];
                $yeucau = $_POST['yeucau'];
                $email = $_POST['email'];

                emailValid($email);
            }
        ?>
</body>

</html>