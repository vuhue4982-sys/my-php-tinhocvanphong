<?php require_once('../../View/Admin/Layout/header.php'); ?>
<h1 class="title"> Chỉnh Sửa Thông Tin Môn Học</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?controller=TrangChu">Trang Chủ</a> </li>
    <li class="divider">/</li>
      <li><a href="index.php?controller=MonHoc&action=list">Môn Học</a> </li>
    <li class="divider">/</li>
    <li><a href="#" class="active">Chỉnh Sửa Thông Tin Môn Học</a> </li>
</ul>

<div class="row">
	<div class="form ">
		<div class="col-12">
			<form method="POST">
				<div class="row">
					<div class="col-6">
						<div class="input-group">
							<input type="text" name="txtMaMonHoc" value="<?php echo $dataid['MaMonHoc'] ?>" />
							<label>Mã Môn Học</label>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group">
							<input type="text" name="txtTenMonHoc"  value="<?php echo $dataid['TenMonHoc'] ?>" />
							<label >Tên Môn Học</label>
						</div>
					</div>
					<div class="col-12">
						<div class="form-editor ">
						<label class="active">Tổng Quan Về Môn Học</label>
							<textarea id="default" style="padding-top:10px;" name="txtMoTaMonHoc" >
							<?php echo $dataid['MoTaMonHoc'] ?>
							</textarea>
						</div>
					</div>
				</div>
				<input class="btn btn-success" type="submit" name="EditMonHoc" value="Lưu">
   				<a class="btn btn-primary" href="index.php?controller=MonHoc&action=list" class="btn">Trở về danh sách</a>
			</form>
		</div>
	</div>
</div>
<?php require_once('../../View/Admin/Layout/footer.php'); ?>