<?php require_once('../../View/Admin/Layout/header.php'); ?>
<h1 class="title"> Chỉnh Sửa Thông Tin Bài Tập</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?controller=TrangChu">Trang Chủ</a> </li>
    <li class="divider">/</li>
      <li><a href="index.php?controller=BaiTap&action=list">Bài Tập</a> </li>
    <li class="divider">/</li>
    <li><a href="#" class="active">Chỉnh Sửa Thông Tin Bài Tập</a> </li>
</ul>

<div class="row">
	<div class="form">
			<form method="POST">
				<div class="row">
					<div class="col-12">
						<div class="input-group">
							<input type="text"  name="txtTenBaiTap" value="<?php echo $dataid['TenBaiTap'] ?>" />
							<label for="">Tên Bài Học</label>
						</div>
					</div>
					<div class="col-2">
						<div class="input-group active">
							<input type="number" name="txtSoLuongCauHoi" value="<?php echo $dataid['SoLuongCauHoi'] ?>" />
							<label for="">Số Lượng Câu Hỏi</label>
						</div>
					</div>
					<div class="col-4">
						<div class="input-group active">
							<label for="">Loại Bài Tập</label>
							<select name="txtLoaiBaiTap" id="inputGroupSelect01">
								<?php if($dataid['LoaiBaiTap'] == 1){ ?>
									<option  value="0">Trắc Nghiệm</option>
									<option selected value="1">Tự Luận</option>
								<?php
									}
									else{ ?> 
									<option selected value="0">Trắc Nghiệm</option>
									<option value="1">Tự Luận</option>
								<?php } ?>
								
							</select>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group active">
							<label for="">Bài Học</label>
							<select name="txtMaBaiHoc" id="inputGroupSelect01">
								<option >Chọn Bài Học...</option>
									<?php 
										foreach($dataBaiHoc as $value){?>
										<option 
											<?php 
											if($dataid['MaBaiHoc'] == $value['MaBaiHoc'] ){
												echo "selected";
											}
											?>
											value="<?php echo $value['MaBaiHoc'] ?>">
											<?php  echo $value['TenBaiHoc'] ?>
										</option>
											
										<?php 
											}
										?>
							</select>
						</div>
					</div>
				</div>
			<input class="btn btn-success" type="submit" name="EditBaiTap" value="Lưu">
			<a class="btn btn-primary" href="index.php?controller=BaiTap&action=list" class="btn">Trở về danh sách</a>
		</form>
	</div>
</div>
<?php require_once('../../View/Admin/Layout/footer.php'); ?>