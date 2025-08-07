<?php require_once('../../View/Admin/Layout/header.php'); ?>

<h1 class="title">Thêm Sinh Viên Mới</h1>
<ul class="breadcrumbs">
    <li><a href="index.php?controller=TrangChu">Trang Chủ</a></li>
    <li class="divider">/</li>
    <li><a href="index.php?controller=SinhVien&action=list">Sinh Viên</a></li>
    <li class="divider">/</li>
    <li><a href="#" class="active">Thêm mới</a></li>
</ul>

<div class="row">
    <div class="form">
        <div class="col-12">
            <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="row">
                    <!-- MSSV -->
                    <div class="col-6">
                        <div class="input-group">
                            <input type="text" name="txtMSSV" required>
                            <label>Mã sinh viên</label>
                        </div>
                    </div>
                    
                    <!-- Tên sinh viên -->
                    <div class="col-6">
                        <div class="input-group">
                            <input type="text" name="txtTenSinhVien" required>
                            <label>Tên sinh viên</label>
                        </div>
                    </div>
                    
                    <!-- Số điện thoại -->
                    <div class="col-6">
                        <div class="input-group">
                            <input type="tel" name="txtSoDienThoai" pattern="[0-9]{10,11}" required>
                            <label>Số điện thoại</label>
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div class="col-6">
                        <div class="input-group">
                            <input type="email" name="txtEmail" required>
                            <label>Email</label>
                        </div>
                    </div>
                    
                    <!-- Địa chỉ -->
                    <div class="col-12">
                        <div class="input-group">
                            <input type="text" name="txtDiachi" required>
                            <label>Địa chỉ</label>
                        </div>
                    </div>
                    
                    <!-- Mật khẩu -->
                    <div class="col-6">
                        <div class="input-group">
                            <input type="password" name="txtMatKhau" id="password" required>
                            <label>Mật khẩu</label>
                        </div>
                    </div>
                    
                    <!-- Xác nhận mật khẩu -->
                    <div class="col-6">
                        <div class="input-group">
                            <input type="password" id="confirm_password" required>
                            <label>Xác nhận mật khẩu</label>
                        </div>
                    </div>
                    
                    <!-- Avatar -->
                    <div class="col-12">
                        <div class="input-group">
                            <div class="file-upload">
                                <label for="txtAvata" class="upload-btn">Chọn ảnh đại diện</label>
                                <input type="file" name="txtAvata" id="txtAvata" accept="image/*">
                                <span id="file-name">Không chọn file</span>
                            </div>
                            <small>Chỉ chấp nhận file ảnh (jpg, png) ≤ 2MB</small>
                        </div>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" name="AddSinhVien" class="btn btn-success">
                        <i class='bx bx-save'></i> Thêm sinh viên
                    </button>
                    <a href="index.php?controller=SinhVien&action=list" class="btn btn-primary">
                        <i class='bx bx-arrow-back'></i> Trở về
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Validate form trước khi submit
function validateForm() {
    // Kiểm tra mật khẩu trùng khớp
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    
    if(password !== confirmPassword) {
        alert('Mật khẩu không trùng khớp!');
        return false;
    }
    
    // Kiểm tra file ảnh
    const fileInput = document.getElementById('txtAvata');
    if(fileInput.files.length > 0) {
        const file = fileInput.files[0];
        const validTypes = ['image/jpeg', 'image/png'];
        const maxSize = 2 * 1024 * 1024; // 2MB
        
        if(!validTypes.includes(file.type)) {
            alert('Chỉ chấp nhận file JPG hoặc PNG');
            return false;
        }
        
        if(file.size > maxSize) {
            alert('File ảnh không được vượt quá 2MB');
            return false;
        }
    }
    
    return true;
}

// Hiển thị tên file khi chọn
document.getElementById('txtAvata').addEventListener('change', function(e) {
    const fileName = e.target.files.length > 0 
        ? e.target.files[0].name 
        : 'Không chọn file';
    document.getElementById('file-name').textContent = fileName;
});
</script>

<?php require_once('../../View/Admin/Layout/footer.php'); ?>