<?php
$officeKnowledge = [
    'word' => [
        'căn lề' => 'Để căn lề trong Word: 
        1. Vào tab Layout > Margins
        2. Chọn kiểu căn lề có sẵn hoặc Custom Margins để tùy chỉnh
        3. Thông số tiêu chuẩn: Lề trên 2.5cm, dưới 2.5cm, trái 3cm, phải 2cm',
        
        'mục lục tự động' => 'Tạo mục lục tự động:
        1. Đánh dấu các tiêu đề bằng Style (Heading 1, Heading 2...)
        2. Đặt con trỏ tại vị trí muốn chèn mục lục
        3. Vào References > Table of Contents
        4. Chọn kiểu mục lục tự động',
        
        'đánh số trang' => 'Cách đánh số trang:
        1. Vào Insert > Page Number
        2. Chọn vị trí (Top, Bottom)
        3. Chọn kiểu đánh số
        * Lưu ý: Để bỏ đánh số trang đầu tiên, vào Design > Different First Page'
    ],
    
    'excel' => [
        'hàm sum' => 'Hàm SUM trong Excel:
        Cú pháp: =SUM(number1, [number2],...)
        Ví dụ: =SUM(A1:A10) tính tổng từ ô A1 đến A10
        =SUM(A1,B2,C3) tính tổng các ô riêng lẻ',
        
        'vlookup' => 'Hàm VLOOKUP:
        Cú pháp: =VLOOKUP(lookup_value, table_array, col_index_num, [range_lookup])
        Ví dụ: =VLOOKUP("Tên", A1:B10, 2, FALSE)
        * Lưu ý: Cột đầu tiên trong vùng dữ liệu phải chứa giá trị tìm kiếm',
        
        'biểu đồ' => 'Tạo biểu đồ:
        1. Chọn vùng dữ liệu cần vẽ biểu đồ
        2. Vào Insert > Charts
        3. Chọn loại biểu đồ phù hợp (Column, Line, Pie...)
        4. Tùy chỉnh biểu đồ trong Chart Tools'
    ],
    
    'powerpoint' => [
        'slide mới' => 'Thêm slide mới:
        Cách 1: Nhấn Ctrl+M
        Cách 2: Vào Home > New Slide
        Cách 3: Click chuột phải vào slide panel > New Slide',
        
        'hiệu ứng' => 'Thêm hiệu ứng:
        1. Chọn đối tượng (text, hình ảnh...)
        2. Vào Animations
        3. Chọn hiệu ứng Entrance, Emphasis, Exit hoặc Motion Paths
        4. Tùy chỉnh thời gian trong Animation Pane',
        
        'trình chiếu' => 'Cách trình chiếu:
        1. Bắt đầu từ đầu: Nhấn F5
        2. Bắt đầu từ slide hiện tại: Nhấn Shift+F5
        3. Trình chiếu với Presenter View: Alt+F5
        * Mẹo: Nhấn B (Black) hoặc W (White) để tạm dừng trình chiếu'
    ],
    
    'chung' => [
        'phím tắt' => 'Các phím tắt thông dụng:
        - Ctrl+C: Sao chép
        - Ctrl+V: Dán
        - Ctrl+Z: Hoàn tác
        - Ctrl+S: Lưu
        - Ctrl+P: In
        - F12: Save As
        - Ctrl+F: Tìm kiếm
        - Ctrl+H: Thay thế',
        
        'lỗi' => 'Xử lý lỗi cơ bản:
        1. File không mở được: Thử mở bằng Open and Repair
        2. Ứng dụng bị treo: Nhấn Ctrl+Alt+Del để mở Task Manager > End Task
        3. Quên lưu file: Kiểm tra File > Info > Manage Document > Recover Unsaved Documents'
    ]
];
?>