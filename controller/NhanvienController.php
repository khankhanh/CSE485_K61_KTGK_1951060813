<?php
    require_once 'model/NhanvienModel.php';
    class NhanvienController{
            // Điều khiển về mặt logic giữa NhanvienModel và User View
           function index(){
            // Tôi sẽ cần gọi NhanvienModel để truy vấn dữ liệu
            $NVModel = new NhanvienModel();
            $nvs = $NVModel->getAllNhanvien();
            // Sau khi truy vấn được dữ liệu, tôi sẽ đổ ra UserView/index.php tương ứng
            require_once 'view/nhanvien/index.php';
        }

        function detail(){
            // Tôi sẽ cần gọi UserModel để truy vấn dữ liệu
            $manv = $_GET['id'];
            $NVModel = new NhanvienModel();
            $nv = $NVModel->getNhanvien($manv);
            // Sau khi truy vấn được dữ liệu, tôi sẽ đổ ra UserView/index.php tương ứng
            require_once 'view/nhanvien/detail.php';
        }
        function add(){
            require_once 'view/nhanvien/add.php';
        }
        function addNV(){
            $hovaten = $_POST['hovaten'];
            $chucvu = $_POST['chucvu'];
            $phongban = $_POST['phongban'];
            $luong = $_POST['luong'];
            $ngayvaolam = $_POST['ngayvaolam'];
            $NVModel = new NhanvienModel();

            $nvs = $NVModel->addNhanvien($hovaten,
                $chucvu,
                $phongban,
                $luong,
                $ngayvaolam);
            
            header("Location: index.php?controller=nhanvien&action=index");
        }
        function edit(){
            // Kiểm tra nếu người dùng nhấn submit
            // Tôi sẽ cần gọi UserModel để truy vấn dữ liệu
             // Tôi sẽ cần gọi UserModel để truy vấn dữ liệu
             $manv = $_GET['id'];
             $NVModel = new NhanvienModel();
             $nv = $NVModel->getNhanvien($manv);
             // Sau khi truy vấn được dữ liệu, tôi sẽ đổ ra UserView/index.php tương ứng
             require_once 'view/nhanvien/edit.php';
            // Nếu ko show ra view UserView/edit.php tương ứng
        }
        function editNV(){
            $manv = $_POST['maNV'];
            $hovaten = $_POST['hovaten'];
            $chucvu = $_POST['chucvu'];
            $phongban = $_POST['phongban'];
            $luong = $_POST['luong'];
            $ngayvaolam = $_POST['ngayvaolam'];
            $NVModel = new NhanvienModel();

            $nv = $NVModel->editNhanvien($manv,
                $hovaten,
                $chucvu,
                $phongban,
                $luong,
                $ngayvaolam);
            
            header("Location: index.php?controller=nhanvien&action=index");
        }
        function delete(){
                $manv = $_GET['id'];
                if (!is_numeric($manv)) {
                    header("Location: index.php?controller=nhanvien&action=index");
                    exit();
                }
        
                $NVModel = new NhanvienModel();
                $isDelete = $NVModel->delete($manv);
        
                if ($isDelete) {
                    //chuyển hướng về trang liệt kê danh sách
                    //tạo session thông báo mesage
                    $_SESSION['success'] = "Xóa bản ghi #$userID thành công";
                }
                else {
                    //báo lỗi
                    $_SESSION['error'] = "Xóa bản ghi #$userID thất bại";
                }
        
                header("Location: index.php?controller=nhanvien&action=index");
                exit();
        }
    }



?>