<?php require_once('../../View/Admin/Layout/header.php'); ?>
<script src="ckeditor/ckeditor.js"></script>
<h1 class="title"> Bài Học</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?controller=TrangChu">Trang Chủ</a> </li>
    <li class="divider">/</li>
      <li><a href="index.php?controller=BaiHoc&action=list">Bài Học</a> </li>
    <li class="divider">/</li>
    <li><a href="#" class="active">Thêm Mới Bài Học</a> </li>
</ul>

<div class="row">
	<div class="form">
			<form method="POST">
				<div class="row">
					<div class="col-12">
						<div class="input-group">
							<input type="text"  name="txtTenBaiHoc" />
							<label for="">Tên Bài Học</label>
						</div>
					</div>
					<div class="col-8">
						<div class="input-group">
							<input type="text"  name="txtFileGiaoTrinh" />
							<label for="">Link Bài Giảng</label>
						</div>
					</div>
					<div class="col-4">
						<div class="input-group active">
							<label for="">Môn Học</label>
							<select name="txtMaMonHoc" id="inputGroupSelect01">
									<option selected>Chọn Môn Học...</option>
									<?php 
										foreach($dataMonHoc as $value){?>
										<option value="<?php echo $value['MaMonHoc'] ?>"><?php  echo $value['TenMonHoc'] ?></option>
											
										<?php 
											}
										?>
							</select>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group active">
							<?php if(!empty($dataid['Video'])): ?>
							<video width="320" height="240" controls>
								<source src="/uploads/videos/<?php echo $dataid['Video']; ?>" type="video/mp4">
								Trình duyệt của bạn không hỗ trợ video.
							</video>
							<?php else: ?>
							<p>Chưa có video bài giảng</p>
							<?php endif; ?>
						</div>
					</div>
					<div  class="col-12">
						<div class="form-editor">
							<label for="">Nội Dung Bài Học</label>
							<textarea  id="default"  name="txtNoiDungBaiHoc"></textarea>
						</div>
					</div>
				</div>
			<input class="btn btn-success" type="submit" name="CreateBaiHoc" value="Lưu">
			<a class="btn btn-primary" href="index.php?controller=BaiHoc&action=list" class="btn">Trở về danh sách</a>
		</form>
	</div>
</div>
<?php require_once('../../View/Admin/Layout/footer.php'); ?>