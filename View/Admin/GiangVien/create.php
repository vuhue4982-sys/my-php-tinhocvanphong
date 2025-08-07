<?php require_once('../../View/Admin/Layout/header.php'); ?>
<h1 class="title"> Giảng Viên</h1>
<ul class="breadcrumbs">
	<li><a href="index.php?controller=TrangChu">Trang Chủ</a> </li>
	<li class="divider">/</li>
	<li><a href="index.php?controller=GiangVien&action=list">Giảng Viên</a> </li>
	<li class="divider">/</li>
	<li><a href="#" class="active">Thêm Mới Giảng Viên</a> </li>
</ul>
<section>
	<form method="post" autocomplete="off">
		<div class="row">
				<div class="row">
					<div class="col-6">
						<div class="input-group">
							<input type="tel" autocomplete="off" name="txtMaGiangVien" required="required" />
							<label for="">Mã Giảng Viên</label>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group">
							<input type="tel" autocomplete="off" name="txtTenGiangVien" required="required" />
							<label for="">Tên Giảng Viên</label>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group">
							<input type="tel" autocomplete="off" name="txtSDT" required="required" />
							<label for="">Số Điện Thoại</label>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group">
							<input type="text" autocomplete="off" name="txtCCCD" required="required" />
							<label for="">CCCD</label>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group">
							<input type="text" name="txtEmail"  autocomplete="off"  required="required" />
							<label for="">Email</label>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group">
							<input type="password" autocomplete="off" name="txtMatKhau" required />
							<label for="">Mật Khẩu</label>
						</div>
					</div>
					<div class="col-12">
						<div class="input-group">
							<input type="text" name="txtDiaChi" autocomplete="off" required />
							<label for="">Địa Chỉ</label>
						</div>
					</div>
					<div class="col-12">
						<div class="input-group">
							<div class="upload-img">
								<input type="file" name="txtAvata" id="input_image"  class="upload-box" >
							</div>
						</div>
					</div>
				</div>
		</div>
		<div class="col-12">
			<input class="btn btn-success" type="submit" name="CreateNhanVien" value="Lưu">
			<a class="btn btn-primary" href="index.php?controller=GiangVien&action=list" class="btn">Trở về danh sách</a>
		</div>
	</form>
</section>
<script></script>
<?php require_once('../../View/Admin/Layout/footer.php'); ?>