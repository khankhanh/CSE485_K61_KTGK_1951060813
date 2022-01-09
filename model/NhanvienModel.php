<?php
    require_once 'config/database.php';

    class NhanvienModel{
        private $maNV;
        private $hovaten;
        private $chucvu;
        private $phongban;
        private $luong;
        private $ngayvaolam;


        // Định nghĩa các phương thức để sau này nhận các thao tác tương ứng với các action
        public function getAllNhanvien(){
            // B1. Khởi tạo kết nối
            $conn = $this->connectDb();
            // B2. Định nghĩa và thực hiện truy vấn
            $sql = "SELECT * FROM nhanvien";
            $result = mysqli_query($conn,$sql);

            // Tôi khai báo biến lưu kết quả trả về (dạng mảng)
            $arr_nhanviens = [];
            // B3. Xử lý và (KO PHẢI SHOW KẾT QUẢ) TRẢ VỀ KẾT QUẢ
            if(mysqli_num_rows($result) > 0){
                // Lấy tất cả dùng mysqli_fetch_all
                $arr_nhanviens = mysqli_fetch_all($result, MYSQLI_ASSOC); //Sử dụng MYSQLI_ASSOC để chỉ định lấy kết quả dạng MẢNG KẾT HỢP
            }

            return $arr_nhanviens;
        }
    
        public function getNhanvien($nhanvienID) {
            
            $connection = $this->connectDb();
            $querySelect = "SELECT * FROM nhanvien WHERE manv=$nhanvienID";
            $result = mysqli_query($connection, $querySelect);
            $arr_nhanvien = [];
            if(mysqli_num_rows($result) > 0) {
                $arr_nhanviens = mysqli_fetch_all($result, MYSQLI_ASSOC);
                
                $arr_nhanvien = $arr_nhanviens[0];
            }
           
            $this->closeDb($connection);
            return $arr_nhanvien;
        }
    
        /**
         * Truy vấn lấy ra tất cả sách trong CSDL
         */
        public function delete($nhanvienID) {
            $connection = $this->connectDb();
    
            $queryDelete = "DELETE FROM nhanvien WHERE manv = $nhanvienID";
            $isDelete = mysqli_query($connection, $queryDelete);
           
            $this->closeDb($connection);
    
            return $isDelete;
        }
        public function addNhanvien($hovaten1, $chucvu1, $phongban1, $luong1, $ngayvaolam1){
            // B1. Khởi tạo kết nối
            $conn = $this->connectDb();
            // B2. Định nghĩa và thực hiện truy vấn
            $sql = "INSERT INTO `nhanvien`(`hovaten`, `chucvu`, `phongban`, `luong`, `ngayvaolam`) 
            VALUES(
                    '$hovaten1',
                    '$chucvu1',
                    '$phongban1',
                    '$luong1',
                    '$ngayvaolam1')";

            $Add = mysqli_query($conn, $sql);
        }

        public function editNhanvien($manv1,$hovaten1, $chucvu1, $phongban1, $luong1, $ngayvaolam1){
            // B1. Khởi tạo kết nối
            $conn = $this->connectDb();
            // B2. Định nghĩa và thực hiện truy vấn
            $sql = "UPDATE `nhanvien`
                SET 
                `hovaten` = '$hovaten1',
                `chucvu` = '$chucvu1',
                `phongban` = '$phongban1',
                `luong`=   '$luong1',
                `ngayvaolam` = '$ngayvaolam1'
                
            Where `maNV`='$manv1'";

            $update = mysqli_query($conn, $sql);
        }

        public function connectDb() {
            $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            if (!$connection) {
                die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
            }
    
            return $connection;
        }
    
        public function closeDb($connection = null) {
            mysqli_close($connection);
        }
    }


?>