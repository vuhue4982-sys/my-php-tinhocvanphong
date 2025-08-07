<?php require_once('../../View/Admin/Layout/header.php'); ?>
<h1 class="title"> Chỉnh Sửa Thông Tin Bài Học</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?controller=TrangChu">Trang Chủ</a> </li>
    <li class="divider">/</li>
      <li><a href="index.php?controller=BaiHoc&action=list">Bài Học</a> </li>
    <li class="divider">/</li>
    <li><a href="#" class="active">Chỉnh Sửa Thông Tin Bài Học</a> </li>
</ul>

<div class="row">
	<div class="form">
			<form method="POST">
				<div class="row">
					<div class="col-12">
						<div class="input-group">
							<input type="text"  name="txtTenBaiHoc" value="<?php echo $dataid['TenBaiHoc'] ?>" />
							<label for="">Tên Bài Học</label>
						</div>
					</div>
					<div class="col-8">
						<div class="input-group">
							<input type="text"  name="txtFileGiaoTrinh" value="<?php echo $dataid['FileGiaoTrinh'] ?>" />
							<label for="">Link Bài Giảng</label>
						</div>
					</div>
				
					<div class="col-4">
						<div class="input-group active">
							<label for="">Môn Học</label>
							<select name="txtMaMonHoc" id="inputGroupSelect01">
								<option >Chọn Môn Học...</option>
									<?php 
										foreach($dataMonHoc as $value){?>
										<option 
											<?php 
											if($dataid['MaMonHoc'] == $value['MaMonHoc'] ){
												echo "selected";
											}
											?>
											value="<?php echo $value['MaMonHoc'] ?>">
											<?php  echo $value['TenMonHoc'] ?>
										</option>
											
										<?php 
											}
										?>
							</select>
						</div>
					</div>
					<div class="col-12">
						<div class="input-group active">
							<input type="file" name="txtVideo" />
							<label for="">Video Bài Giảng</label>
						</div>
					</div>
					<div  class="col-12">
						<div class="form-editor">
							<label for="">Nội Dung Bài Học</label>
							<textarea  id="default"  name="txtNoiDungBaiHoc">
								<?php echo $dataid['NoiDung'] ?>
							</textarea>
						</div>
					</div>
				</div>
			<input class="btn btn-success" type="submit" name="EditBaiHoc" value="Lưu">
			<a class="btn btn-primary" href="index.php?controller=BaiHoc&action=list" class="btn">Trở về danh sách</a>
		</form>
	</div>
</div>
<?php require_once('../../View/Admin/Layout/footer.php'); ?>