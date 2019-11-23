<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>UpDate</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<style>
	<style>
		.make{
			display: flex;
			justify-content: space-between;
		}
	</style>
</head>
<body>
	<?php 
		include 'connect.php';
		$id = $_GET['id'];
		$qcus = "select * from customer where Id = '$id'";
		$execus = mysqli_query($con,$qcus);
		$data  = mysqli_fetch_array($execus);
	 ?>
	<div class="container">
		<div class="row" style="margin:auto;width:800px">
		<div class="col-md-12"><h1 style="text-align:center;color:red;margin-bottom:50px;    margin-top: 50px;">UpDate Thông Tin </h1></div>
			<div class="col-md-12" style="border: solid;    margin-bottom: 50px;">
				<div style="margin-left:40px">
					<form action="#" method="POST">
						<div class="row" style="margin-top: 50px;">
							<div class="col-md-6">
								<div class="form-group make">
									<div>
										<label for="#"><b>Qúy danh</b>(<span style="color:red">*</span>)</label><br>
										<select name="quyDanh" style="width:300px">
											<option value="#">Chon ...</option>
											<option value="Anh kool" <?php if($data['QuyDanh'] =="Anh kool" ){echo "selected";} ?>>Anh kool</option>
											<option value="CR7" <?php if($data['QuyDanh'] =="CR7" ){echo "selected";} ?>>CR7</option>
											<option value="Chim Sẻ Đi Nắng" <?php if($data['QuyDanh'] =="Chim Sẻ Đi Nắng" ){echo "selected";} ?>>Chim Sẻ Đi Nắng</option>
										</select>
									</div>
									<div>
										<label for=""><b>Họ và tên</b>(<span style="color:red">*</span>)</label><br>
										<input type="text" name="hoTen" value="<?php echo $data['HoTen']?>" style="width:300px">
									</div>
								</div>
								<div class="form-group make">
									<div>
										<label for="#"><b>Số điện thoại</b>(<span style="color:red">*</span>)</label><br>
										<input type="text" min="0" maxlength="10" name="soDienThoai" style="width:300px" value="<?php echo $data['SoDienThoai']?>">
									</div>
									<div>
										<label for=""><b>Số điện thoại khác</b></label><br>
										<input type="text" min="0" maxlength="10" name="soDienThoaiKhac" style="width:300px" value="<?php echo $data['SoDienThoaiKhac']?>">
									</div>
								</div>
								<div class="form-group">
									<label for=""><b>Email</b></label><br>
									<input type="text" name="email" style="width:300px" value="<?php echo $data['Email']?>">
								</div>
								<div class="form-group">
									<input type="checkbox" name="isXuatHoaDon" value="1" 
									<?php if($data['IsXuatHoaDon'] == 1){echo "checked";} ?>> 
									tôi muốn xuất hóa đơn đỏ
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group make">
									<div>
										<label for="#"><b>Thành phố</b></label><br>
										<select name="thanhPho" style="width:300px">
											<option value="">Chọn thành phố ...</option>
											<?php 
											include 'connect.php';
											$query = "select * from ThanhPho";
											$exe = mysqli_query($con,$query);
											while ($result = mysqli_fetch_array($exe)) {
											    ?>
											    <option value="<?php echo $result[0]?>"
											     <?php if($result[0]==$data['ThanhPhoId']){echo "selected";} ?>>
											    	<?php echo $result[1]?>
											    </option>
											 <?php   
											}
										 	?>
										</select>
									</div>
									<div>
										<label for=""><b>Địa chỉ</b></label><br>
										<input type="text" name="diaChi" style="width:300px"
										value="<?php echo $data['DiaChi']?>">
									</div>
								</div>
								<div class="form-group">
									<label for=""><b>Yêu cầu</b> </label><br>
									<textarea name="yeuCau"rows="6" style="width:300px"
									> <?php echo $data['YeuCau']?></textarea>
								</div>
							</div>
							<div class="col-md-12" style="margin-bottom: 20px;">
								<div style="text-align: center;">
									<button type="submit" class="btn btn-primary" name="OK">Gửi yêu cầu</button>
									<a href="detail.php" class="btn btn-primary">Xem chi tiết</a>
									<a href="home.php" class="btn btn-primary">Quay lại Home</a>
								</div>
							</div>
							<?php 
								if(isset($_POST['OK'])){
									$quyDanh = $_POST['quyDanh'];
									$hoTen = $_POST['hoTen'];
									$soDienThoai = $_POST['soDienThoai'];
									$soDienThoaiKhac = $_POST['soDienThoaiKhac'];
									$email = $_POST['email'];
									if(is_null($_POST['isXuatHoaDon']) || $_POST['isXuatHoaDon'] ==''){
										$isXuatHoaDon = 0;
									}
									else{
										$isXuatHoaDon = $_POST['isXuatHoaDon'];
									}
									$thanhPho = $_POST['thanhPho'];
									$diaChi = $_POST['diaChi'];
									$yeuCau = $_POST['yeuCau'];
									//die();
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
									include 'connect.php';
									$update = "update customer set ThanhPhoId = '$thanhPho',QuyDanh='$quyDanh',HoTen='$hoTen',DiaChi='$diaChi',SoDienThoai='$soDienThoai',SoDienThoaiKhac='$soDienThoaiKhac',YeuCau='$yeuCau',Email='$email',IsXuatHoaDon='$isXuatHoaDon'";
									$exeupdate = mysqli_query($con,$update);
									if($exeupdate){
										echo "<script> alert('Update thành công')</script>";
									}
								}
							 ?>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>