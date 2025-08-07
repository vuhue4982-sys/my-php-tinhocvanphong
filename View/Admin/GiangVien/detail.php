<?php require_once('../../View/Admin/Layout/header.php'); ?>
<h1 class="title">Thông Tin Giảng Viên</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?controller=TrangChu">Trang Chủ</a> </li>
    <li class="divider">/</li>
      <li><a href="index.php?controller=GiangVien&action=list">Giảng Viên</a> </li>
    <li class="divider">/</li>
    <li><a href="#" class="active">Thông Tin Giảng Viên <?php echo $dataid['TenGiangVien'] ?></a> </li>
</ul>

<div class="row">
	<div class="form">
		<div class="col-12">
			<form method="POST">
				<div class="row">
				<div class="col-6">
					<div class="input-group">
						<input type="text" disabled value="<?php echo $dataid['MaGiangVien'] ?>" required/>
						<label for="">Mã Giảng Viên</label>
					</div>
				</div>
				<div class="col-6">
					<div class="input-group">
						<input type="text" disabled value="<?php echo $dataid['TenGiangVien'] ?>" required/>
						<label for="">Họ Và Tên</label>
					</div>
				</div>
				<div class="col-6">
					<div class="input-group">
						<input type="tel" disabled value="<?php echo $dataid['SoDienThoai'] ?>" required/>
						<label for="">Số Điện Thoại</label>
					</div>
				</div>
				<div class="col-6">
					<div class="input-group">
						<input type="text" disabled value="<?php echo $dataid['CCCD'] ?>" required/>
						<label for="">CCCD</label>
					</div>
				</div>
				<div class="col-6">
					<div class="input-group">
						<input type="Email"  disabled value="<?php echo $dataid['Email'] ?>" required/>
						<label for="">Email</label>
					</div>
				</div>
				<div class="col-6">
					<div class="input-group">
						<input type="password" disabled value="<?php echo $dataid['MatKhau'] ?>" required/>
						<label for="">Mật Khẩu</label>
					</div>
				</div>
				<div class="col-12">
					<div class="input-group">
						<input type="text" disabled value="<?php echo $dataid['DiaChi'] ?>" required/>
						<label for="">Địa Chỉ</label>
					</div>
				</div>
				</div>
		
					<a class="btn btn-primary" href="index.php?controller=GiangVien&action=list">Trở về danh sách</a>
					<a class="btn btn-warning" href="index.php?controller=GiangVien&action=edit&id=<?php echo $dataid['MaGiangVien']?>">Sửa Nhân Viên</a>
					<a class="btn btn-danger" href="index.php?controller=GiangVien&action=delete&id=<?php echo $dataid['MaGiangVien']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa giảng viên này chứ?')"  >Xóa Nhân Viên</a>
			</form>
		</div>
	</div>
</div>
<?php require_once('../../View/Admin/Layout/footer.php'); ?>