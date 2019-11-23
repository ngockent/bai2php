<?php 
	session_start();
	if($_SESSION['userid'] ==''){
		header('location:login.php');
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng Ký</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<style>
		.make{
			display: flex;
			justify-content: space-between;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top:50px;">
		<div class="col-md-12"><h1 style="text-align:center;color:firebrick;margin-bottom:50px">Đăng Ký Thông Tin </h1></div>
			<div class="col-md-12" style="border: solid;margin-bottom: 50px;">
				<div>
					<form action="#" method="POST">
					<div style="margin-top:20px">
						<h3>Thông Tin Liên Hệ</h3>
						<p style="color:red;font-size: 13px;font-style:italic">Thông tin có dấu (*) là bắt buộc phải nhập .Xin quý khách vui lòng kiểm tra kỹ thông tin email,để tránh bị sai sót </p>
					
					</div>
						<div class="row" style="margin-top:20px">
							<div class="col-md-6">
								<div class="form-group make">
									<div>
										<label for="#"><b>Qúy danh</b>(<span style="color:red">*</span>)</label><br>
										<select name="quyDanh" style="width:150px">
											<option value="#">-- Chon --</option>
											<option value="Anh kool">Anh kool</option>
											<option value="CR7">CR7</option>
											<option value="Chim Sẻ Đi Nắng">Chim Sẻ Đi Nắng</option>
										</select>
									</div>
									<div>
										<label for=""><b>Họ và tên</b>(<span style="color:red">*</span>)</label><br>
										<input type="text" name="hoTen" style="width:350px">
									</div>
								</div>
								<div class="form-group make">
									<div>
										<label for="#"><b>Số điện thoại</b>(<span style="color:red">*</span>)</label><br>
										<input type="text" min="0" maxlength="10" name="soDienThoai" style="width:250px" >
									</div>
									<div>
										<label for=""><b>Số điện thoại khác</b></label><br>
										<input type="text" min="0" maxlength="10" name="soDienThoaiKhac" style="width:250px">
									</div>
								</div>
								<div class="form-group">
									<label for=""><b>Email</b><span style="font-size: 13px;font-style:italic;color:red">(Để gửi thông tin về ,hành trình ,thanh toán)</span></label><br>
									<input type="text" name="email" style="width:100%">
								</div>
								<div class="form-group">
									<input type="checkbox" name="isXuatHoaDon" value="1"> tôi muốn xuất hóa đơn đỏ
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group make">
									<div>
										<label for="#"><b>Thành phố</b></label><br>
										<select name="thanhPho" style="width:150px">
											<option value="">-- Chọn --</option>
											<?php 
											include 'connect.php';
											$query = "select * from ThanhPho";
											$exe = mysqli_query($con,$query);
											while ($result = mysqli_fetch_array($exe)) {
											    ?>
											    <option value="<?php echo $result[0]?>">
											    	<?php echo $result[1]?>
											    </option>
											 <?php   
											}
										 	?>
										</select>
									</div>
									<div>
										<label for=""><b>Địa chỉ</b></label><br>
										<input type="text" name="diaChi" style="width:350px">
									</div>
								</div>
								<div class="form-group">
									<label for="">Yêu cầu </label><br>
									<textarea name="yeuCau"rows="6" style="width:100%"></textarea>
								</div>
							</div>
							<div class="col-md-12" style="margin-bottom:50px">
								<div style="text-align: center;">
									<button type="submit" class="btn btn-primary" name="OK">Gửi yêu cầu</button>
									<a href="detail.php" class="btn btn-primary">Xem chi tiết</a>
									<a href="login.php" class="btn btn-primary">Thoát</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php 
		if(isset($_POST['OK'])){
			$quyDanh = $_POST['quyDanh'];
			$hoTen = $_POST['hoTen'];
			$soDienThoai = $_POST['soDienThoai'];
			$soDienThoaiKhac = $_POST['soDienThoaiKhac'];
			$email = $_POST['email'];
			$isXuatHoaDon = $_POST['isXuatHoaDon'];
			$thanhPho = $_POST['thanhPho'];
			$diaChi = $_POST['diaChi'];
			$yeuCau = $_POST['yeuCau'];
			if($quyDanh =='' ||$hoTen =='' ||$soDienThoai==''){
				echo "<script> alert('Các trường không được để trống')</script>";
				die();
			}
			$regex = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
			if(!preg_match($regex, $email,$matchs)) {
			    echo "<script> alert('Địa chỉ email Không đúng')</script>";
			    die(); 
			}
			if(!is_numeric($soDienThoai)){
				echo "<script> alert('Số điện thoại không đúng')</script>";
				die();
			}
			if($isXuatHoaDon == '' || is_null($isXuatHoaDon)){
				$isXuatHoaDon = 0;
			} 
			
			$userid = $_SESSION['userid'];
			// insert 
			$qrinsert = "insert into customer(ThanhPhoId,UserId,QuyDanh,HoTen,DiaChi,SoDienThoai,SoDienThoaiKhac,YeuCau,Email,IsXuatHoaDon) values('$thanhPho','$userid','$quyDanh','$hoTen','$diaChi','$soDienThoai','$soDienThoaiKhac','$yeuCau','$email',$isXuatHoaDon)";
			$exeinsert = mysqli_query($con,$qrinsert);
			if($exeinsert){
				echo "<script> alert('Gửi yêu cầu thành công')</script>";
			}
		}
	 ?>
</body>
</html>