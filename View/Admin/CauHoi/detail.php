<?php require_once('../../View/Admin/Layout/header.php'); ?>
<h1 class="title"> Thông Tin Câu Hỏi</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?controller=TrangChu">Trang Chủ</a> </li>
    <li class="divider">/</li>
      <li><a href="index.php?controller=CauHoi&action=list">Câu Hỏi</a> </li>
    <li class="divider">/</li>
    <li><a href="#" class="active">Thông Tin Câu Hỏi <?php echo $dataid['NoiDungCauHoi'] ?></a> </li>
</ul>

<div class="row">
	<div class="form">
		<div class="col-12">
			<form method="POST">
				<div class="row">
					<div class="col-12">
						<div class="input-group">
							<input type="text" value=" <?php echo $dataid['NoiDungCauHoi'] ?>" />
							<label for="">Nội Dung Câu Hỏi</label>
						</div>
					</div>
					<div class="col-12">
						<div class="input-group">
							<input type="text" value=" <?php echo $dataid['DapAnA'] ?>" />
							<label for="">Đáp Án A</label>
						</div>
					</div>
					<div class="col-12">
						<div class="input-group">
							<input type="text" value=" <?php echo $dataid['DapAnB'] ?>" />
							<label for="">Đáp Án B</label>
						</div>
					</div>
					<div class="col-12">
						<div class="input-group" >
							<input type="text" value=" <?php echo $dataid['DapAnC'] ?>" />
							<label for="">Đáp Án C</label>
						</div>
					</div>
					<div class="col-12">
						<div class="input-group">
							<input type="text" value=" <?php echo $dataid['DapAnD'] ?>" />
							<label for="">Đáp Án D</label>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group">
							<input type="number" value="<?php echo $dataid['DapAnDung'] ?>"/>
							<label for="">Đáp Án Đúng</label>
						</div>
					</div>
					<div class="col-6">
						<div class="input-group active">
								<label for="">Bài Tập</label>
								<select name="txtMaBaiTap" id="inputGroupSelect01">
										<option >Chọn Bài Tập...</option>
										<?php 
											foreach($dataBaiTap as $value){?>
											<option <?php 
											if($dataid['MaBaiTap'] == $value['MaBaiTap'] ){
												echo "selected";
											}
											?>
											value="<?php echo $value['MaBaiTap'] ?>"><?php  echo $value['TenBaiTap'] ?></option>
												
											<?php 
												}
											?>
								</select>
						</div>
					</div>
				</div>
				<a class="btn btn-primary" href="index.php?controller=CauHoi&action=list">Trở về danh sách Câu Hỏi</a>
				<a class="btn btn-warning" href="index.php?controller=CauHoi&action=edit&id=<?php echo $dataid['MaCauHoi']?>">Sửa Câu Hỏi</a>
				<a class="btn btn-danger" href="index.php?controller=CauHoi&action=delete&id=<?php echo $dataid['MaCauHoi']?>" 
					onclick="return confirm('Bạn có chắc chắn muốn xóa câu hỏi này chứ?')"  > Xóa Câu Hỏi
				</a>
			</form>
		</div>
	</div>
</div>
<?php require_once('../../View/Admin/Layout/footer.php'); ?>