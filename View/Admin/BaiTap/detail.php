<?php require_once('../../View/Admin/Layout/header.php'); ?>
<h1 class="title">Chi Tiết Thông Tin Bài Tập</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?controller=TrangChu">Trang Chủ</a> </li>
    <li class="divider">/</li>
      <li><a href="index.php?controller=BaiTap&action=list">Bài Tập</a> </li>
    <li class="divider">/</li>
    <li><a href="#" class="active">Thông Tin Bài Tập <?php echo $dataid['TenBaiTap'] ?></a> </li>
</ul>
<div class="row">
	<div class="form">
			<form method="POST">
				<div class="row">
					<div class="col-12">
						<div class="input-group">
							<input type="text" disabled value="<?php echo $dataid['TenBaiTap'] ?>"/>
							<label for="">Tên Bài Học</label>
						</div>
					</div>
					<div class="col-2">
						<div class="input-group">
							<input type="number" disabled value="<?php echo $dataid['SoLuongCauHoi'] ?>"/>
							<label for="">Số Lượng Câu Hỏi</label>
						</div>
					</div>
					<div class="col-4">
						<div class="input-group active">
							<label for="">Loại Bài Tập</label>
							<select disabled name="txtLoaiBaiTap" id="inputGroupSelect01">
								<?php if($dataid['LoaiBaiTap'] == 1){ ?>
									<option selected value="0">Trắc Nghiệm</option>
									<option value="1">Tự Luận</option>
								<?php
									}
									else{ ?> 
									<option  value="0">Trắc Nghiệm</option>
									<option selected value="1">Tự Luận</option>
								<?php } ?>
								
							</select>
						</div>
					</div>
					<div class="col-6">
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
				</div>
				<a class="btn btn-primary" href="index.php?controller=BaiTap&action=list">Trở về danh sách bài tập</a>
				<a class="btn btn-warning" href="index.php?controller=BaiTap&action=edit&id=<?php echo $dataid['MaBaiTap']?>">Sửa Bài Tập</a>
				<a class="btn btn-danger" href="index.php?controller=BaiTap&action=delete&id=<?php echo $dataid['MaBaiTap']?>" 
					onclick="return confirm('Bạn có chắc chắn muốn xóa bài Tập này chứ?')"  > Xóa Bài Tập
				</a>
		</form>
	</div>
</div>
<?php require_once('../../View/Admin/Layout/footer.php'); ?>