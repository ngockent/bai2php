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
	<title>Chi Tiết</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<style>
	<style>
		tr th{
			width:120px;
		}
		tr td {
			text-align:center;
		}
		tr td a {
			text-decoration:none;
		}
	</style>
</head>
<body>
	 <div class="container" style="margin-top:50px;">
	 	<div class="row">
		 <div class="col-md-12"><h1 style="text-align:center;margin-bottom:50px;color:red">Thông Tin Chi Tiết</h1></div>
	 		<div class="col-md-12">
	 			<table class="table table-bordered" style="border:solid">
				 	<thead class="active">
				 		<tr>
				 			<th style="text-align: center;color: firebrick;">STT</th>
					 		<th style="text-align: center;color: firebrick;">Họ và tên</th>
					 		<th style="text-align: center;color: firebrick;">Quý danh</th>
					 		<th style="text-align: center;color: firebrick;">Địa chỉ</th>
					 		<th style="text-align: center;color: firebrick;">Thành phố</th>
					 		<th style="text-align: center;color: firebrick;">Số điện thoại</th>
					 		<th style="text-align: center;color: firebrick;">Yêu cầu</th>
					 		<th style="text-align: center;color: firebrick;">Email</th>
					 		<th colspan="2" style="text-align: center;color: firebrick;">Thao tác</th>
				 		</tr>
				 	</thead>
				 	<tbody>
				 		<?php 
							include 'connect.php';
							$userlogin = $_SESSION['userid'];
							$query  ="select * from customer where UserId = '$userlogin'";
							$exe = mysqli_query($con,$query);
							$index = 1;
							while ($result = mysqli_fetch_array($exe)) {
						?>
							<tr>
								<td><?php echo $index ?></td>
					 			<td><?php echo $result['HoTen']?></td>
					 			<td>
					 				<?php 
					 				if($result['QuyDanh'] == "Anh kool"){
					 					echo 'Anh kool';
					 				}else if($result['QuyDanh'] == "CR7"){
					 					echo 'CR7';
					 				}else{
					 					echo "Chim Sẻ Đi Nắng";
					 				}
					 				?>
					 				</td>
					 			<td><?php echo $result['DiaChi'] ?></td>
					 			<td>
					 				<?php 
					 					include 'connect.php';
					 					$thanhpho = "select * from ThanhPho";
					 					$exethanhpho= mysqli_query($con,$thanhpho);
					 					while ($ten = mysqli_fetch_array($exethanhpho)) {
					 					    if($ten[0] == $result['ThanhPhoId']){
					 					    	echo $ten[1];
					 					    }
					 					}
					 				 ?>
					 			</td>
					 			<td><?php echo $result['SoDienThoai']?></td>
					 			<td><?php echo $result['YeuCau']?></td>
					 			<td style="color:blue"><?php echo $result['Email'] ?></td>
					 			<td style="background:green"><a href="update.php?id=<?php echo $result[0] ?>"><b style="color:white;">Update</b></a></td>
					 			<td style="background:red"><a href="delete.php?id=<?php echo $result[0] ?>"><b style="color:white;">Delete</b></a></td>
					 		</tr>
						<?php	    
							$index +=1;	}
				 		?>
				 	</tbody>
	 			</table>
	 		</div>
			 <div class="col-md-12">
					<div style="text-align: center;">
							<a href="home.php" class="btn btn-primary">Quay Lại Home</a>
					</div>
			</div>
	 	</div>
	 </div>
</body>
</html>