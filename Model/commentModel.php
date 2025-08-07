<?php
require_once 'DBConfig.php'; // nếu cần kết nối CSDL

class CommentModel {
    public function getParentComments($video_id) {
        // Truy vấn lấy comment cha
    }

    public function getReplies($parent_id) {
        // Truy vấn lấy các trả lời (comment con)
    }

    public function addComment($user_id, $video_id, $content, $parent_id = null) {
        // Thêm bình luận mới
    }
}
