<?php
if(isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list';
}

switch ($action) {
    case 'list': {
        $sqlMonHoc = "SELECT * FROM monhoc WHERE MaMonHoc = 'DHIT_2022_1_2'";
        $dataMonHoc = $db->getDatas($sqlMonHoc);
        $MaMonHoc = $dataMonHoc['MaMonHoc'];
        $sqlBaiHoc = "SELECT * FROM baihoc WHERE MaMonHoc = '$MaMonHoc'";
        $dataBaiHoc = $db->getAllData($sqlBaiHoc);
		$show_chatbot = true;
        require_once('../../View/User/Video.php');
        break;
    }
    
    // Trong case 'detail' của VideoController.php
    case 'detail': {
        if(isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = (int)$_GET['id'];
            $sql = "SELECT * FROM baihoc WHERE MaBaiHoc = $id";
            $baiHoc = $db->getDatas($sql);
            
            if($baiHoc) {
                // Xử lý thêm bình luận (AJAX hoặc form submit thông thường)
                if (isset($_POST['submit_comment']) && !empty($_POST['comment_content'])) {
                    $MaBaiHoc = $id;
                    $MaNguoiDung = $_SESSION['MaNguoiDung'] ?? null;
                    $TenNguoiDung = $_SESSION['TenNguoiDung'] ?? 'Ẩn danh';
                    $NoiDung = trim($_POST['comment_content']);
                    $Avatar = $_SESSION['Avatar'] ?? 'default.jpg';
                    $ParentID = !empty($_POST['parent_id']) ? (int)$_POST['parent_id'] : null;

                   if ($MaBaiHoc && $MaNguoiDung && $NoiDung) {
                        try {
                            $sql = "INSERT INTO comments (MaBaiHoc, MaNguoiDung, TenNguoiDung, NoiDung, NgayComment, Avatar, ParentID)
                                    VALUES (?, ?, ?, ?, NOW(), ?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute([$MaBaiHoc, $MaNguoiDung, $TenNguoiDung, $NoiDung, $Avatar, $ParentID]);
                            
                            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                                $newCommentId = $conn->lastInsertId();
                                $sqlNewComment = "SELECT * FROM comments WHERE MaComment = ?";
                                $stmt = $conn->prepare($sqlNewComment);
                                $stmt->execute([$newCommentId]);
                                $newComment = $stmt->fetch(PDO::FETCH_ASSOC);
                                
                                header('Content-Type: application/json');
                                echo json_encode([
                                    'success' => true,
                                    'comment' => $newComment
                                ]);
                                exit();
                            }
                        } catch (PDOException $e) {
                            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                                header('Content-Type: application/json');
                                echo json_encode([
                                    'success' => false,
                                    'message' => 'Database error: '.$e->getMessage()
                                ]);
                                exit();
                            }
                            $_SESSION['comment_error'] = 'Lỗi khi gửi bình luận';
                        }
                    }
                }

                // Lấy comments
                $sqlComments = "SELECT c.*, 
                            TIMESTAMPDIFF(MONTH, c.NgayComment, NOW()) as months_ago,
                            (SELECT COUNT(*) FROM comments WHERE ParentID = c.MaComment) as reply_count
                            FROM comments c 
                            WHERE c.MaBaiHoc = $id AND c.ParentID IS NULL
                            ORDER BY c.NgayComment DESC";
                $parentComments = $db->getAllData($sqlComments) ?: [];
                
                // Lấy replies cho mỗi comment
                foreach($parentComments as &$comment) {
                    $sqlReplies = "SELECT r.*, 
                                TIMESTAMPDIFF(MONTH, r.NgayComment, NOW()) as months_ago
                                FROM comments r 
                                WHERE r.ParentID = {$comment['MaComment']}
                                ORDER BY r.NgayComment ASC";
                    $replies = $db->getAllData($sqlReplies);
                    $comment['replies'] = ($replies !== false) ? $replies : [];
                }
                
                require_once('../../View/User/video_detail.php');
            } else {
                header('location: index.php?controller=Video&action=list');
            }
        } else {
            header('location: index.php?controller=Video&action=list');
        }
        break;
    }
    
    default: {
        header('location: index.php?controller=Video&action=list');
    }
    
}
?>