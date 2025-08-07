<?php require_once('../../View/Admin/Layout/header.php'); ?>
<h1 class="title">Thông Tin Môn Học</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?controller=TrangChu">Trang Chủ</a> </li>
    <li class="divider">/</li>
      <li><a href="index.php?controller=MonHoc&action=list">Môn Học</a> </li>
    <li class="divider">/</li>
    <li><a href="#" class="active">Thông Tin Môn Học <?php echo $dataid['TenMonHoc'] ?></a> </li>
</ul>

<div class="row">
	<div class="form">
		<div class="col-12">
			<form method="POST">
				<div class="row">
					<div class="col-6">
						<div class="input-group" >
							<input type="text" value="<?php echo $dataid['MaMonHoc'] ?>"/>
							<label>Mã Môn Học</label>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group">
							<input type="text" value="<?php echo $dataid['TenMonHoc'] ?>" />
							<label >Tên Môn Học</label>
						</div>
					</div>
					<div class="col-12">
						<div class="form-editor active">
						<label class="active">Tổng Quan Về Môn Học</label>
							<textarea disabled id="default" style="padding-top:10px;"   ><?php echo $dataid['MoTaMonHoc'] ?></textarea>
						</div>
					</div>
				</div>
				<a class="btn btn-primary" href="index.php?controller=MonHoc&action=list">Trở về danh sách</a>
				<a class="btn btn-warning" href="index.php?controller=MonHoc&action=edit&id=<?php echo $dataid['MaMonHoc']?>">Sửa Môn Học</a>
				<a class="btn btn-danger" href="index.php?controller=MonHoc&action=delete&id=<?php echo $dataid['MaMonHoc']?>" onclick="return confirm('Bạn có chắc chắn muốn xóa môn học này chứ?')"  >Xóa Môn Học</a>
			</form>
		</div>
	</div>
</div>
<?php require_once('../../View/Admin/Layout/footer.php'); ?>