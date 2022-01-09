<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edit Users from Database</title>
</head>
<body>
    <main>
    <div class="container">
            <h5 class="text-center text-primary mt-5" >Sửa thông tin</h5>
            <form action="index.php?controller=nhanvien&action=editNV" method="POST">
            <div class="form-group">
                <label for="maNV">manv</label>
                <input type="text" class="form-control" hidden id="maNV" name="maNV" placeholder="" value="<?php echo $nv['maNV']; ?>">
            </div>
            <div class="form-group">
                <label for="hovaten">Ho Ten</label>
                <input type="text" class="form-control" id="hovaten" name="hovaten" placeholder="" value="<?php echo $nv['hovaten']; ?>">
            </div>
            <div class="form-group">
                <label for="chucvu">Chức Vụ</label>
                <input type="text" class="form-control" id="chucvu" name="chucvu" placeholder="Nhập chức vụ" value="<?php echo $nv['chucvu']; ?>">
            </div>
            <div class="form-group">
                <label for="phongban">PhongBan</label>
                <input type="text" class="form-control" id="phongban" name="phongban" placeholder="Nhập số máy bàn" value="<?php echo $nv['phongban']; ?>>">
            </div>
            <div class="form-group">
                <label for="luong">Luong</label>
                <input type="number" class="form-control" id="luong" name="luong" placeholder="Nhập số di động" value="<?php echo $nv['luong']; ?>">
            </div>
            <div class="form-group">
                <label for="ngayvaolam">NgayVaoLam</label>
                <input type="date" class="form-control" id="ngayvaolam" name="ngayvaolam" placeholder="Nhập Email" value="<?php echo $nv['ngayvaolam']; ?>">
            </div>
            
            <button type="submit" class="btn btn-primary">Lưu Lại</button>
            </form>
        </div>
        </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
</body>
</html>