<?php
require_once('../../Model/knowledge_base.php');
require_once('../../Model/DBConfig.php');

// Kết nối DB
$db = new Database;
$db->connect();

global $officeKnowledge;
function findAnswer($question, $knowledge, $db) {
    $question = strtolower(trim($question));
    
    // Kiểm tra từ khóa chính
    foreach($knowledge as $category => $qa) {
        foreach($qa as $key => $answer) {
            if(strpos($question, $key) !== false) {
                return [
                    'type' => 'answer',
                    'content' => $answer,
                    'category' => $category
                ];
            }
        }
    }
    
    // Kiểm tra bài học trong database
    $sql = "SELECT * FROM baihoc WHERE 
            TenBaiHoc LIKE '%$question%' OR 
            NoiDung LIKE '%$question%' OR
            Tags LIKE '%$question%'";
    $lessons = $db->getAllData($sql);
    
    if(!empty($lessons)) {
        $lessonList = array_map(function($lesson) {
            return [
                'id' => $lesson['MaBaiHoc'],
                'title' => $lesson['TenBaiHoc'],
                'link' => "index.php?controller=Video&id={$lesson['MaBaiHoc']}"
            ];
        }, $lessons);
        
        return [
            'type' => 'lessons',
            'content' => $lessonList
        ];
    }
    
    return [
        'type' => 'not_found',
        'content' => "Xin lỗi, tôi không hiểu câu hỏi của bạn. Bạn có thể hỏi về:
        - Các thao tác trong Word, Excel, PowerPoint
        - Cách sử dụng các hàm trong Excel
        - Cách tạo hiệu ứng trong PowerPoint
        - Các phím tắt thông dụng"
    ];
}

if(isset($_POST['question'])) {
    $response = findAnswer($_POST['question'], $officeKnowledge, $db); // TRUYỀN $db vào
    echo json_encode($response);
    exit;
}

require_once('../../View/User/chatbot_ui.php');
?>
