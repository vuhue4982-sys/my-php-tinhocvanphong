<?php require_once('../../View/Admin/Layout/header.php'); ?>
<h1 class="title">Chi Tiết Thông Tin Bài Học</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?controller=TrangChu">Trang Chủ</a> </li>
    <li class="divider">/</li>
      <li><a href="index.php?controller=BaiHoc&action=list">Bài Học</a> </li>
    <li class="divider">/</li>
    <li><a href="#" class="active">Thông Tin Bài Học <?php echo $dataid['TenBaiHoc'] ?></a> </li>
</ul>
<div class="row">
	<div class="form">
			<form method="POST">
				<div class="row">
					<div class="col-12">
						<div class="input-group">
							<input type="text" disabled value="<?php echo $dataid['TenBaiHoc'] ?>"/>
							<label for="">Tên Bài Học</label>
						</div>
					</div>
					<div class="col-8">
						<div class="input-group">
							<input type="text"  name="txtFileGiaoTrinh" value="<?php echo $dataid['FileGiaoTrinh'] ?>"/>
							<label for="">Link Bài Giảng</label>
						</div>
					</div>
					<div class="col-4">
						<div class="input-group active">
							
							<select disabled>
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
							<label for="">Môn Học</label>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group active">
							<input type="file" disabled name="txtVideo" required/>
							<label for="">Video Bài Giảng</label>
						</div>
					</div>
					<div  class="col-12">
						<div class="form-editor">
							<label for="">Nội Dung Bài Học</label>
							<textarea disabled name="txtNoiDungBaiHoc" id="default" cols="30" rows="10" >
										<?php echo $dataid['NoiDung'] ?>
							</textarea>
						</div>
					</div>
				</div>
				<a class="btn btn-primary" href="index.php?controller=BaiHoc&action=list">Trở về danh sách bài học</a>
				<a class="btn btn-warning" href="index.php?controller=BaiHoc&action=edit&id=<?php echo $dataid['MaBaiHoc']?>">Sửa Bài Học</a>
				<a class="btn btn-danger" href="index.php?controller=BaiHoc&action=delete&id=<?php echo $dataid['MaBaiHoc']?>" 
					onclick="return confirm('Bạn có chắc chắn muốn xóa bài học này chứ?')"  > Xóa Bài Học
				</a>
		</form>
	</div>
</div>
<?php require_once('../../View/Admin/Layout/footer.php'); ?>