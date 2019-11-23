<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container" style="margin-top:50px">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<div style="padding:50px 20px;border:1px solid gray">
					<form action="#" method="POST">
							<h3 style="text-align: center;color:red">Đăng Nhập</h3>
							<div class="form-group">
								<label for="#"><b>Tên Tài Khoản</b></label>
								<input type="text" name="txtusername" class="form-control">
							</div>
							<div class="form-group">
								<label class="red" for="#"><b>Mật khẩu</b></label>
								<input type="password" name="txtpasswd" class="form-control">
							</div>
						<div style="padding:10px 30px;display: flex;justify-content: space-around;">
							<button class="btn btn-primary" type="submit" name="OK" style="background: green;">Đồng ý</button>
						</div>
					</form>
					<?php 
		if(isset($_POST['OK'])){
			$username = $_POST['txtusername'];
			$matkhau = $_POST['txtpasswd'];
			include 'connect.php';
			$query = "select * from user where UserName = '$username'";
			$executequery = mysqli_query($con,$query);
			$result = mysqli_num_rows($executequery);
			$data = mysqli_fetch_array($executequery);
			if($result > 0){
				$_SESSION['userid'] = $data[0];
				header('location:home.php');
			}
			else{
				echo "<script> alert('Tên tài khoản hoặc mật khẩu không đúng !')</script>";
			}
		}
	 ?>
				</div>
			</div>
		</div>
	</div>

</body>
</html>