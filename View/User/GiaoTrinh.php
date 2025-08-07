<?php require_once('../../View/User/Layout/header.php'); ?>
<section>
    <div class="row ">
        <div class="title col-12">
            <span>Nội Dung Giảng Dạy</span>
        </div>
        <div class="content col-12">
            <?php if($dataBaiHoc!=null){ ?>
            <?php foreach($dataBaiHoc as $value) { ?>
            <div class="alert card BaiGiang">
                <div class="card-name"><?php echo $value['TenBaiHoc']?></div>
                <div class="card-button">
                    <a href="<?php echo $value['FileGiaoTrinh']  ?>" class="btn">Xem Ngay</a>
                </div>
            </div>
            <?php } }
                else{
                    echo "Hiện tại không có bài giảng nào";
                }?>
        </div>
    </div>
</section>
<?php require_once('chatbot.php'); ?> 
<?php require_once('../../View/User/Layout/footer.php'); ?>