<?php require_once('../../View/Admin/Layout/header.php'); ?>
<h1 class="title"> Chỉnh Sửa Thông Tin Giảng Viên</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?controller=TrangChu">Trang Chủ</a> </li>
    <li class="divider">/</li>
      <li><a href="index.php?controller=GiangVien&action=list">Giảng Viên</a> </li>
    <li class="divider">/</li>
    <li><a href="#" class="active">Chỉnh Sửa Thông Tin Giảng Viên</a> </li>
</ul>

<div class="row">
	<div class="form">
		<div class="col-12">
			<form method="POST">
			<div class="row">
					<div class="col-6">
						<div class="input-group">
							<input type="tel" autocomplete="off" value="<?php echo $dataid['MaGiangVien'] ?>"  name="txtMaGiangVien" required="required" />
							<label for="">Mã Giảng Viên</label>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group">
							<input type="tel" value="<?php echo $dataid['TenGiangVien'] ?>"  autocomplete="off" name="txtTenGiangVien" required="required" />
							<label for="">Tên Giảng Viên</label>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group">
							<input type="tel" value="<?php echo $dataid['SoDienThoai'] ?>"  autocomplete="off" name="txtSDT" required="required" />
							<label for="">Số Điện Thoại</label>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group">
							<input type="text" value="<?php echo $dataid['CCCD'] ?>"  autocomplete="off" name="txtCCCD" required="required" />
							<label for="">CCCD</label>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group">
							<input type="text" value="<?php echo $dataid['Email'] ?>"  name="txtEmail"  autocomplete="off"  required="required" />
							<label for="">Email</label>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group">
							<input type="password" value="<?php echo $dataid['MatKhau'] ?>"  autocomplete="off" name="txtMatKhau" required />
							<label for="">Mật Khẩu</label>
						</div>
					</div>
					<div class="col-12">
						<div class="input-group">
							<input type="text" value="<?php echo $dataid['DiaChi'] ?>"  name="txtDiaChi" autocomplete="off" required />
							<label for="">Địa Chỉ</label>
						</div>
					</div>
					<div class="col-12">
						<div class="input-group">
							<div class="upload-img">
								<input type="file" value="<?php echo $dataid['Avata'] ?>"  name="txtAvata" id="input_image"  class="upload-box" >
							</div>
						</div>
					</div>
				</div>
				<input class="btn btn-success" type="submit" name="EditNhanVien" value="Lưu">
					<a class="btn btn-primary" href="index.php?controller=GiangVien&action=list" class="btn">Trở về danh sách</a>
			</form>
		</div>
	</div>
</div>
<?php require_once('../../View/Admin/Layout/footer.php'); ?>