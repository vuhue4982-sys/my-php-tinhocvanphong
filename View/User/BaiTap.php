<?php require_once('../../View/User/Layout/header.php'); ?>
<section>
    <div class="row">
        <div class="title col-12">
            <span>Bài Tập</span>
        </div>
    <div class="row">
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
                                        <div class="card-button"><a href="" class="btn">Làm Ngay</a></div>
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
    </div>
</section>
<?php require_once('chatbot.php'); ?> 
<?php require_once('../../View/User/Layout/footer.php'); ?>