<?php
$students = [
    ["hoTen" => "Nguyen Thi A", "ngaySinh" => "2001-05-15", "gioiTinh" => "Nữ", "toan" => 8, "van" => 9, "tiengAnh" => 7],
    ["hoTen" => "Tran Minh B", "ngaySinh" => "2000-12-20", "gioiTinh" => "Nam", "toan" => 6, "van" => 7, "tiengAnh" => 8],
    ["hoTen" => "Le Thi C", "ngaySinh" => "2002-08-12", "gioiTinh" => "Nữ", "toan" => 9, "van" => 6, "tiengAnh" => 8],
    ["hoTen" => "Pham Minh D", "ngaySinh" => "1999-03-14", "gioiTinh" => "Nam", "toan" => 7, "van" => 8, "tiengAnh" => 6],
    ["hoTen" => "Nguyen Thi E", "ngaySinh" => "2001-10-11", "gioiTinh" => "Nữ", "toan" => 8, "van" => 9, "tiengAnh" => 7]
];

foreach ($students as &$student) {
    $student["diemTB"] = ($student["toan"] + $student["van"] + $student["tiengAnh"]) / 3;
}

function inDanhSachSinhVien($students) {
    usort($students, function($a, $b) {
        return strcmp($a["hoTen"], $b["hoTen"]);
    });
    print_r($students);
}

function danhSachSinhVienNu($students) {
    return array_filter($students, function($student) {
        return $student["gioiTinh"] === "Nữ";
    });
}

function danhSachSinhVienDiemTB($students) {
    return array_filter($students, function($student) {
        return $student["diemTB"] >= 8.0;
    });
}

function xapXepSinhVien($students) {
    usort($students, function($a, $b) {
        return $a["diemTB"] <=> $b["diemTB"];
    });
    print_r($students);
}

function timBanNuDiemTBCaoNhat($students) {
    $nữSinhVien = array_filter($students, function($student) {
        return $student["gioiTinh"] === "Nữ";
    });

    usort($nữSinhVien, function($a, $b) {
        return $b["diemTB"] <=> $a["diemTB"];
    });

    return $nữSinhVien[0];
}

echo "Danh sách sinh viên sắp xếp theo tên:\n";
inDanhSachSinhVien($students);

echo "\nDanh sách sinh viên nữ:\n";
print_r(danhSachSinhVienNu($students));

echo "\nDanh sách sinh viên có điểm TB >= 8.0:\n";
print_r(danhSachSinhVienDiemTB($students));

echo "\nDanh sách sinh viên sắp xếp theo điểm TB:\n";
xapXepSinhVien($students);

echo "\nBạn nữ có điểm TB cao nhất:\n";
print_r(timBanNuDiemTBCaoNhat($students));
?>
