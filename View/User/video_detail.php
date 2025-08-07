<?php require_once('../../View/User/Layout/header.php'); ?>

<div class="video-detail-page">
    <div class="breadcrumb">
        <a href="index.php?controller=Video"><i class='bx bx-arrow-back'></i> Danh sách bài giảng</a>
    </div>

    <div class="main-video">
        <div class="video-container">
            <?php if(!empty($baiHoc['Video'])): ?>
           <!-- Video path: /uploads/Videos/<?php echo $baiHoc['Video'] ?> -->
            <video controls>
                <source src="/uploads/Videos/<?php echo $baiHoc['Video'] ?>" type="video/mp4">
            </video>
            <?php else: ?>
            <div class="no-video">
                <i class='bx bx-video-off'></i>
                <p>Chưa có video bài giảng</p>
            </div>
            <?php endif; ?>
        </div>
        
        <div class="video-description">
            <h1><?php echo htmlspecialchars($baiHoc['TenBaiHoc']) ?></h1>
            <div class="meta">
                <span><i class='bx bx-calendar'></i> <?php echo date('d/m/Y', strtotime($baiHoc['NgayTao'])) ?></span>
                <span><i class='bx bx-time'></i> 15 phút</span>
            </div>
            
            <div class="content">
                <h3><i class='bx bx-book-open'></i> Nội dung bài học</h3>
                <div class="content-text">
                    <?php echo $baiHoc['NoiDung'] ?>
                </div>
            </div>
            
            <?php if(!empty($baiHoc['FileGiaoTrinh'])): ?>
            <div class="download-section">
                <h3><i class='bx bx-download'></i> Tài liệu bài giảng</h3>
                <a href="<?php echo $baiHoc['FileGiaoTrinh'] ?>" class="download-btn" target="_blank">
                    Tải về <i class='bx bx-download'></i>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
</div>
<div class="comments-section">
    <h3><i class='bx bx-comment-dots'></i> <?= is_array($parentComments) ? count($parentComments) : 0 ?> bình luận</h3>
    
    <!-- Form bình luận chính -->
    <form method="POST" class="comment-form">
        <div class="comment-form-container">
            <div class="comment-avatar">
                <img src="/uploads/avatars/<?= $_SESSION['Avatar'] ?? 'default.jpg' ?>" alt="Avatar">
            </div>
            <div class="comment-input">
                <textarea name="comment_content" placeholder="Viết bình luận..." required></textarea>
                <input type="hidden" name="parent_id" value="">
                <button type="submit" name="submit_comment" class="submit-comment">Bình luận</button>
            </div>
        </div>
    </form>
       
    <!-- Danh sách bình luận -->
    <div class="comments-list">
        <?php if(is_array($parentComments) && !empty($parentComments)): ?>
            <?php foreach($parentComments as $comment): ?>
                <?php include('comment_item.php') ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="no-comments">Chưa có bình luận nào</p>
        <?php endif; ?>
    </div>
    
</div>


<style>
.video-detail-page {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    padding-top: 90px;
     position: relative;
    z-index: 0;
}

.breadcrumb {
    margin-bottom: 20px;
}

.breadcrumb a {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    color: #3498db;
    text-decoration: none;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

.main-video {
    display: flex;
    gap: 30px;
}

.video-container {
    flex: 2;
    background: #000;
    border-radius: 8px;
    overflow: hidden;
}

.video-container video {
    width: 100%;
    display: block;
}

.no-video {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 300px;
    color: #7f8c8d;
}

.no-video i {
    font-size: 50px;
    margin-bottom: 15px;
}

.video-description {
    flex: 1;
}

.video-description h1 {
    margin-top: 0;
    color: #2c3e50;
}
.video-container, .search-control, .thumbnail-container {
    position: relative;
    z-index: -1 !important; /* Ưu tiên thấp */
}
.meta {
    display: flex;
    gap: 20px;
    margin: 15px 0;
    color: #7f8c8d;
    font-size: 14px;
}

.content {
    margin-top: 25px;
}

.content h3 {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #2c3e50;
    margin-bottom: 15px;
}

.content-text {
    line-height: 1.6;
    color: #34495e;
}

.download-section {
    margin-top: 30px;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 8px;
}

.download-section h3 {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 0;
    margin-bottom: 15px;
    color: #2c3e50;
}

.download-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    background: #3498db;
    color: white;
    border-radius: 4px;
    text-decoration: none;
    transition: background 0.3s;
}

.download-btn:hover {
    background: #2980b9;
}

/* Comment System */
.comments-section {
    margin-top: 30px;
    background: #f7f7f7;
    padding: 20px;
    border-radius: 8px;
}

.comment-form-container {
    display: flex;
    gap: 15px;
    align-items: flex-start;
    margin-bottom: 20px;
}

.comment-avatar img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    border: 1px solid #ccc;
}

.comment-input {
    flex: 1;
}

.comment-input textarea {
    width: 100%;
    height: 60px;
    resize: none;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
}

.submit-comment {
    margin-top: 8px;
    padding: 8px 16px;
    background-color: #007BFF;
    border: none;
    color: white;
    border-radius: 6px;
    cursor: pointer;
}

.submit-comment:hover {
    background-color: #0056b3;
}

.comments-list {
    margin-top: 20px;
}

.no-comments {
    color: #999;
    font-style: italic;
}


.reply-btn, .like-btn, .dislike-btn {
    background: none;
    border: none;
    color: #606060;
    cursor: pointer;
    padding: 0;
}

.reply-btn:hover, .like-btn:hover, .dislike-btn:hover {
    color: #065fd4;
}

.reply-form {
    margin-top: 15px;
    margin-left: -55px;
}

.replies-list {
    margin-top: 20px;
    border-left: 2px solid #ddd;
    padding-left: 30px;
}

.reply .comment-avatar img {
    width: 32px;
    height: 32px;
}

@media (max-width: 768px) {
    .main-video {
        flex-direction: column;
    }
}
</style>
<script>
// Xử lý nút phản hồi
document.querySelectorAll('.reply-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const form = this.closest('.comment-item').querySelector('.reply-form');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    });
});

// Xử lý gửi bình luận chính
document.addEventListener('DOMContentLoaded', function() {
    const commentForm = document.querySelector('.comment-form');
    
    if(commentForm) {
        commentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitButton = this.querySelector('[type="submit"]');
            const originalButtonText = submitButton.textContent;
            
            // Hiển thị trạng thái loading
            submitButton.disabled = true;
            submitButton.textContent = 'Đang gửi...';
            
         fetch(window.location.href, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(err => { throw err; });
                }
                return response.json();
            })
            .then(data => {
                if(data.success) {
                    addNewComment(data.comment);
                    this.reset();
                    showToast('Bình luận đã được gửi thành công!');
                } else {
                    showToast(data.message || 'Có lỗi xảy ra', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Có lỗi xảy ra khi gửi bình luận', 'error');
            })
            .finally(() => {
                submitButton.disabled = false;
                submitButton.textContent = originalButtonText;
            });
        });
    }
    
    // Xử lý form phản hồi (nếu có)
    document.querySelectorAll('.reply-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitButton = this.querySelector('[type="submit"]');
            const originalButtonText = submitButton.textContent;
            
            submitButton.disabled = true;
            submitButton.textContent = 'Đang gửi...';
            
            fetch(window.location.href, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    // Thêm phản hồi mới vào danh sách
                    addNewReply(data.comment);
                    
                    // Reset form và ẩn form phản hồi
                    this.reset();
                    this.style.display = 'none';
                    
                    showToast('Phản hồi đã được gửi thành công!');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Có lỗi xảy ra khi gửi phản hồi', 'error');
            })
            .finally(() => {
                submitButton.disabled = false;
                submitButton.textContent = originalButtonText;
            });
        });
    });
});

// Hàm thêm bình luận mới (hoàn chỉnh)
function addNewComment(commentData, isReply = false, parentId = null) {
    // 1. Tạo HTML structure cho comment/reply
    const commentHTML = `
        <div class="comment-item" data-comment-id="${commentData.MaComment}">
            <div class="comment-header">
                <div class="comment-avatar">
                    <img src="/uploads/avatars/${commentData.Avatar || 'default.jpg'}" alt="Avatar" 
                         onerror="this.src='/uploads/avatars/default.jpg'">
                </div>
                <div class="comment-info">
                    <strong>${escapeHtml(commentData.TenNguoiDung || 'Ẩn danh')}</strong>
                    <span class="comment-date">${formatDate(commentData.NgayComment)}</span>
                </div>
            </div>
            <div class="comment-content">
                ${escapeHtml(commentData.NoiDung || '').replace(/\n/g, '<br>')}
            </div>
            <div class="comment-actions">
                <button class="like-btn" data-comment-id="${commentData.MaComment}">
                    👍 ${commentData.Likes || 0}
                </button>
                <button class="dislike-btn" data-comment-id="${commentData.MaComment}">
                    👎 ${commentData.Dislikes || 0}
                </button>
                ${!isReply ? '<button class="reply-btn">Phản hồi</button>' : ''}
            </div>
            ${!isReply ? `
            <form method="POST" class="reply-form" style="display: none;">
                <div class="comment-form-container">
                    <div class="comment-avatar">
                        <img src="/uploads/avatars/${$_SESSION['Avatar'] || 'default.jpg'}" alt="Avatar">
                    </div>
                    <div class="comment-input">
                        <textarea name="comment_content" placeholder="Viết phản hồi..." required></textarea>
                        <input type="hidden" name="parent_id" value="${commentData.MaComment}">
                        <button type="submit" name="submit_reply" class="submit-comment">Gửi</button>
                    </div>
                </div>
            </form>
            <div class="replies-list"></div>
            ` : ''}
        </div>
    `;

    // 2. Xác định vị trí thêm comment
    if (isReply && parentId) {
        // Thêm reply vào comment cha
        const parentComment = document.querySelector(`.comment-item[data-comment-id="${parentId}"] .replies-list`);
        if (parentComment) {
            parentComment.insertAdjacentHTML('beforeend', commentHTML);
            bindCommentEvents(parentComment.lastElementChild);
        }
    } else {
        // Thêm comment mới vào danh sách chính
        const commentsList = document.querySelector('.comments-list');
        const noCommentsMsg = document.querySelector('.no-comments');
        
        if (noCommentsMsg) noCommentsMsg.remove();
        
        if (commentsList) {
            commentsList.insertAdjacentHTML('afterbegin', commentHTML);
            bindCommentEvents(commentsList.firstElementChild);
        }
    }
}

// Hàm gán sự kiện cho comment (tách riêng để tái sử dụng)
function bindCommentEvents(commentElement) {
    if (!commentElement) return;

    // 1. Sự kiện nút reply
    const replyBtn = commentElement.querySelector('.reply-btn');
    if (replyBtn) {
        replyBtn.addEventListener('click', function() {
            const form = this.closest('.comment-item').querySelector('.reply-form');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
            if (form.style.display === 'block') {
                form.querySelector('textarea').focus();
            }
        });
    }

    // 2. Sự kiện form reply
    const replyForm = commentElement.querySelector('.reply-form');
    if (replyForm) {
        replyForm.addEventListener('submit', handleReplySubmit);
    }

    // 3. Sự kiện like/dislike
    commentElement.querySelectorAll('.like-btn, .dislike-btn').forEach(btn => {
        btn.addEventListener('click', handleReaction);
    });
}

// Hàm xử lý gửi reply
function handleReplySubmit(e) {
    e.preventDefault();
    
    const form = e.target;
    const formData = new FormData(form);
    const submitButton = form.querySelector('[type="submit"]');
    const originalText = submitButton.textContent;
    
    submitButton.disabled = true;
    submitButton.textContent = 'Đang gửi...';
    
    fetch(window.location.href, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => {
        if (!response.ok) throw new Error('Network error');
        return response.json();
    })
    .then(data => {
        if (data.success) {
            addNewComment(data.comment, true, formData.get('parent_id'));
            form.reset();
            form.style.display = 'none';
            showToast('Phản hồi đã được gửi!');
        } else {
            throw new Error(data.message || 'Lỗi không xác định');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast(error.message || 'Gửi phản hồi thất bại', 'error');
    })
    .finally(() => {
        submitButton.disabled = false;
        submitButton.textContent = originalText;
    });
}

// Hàm xử lý like/dislike
function handleReaction(e) {
    const btn = e.target;
    const commentId = btn.dataset.commentId;
    const isLike = btn.classList.contains('like-btn');
    
    fetch('/api/react-comment', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            comment_id: commentId,
            action: isLike ? 'like' : 'dislike'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            btn.textContent = isLike ? `👍 ${data.likes}` : `👎 ${data.dislikes}`;
        }
    })
    .catch(console.error);
}

// Các hàm helper
function escapeHtml(unsafe) {
    return unsafe.toString()
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleString('vi-VN', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
}

function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.textContent = message;
    document.body.appendChild(toast);
    
    setTimeout(() => toast.classList.add('show'), 10);
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

// Hàm thêm phản hồi mới
function addNewReply(replyData) {
    const parentComment = document.querySelector(`.comment-item[data-comment-id="${replyData.ParentID}"]`);
    
    if(parentComment) {
        const repliesList = parentComment.querySelector('.replies-list');
        
        // Tạo HTML cho phản hồi mới
        const replyHTML = `
            <div class="comment-item reply-item" data-comment-id="${replyData.MaComment}">
                <div class="comment-header">
                    <div class="comment-avatar">
                        <img src="/uploads/avatars/${replyData.Avatar || 'default.jpg'}" alt="Avatar">
                    </div>
                    <div class="comment-info">
                        <strong>${escapeHtml(replyData.TenNguoiDung)}</strong>
                        <span class="comment-date">${formatDate(replyData.NgayComment)}</span>
                    </div>
                </div>
                <div class="comment-content">
                    ${escapeHtml(replyData.NoiDung).replace(/\n/g, '<br>')}
                </div>
                <div class="comment-actions">
                    <button class="like-btn" data-comment-id="${replyData.MaComment}">👍 0</button>
                    <button class="dislike-btn" data-comment-id="${replyData.MaComment}">👎 0</button>
                </div>
            </div>
        `;
        
        if(repliesList) {
            repliesList.insertAdjacentHTML('beforeend', replyHTML);
        }
    }
}

// Hàm hiển thị thông báo
function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.className = `toast-notification ${type}`;
    toast.textContent = message;
    
    document.body.appendChild(toast);
    
    setTimeout(() => {
        toast.classList.add('show');
    }, 10);
    
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 500);
    }, 3000);
}

// Hàm escape HTML
function escapeHtml(unsafe) {
    return unsafe
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

// Hàm định dạng ngày
function formatDate(dateString) {
    const date = new Date(dateString);
    const day = date.getDate().toString().padStart(2, '0');
    const month = (date.getMonth() + 1).toString().padStart(2, '0');
    const year = date.getFullYear();
    const hours = date.getHours().toString().padStart(2, '0');
    const minutes = date.getMinutes().toString().padStart(2, '0');
    
    return `${day}/${month}/${year} ${hours}:${minutes}`;
}

// Thêm CSS cho toast notification
const toastStyle = document.createElement('style');
toastStyle.textContent = `
    .toast-notification {
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 12px 24px;
        border-radius: 4px;
        color: white;
        background-color: #4CAF50;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        z-index: 1000;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .toast-notification.show {
        opacity: 1;
    }
    .toast-notification.error {
        background-color: #f44336;
    }
`;
document.head.appendChild(toastStyle);
</script>
<?php if(isset($show_chatbot) && $show_chatbot): ?>
    <?php require_once('chatbot.php'); ?>
<?php endif; ?>

<?php require_once('../../View/User/Layout/footer.php'); ?>