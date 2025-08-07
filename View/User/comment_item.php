<div class="comment-item" data-comment-id="<?= $comment['MaComment'] ?>">
    <div class="comment-header">
        <div class="comment-avatar">
            <img src="/uploads/avatars/<?= htmlspecialchars($comment['Avatar'] ?? 'default.jpg') ?>" alt="Avatar">
        </div>
        <div class="comment-info">
            <strong><?= htmlspecialchars($comment['TenNguoiDung']) ?></strong>
            <span class="comment-date"><?= date('d/m/Y H:i', strtotime($comment['NgayComment'])) ?></span>
        </div>
    </div>
    <div class="comment-content">
        <?= nl2br(htmlspecialchars($comment['NoiDung'])) ?>
    </div>
    <div class="comment-actions">
        <button class="like-btn" data-comment-id="<?= $comment['MaComment'] ?>">👍 <?= (int)$comment['Likes'] ?></button>
        <button class="dislike-btn" data-comment-id="<?= $comment['MaComment'] ?>">👎 <?= (int)$comment['Dislikes'] ?></button>
        <button class="reply-btn">Phản hồi</button>
    </div>
    
    <!-- Form phản hồi (ẩn ban đầu) -->
    <form method="POST" class="reply-form" style="display: none;">
        <div class="comment-form-container">
            <div class="comment-avatar">
                <img src="/uploads/avatars/<?= $_SESSION['Avatar'] ?? 'default.jpg' ?>" alt="Avatar">
            </div>
            <div class="comment-input">
                <textarea name="comment_content" placeholder="Viết phản hồi..." required></textarea>
                <input type="hidden" name="parent_id" value="<?= $comment['MaComment'] ?>">
                <!-- Đổi name của nút submit trong form phản hồi -->
            <button type="submit" name="submit_reply" class="submit-comment">Gửi</button>
            </div>
        </div>
    </form>
    
    <!-- Danh sách phản hồi -->
    <?php if(!empty($comment['replies'])): ?>
        <div class="replies-list">
            <?php foreach($comment['replies'] as $reply): ?>
                <?php 
                    // Sử dụng lại template comment_item cho reply
                    $originalComment = $comment;
                    $comment = $reply;
                    include('comment_item.php');
                    $comment = $originalComment;
                ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<style>
    .comment-item {
    background-color: #fff;
    padding: 12px 16px;
    border-radius: 8px;
    border: 1px solid #ddd;
    margin-bottom: 16px;
    transition: box-shadow 0.2s;
}

.comment-item:hover {
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
}

.comment-header {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
}

.comment-avatar img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 10px;
    border: 1px solid #ccc;
}

.comment-info {
    display: flex;
    flex-direction: column;
}

.comment-info strong {
    font-size: 14px;
}

.comment-date {
    font-size: 12px;
    color: #777;
}

.comment-content {
    font-size: 14px;
    line-height: 1.5;
    margin-top: 6px;
}

.comment-actions {
    margin-top: 8px;
    font-size: 13px;
    color: #555;
    display: flex;
    gap: 16px;
}

</style>