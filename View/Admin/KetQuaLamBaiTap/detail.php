<?php require_once('../../View/Admin/Layout/header.php'); ?>
<h1 class="title"> Chỉnh Sửa Thông Tin Nhân Viên</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?controller=TrangChu">Trang Chủ</a> </li>
    <li class="divider">/</li>
      <li><a href="index.php?controller=NhanVien&action=list">Nhân Viên</a> </li>
    <li class="divider">/</li>
    <li><a href="#" class="active">Thông Tin Nhân Viên <?php echo $dataid['TenQuanLy'] ?></a> </li>
</ul>

<div class="row">
	<div class="form">
		<div class="col-12">
			<form method="POST">
				<div class="input-group">
					<input type="text" name="txtTenNhanVien" disabled value="<?php echo $dataid['TenQuanLy'] ?>" required/>
					<label for="">Tên Nhân Viên</label>
				</div>
				<div class="col-6">
					<div class="input-group">
						<input type="tel" name="SoDienThoai" disabled value="<?php echo $dataid['SoDienThoai'] ?>" required/>
						<label for="">Số Điện Thoại</label>
					</div>
				</div>
				<div class="col-6">
					<div class="input-group">
						<input type="text" name="CCCD" disabled value="<?php echo $dataid['CCCD'] ?>" required/>
						<label for="">CCCD</label>
					</div>
				</div>
				<div class="col-6">
					<div class="input-group">
						<input type="Email" name="Email" disabled value="<?php echo $dataid['Email'] ?>" required/>
						<label for="">Email</label>
					</div>
				</div>
				<div class="col-6">
					<div class="input-group">
						<input type="password" name="MatKhau" disabled value="<?php echo $dataid['MatKhau'] ?>" required/>
						<label for="">Mật Khẩu</label>
					</div>
				</div>
				<div class="col-12">
					<div class="input-group">
						<input type="text" name="DiaChi" disabled value="<?php echo $dataid['DiaChi'] ?>" required/>
						<label for="">Địa Chỉ</label>
					</div>
				</div>
		
					<a class="btn btn-primary" href="index.php?controller=NhanVien&action=list">Trở về danh sách</a>
					<a class="btn btn-warning" href="index.php?controller=NhanVien&action=edit&id=<?php echo $dataid['MaQuanLy']?>">Sửa Nhân Viên</a>
					<a class="btn btn-danger" href="index.php?controller=NhanVien&action=delete&id=<?php echo $dataid['MaQuanLy']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa hãng xe này chứ?')"  >Xóa Nhân Viên</a>
			</form>
		</div>
	</div>
</div>
<?php require_once('../../View/Admin/Layout/footer.php'); ?>