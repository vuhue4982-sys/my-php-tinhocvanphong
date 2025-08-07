<?php require_once('../../View/User/Layout/header.php'); ?>

<main>
<div class="video-page-container">
    <div class="page-header">
        <h1><i class='bx bx-video'></i> Video Bài Giảng</h1>
        <div class="search-control">
            <div class="search-box">
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Tìm kiếm bài giảng...">
            </div>
        </div>
    </div>

    <div class="video-list-container">
        <?php if(!empty($dataBaiHoc)): ?>
            <?php foreach($dataBaiHoc as $baiHoc): ?>
            <div class="video-card">
                <div class="card-header">
                    <h2><?php echo htmlspecialchars($baiHoc['TenBaiHoc']) ?></h2>
                    <span class="chapter-badge">Chương <?php echo substr($baiHoc['MaMonHoc'], -1) ?></span>
                </div>
                
                <div class="video-preview">
                    <?php if(!empty($baiHoc['Video'])): ?>
                    <div class="thumbnail-container">
                        <video controls preload="metadata" style="width:100%; height:100%; background:#000">
                            <source src="/uploads/Videos/<?php echo $baiHoc['Video'] ?>" type="video/mp4">
                            Trình duyệt của bạn không hỗ trợ video HTML5
                        </video>
                        <div class="play-icon"><i class='bx bx-play'></i></div>
                        <div class="duration">15:24</div>
                    </div>
                    <?php else: ?>
                    <div class="no-video-thumbnail">
                        <i class='bx bx-video-off'></i>
                        <span>Chưa có video</span>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="card-footer">
                    <div class="meta-info">
                        <span><i class='bx bx-time'></i> 15 phút</span>
                        <span><i class='bx bx-calendar'></i> <?php echo date('d/m/Y', strtotime($baiHoc['NgayTao'])) ?></span>
                    </div>
                    <a href="index.php?controller=Video&action=detail&id=<?php echo $baiHoc['MaBaiHoc'] ?>" class="view-btn">
                        Xem bài giảng <i class='bx bx-chevron-right'></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-videos-message">
                <i class='bx bx-video-plus'></i>
                <p>Hiện chưa có video bài giảng nào</p>
            </div>
        <?php endif; ?>
    </div>
</div>
</main>
<?php 
// DEBUG: Kiểm tra đường dẫn video
foreach($dataBaiHoc as $baiHoc) {
    if(!empty($baiHoc['Video'])) {
        $videoPath = $_SERVER['DOCUMENT_ROOT'] . '/uploads/Videos/' . $baiHoc['Video'];
        echo "<!-- Video path: $videoPath | File exists: " . (file_exists($videoPath) ? 'Yes' : 'No') . " -->";
    }
}
?>
<style>
:root {
    --primary-color: #3a86ff;
    --secondary-color: #2667cc;
    --text-dark: #2b2d42;
    --text-light: #6c757d;
    --bg-light: #f8f9fa;
    --border-color: #e9ecef;
}

.video-page-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 1rem;
     padding-top: 90px; 
      position: relative;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    z-index: 0;
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    gap: 1rem;
}

.page-header h1 {
    color: var(--text-dark);
    font-size: 1.8rem;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.search-control {
    flex: 1;
    max-width: 400px;
    z-index: 1; /* Thấp hơn menu */
}

.search-box {
    position: relative;
}

.search-box i {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-light);
}

.search-box input {
    width: 100%;
    padding: 0.75rem 1rem 0.75rem 2.5rem;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    font-size: 1rem;
}

.video-list-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
}

.video-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.video-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
.video-container, .search-control, .thumbnail-container {
    position: relative;
    z-index: -1 !important; /* Ưu tiên thấp */
}
.card-header {
    padding: 1rem 1.25rem;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header h2 {
    margin: 0;
    font-size: 1.1rem;
    color: var(--text-dark);
    flex: 1;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.chapter-badge {
    background: var(--bg-light);
    color: var(--text-light);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.8rem;
    margin-left: 0.5rem;
}

.video-preview {
    position: relative;
    height: 180px;
    background: #000;
}

.thumbnail-container {
    position: relative;
    width: 100%;
    height: 100%;
}

.thumbnail-container video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.9;
}

.play-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 3rem;
    opacity: 0.8;
    transition: opacity 0.3s;
}

.video-card:hover .play-icon {
    opacity: 1;
}

.duration {
    position: absolute;
    bottom: 0.5rem;
    right: 0.5rem;
    background: rgba(0,0,0,0.7);
    color: white;
    padding: 0.2rem 0.5rem;
    border-radius: 4px;
    font-size: 0.8rem;
}

.no-video-thumbnail {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: var(--text-light);
}

.no-video-thumbnail i {
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
}

.card-footer {
    padding: 1rem 1.25rem;
}

.meta-info {
    display: flex;
    gap: 1rem;
    margin-bottom: 0.75rem;
    font-size: 0.85rem;
    color: var(--text-light);
}

.view-btn {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s;
}

.view-btn:hover {
    color: var(--secondary-color);
}

.no-videos-message {
    grid-column: 1 / -1;
    text-align: center;
    padding: 3rem;
    color: var(--text-light);
}

.no-videos-message i {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.no-videos-message p {
    margin: 0;
    font-size: 1.1rem;
}

@media (max-width: 768px) {
    .page-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .search-control {
        width: 100%;
        max-width: 100%;
    }
    
    .video-list-container {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- Thêm chatbot vào cuối file, trước khi gọi footer -->
<?php if(isset($show_chatbot) && $show_chatbot): ?>
    <?php require_once('chatbot.php'); ?>
<?php endif; ?>
<?php require_once('../../View/User/Layout/footer.php'); ?>