<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - A Pen by Mohithpoojary</title>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
    <link rel="stylesheet" href="../../Asset/Css/dangkyuser.css">

</head>

<body>
    <div class="overlay">
        <form action="">
            <div class="con">
                <header class="head-form">
                    <h2>Đăng Ký</h2>
                </header>
                <br>
                <div class="field-set">
                    <input style="display: none;" name="controller" value="DangKy" >
                    <input style="display: none;" name="action" value="create" >
                    <input class="form-input" name="txtMSSV" id="txt-input" type="text" placeholder="Mã Số Sinh Viên" >
                    <br>
                    <input class="form-input" name="txtTenSinhVien" id="txt-input" type="text" placeholder="Họ Và Tên" >
                    <br>
                    <input class="form-input" name="txtDiaChi" id="txt-input" type="text" placeholder="Địa Chỉ" >
                    <br>
                    <input class="form-input" name="txtSoDienThoai" id="txt-input" type="text" placeholder="Số Điện Thoai" >
                    <br> 
                    <input class="form-input" name="txtEmail" id="txt-input" type="text" placeholder="Email" >
                    <br>
                    <input class="form-input" name="txtMatKhau" type="password" placeholder="Password" id="pwd" >
                    <br>
                    <button type="submit" class="log-in" name="CreateUser" value="signin">Đăng Ký </button>
                </div>
                <a href="index.php?controller=DangNhap" class="btn  login">Đăng Nhập </a>
            </div>

           
        </form>
    </div>
    <script>
    // Show/hide password onClick of button using Javascript only

    // https://stackoverflow.com/questions/31224651/show-hide-password-onclick-of-button-using-javascript-only

    function show() {
        var p = document.getElementById('pwd');
        p.setAttribute('type', 'text');
    }

    function hide() {
        var p = document.getElementById('pwd');
        p.setAttribute('type', 'password');
    }

    var pwShown = 0;

    document.getElementById("eye").addEventListener("click", function() {
        if (pwShown == 0) {
            pwShown = 1;
            show();
        } else {
            pwShown = 0;
            hide();
        }
    }, false);
    </script>
</body>

</html>