<?php require_once('../../View/User/Layout/header.php'); ?>
<section>
    <div class="row">
        <div class="title col-12">
            <span>Thông Tin Chung Về Học Phần</span>
        </div>
        <div class="content col-12">
            <?php echo $dataMonHoc['MoTaMonHoc'] ?>
        </div>
    </div>
</section>
<section>
    <div class="row">
        <div class="title left col-12">
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
<section>
    <div class="row">
        <div class="title left col-12">
            <span>Bài Tập</span>
        </div>
        <?php if($dataBaiHoc!=null){ ?>
        <?php foreach($dataBaiHoc as $value) { ?>
        <div class="content col-12" style="margin: 10px 0 ;">
            <div class="card" style="padding: 15px;">
                <h3> <?php echo $value['TenBaiHoc']?></h3>
                <?php 
                            $MaBaiHoc = $value['MaBaiHoc'];
                            $sqlBaiTap = "SELECT * FROM baiTap where baiTap.MaBaiHoc = $MaBaiHoc" ;
                            $dataBaiTap = $db->getAllData($sqlBaiTap);
                            if($dataBaiTap!=null){ ?>
                <?php foreach($dataBaiTap as $values) { ?>
                <div class="alert card BaiGiang">
                    <div class="card-name"><?php echo $values['TenBaiTap']?></div>
                    <div class="card-button"><a
                            href="index.php?controller=BaiTap&action=detail&id=<?php echo $values['MaBaiTap']?>"
                            class="btn">Làm Ngay</a></div>
                </div>
                <?php } } 
                        else{
                            echo "Hiện tại không có bài tập nào";
                        }?>
            </div>
        </div>
        <?php } }
            else{
                echo "Hiện tại không có bài giảng nào";
            }?>
    </div>
</section>
<section>
    <div class="row">
        <div class="title left col-12">
            <span>Video Hướng Dẫn</span>
        </div>
        <div class="content col-12">
            <?php if($dataBaiHoc!=null){ ?>
            <?php foreach($dataBaiHoc as $value) { ?>
            <div class="alert card BaiGiang">
                <div class="card-name"><?php echo $value['TenBaiHoc']?></div>
                <div class="card-button">
                    <a href="index.php?controller=Video&id=<?php echo $value['MaBaiHoc']?>" class="btn">Xem Ngay</a>
                </div>
            </div>
            <?php } }
                else{
                    echo "Hiện tại không có Video nào";
                }?>
        </div>
    </div>
</section>
<?php require_once('chatbot.php'); ?> 
<?php require_once('../../View/User/Layout/footer.php'); ?>