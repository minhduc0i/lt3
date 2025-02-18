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
    return $students;
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
    return $students;
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

function taoBangSinhVien($students) {
    echo "<table border='1'>";
    echo "<tr><th>Họ Tên</th><th>Ngày Sinh</th><th>Giới Tính</th><th>Điểm Toán</th><th>Điểm Văn</th><th>Điểm Tiếng Anh</th><th>Điểm TB</th></tr>";
    foreach ($students as $student) {
        echo "<tr>";
        echo "<td>" . $student["hoTen"] . "</td>";
        echo "<td>" . $student["ngaySinh"] . "</td>";
        echo "<td>" . $student["gioiTinh"] . "</td>";
        echo "<td>" . $student["toan"] . "</td>";
        echo "<td>" . $student["van"] . "</td>";
        echo "<td>" . $student["tiengAnh"] . "</td>";
        echo "<td>" . number_format($student["diemTB"], 2) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

echo "<h3>Danh sách sinh viên sắp xếp theo tên:</h3>";
taoBangSinhVien(inDanhSachSinhVien($students));

echo "<h3>Danh sách sinh viên nữ:</h3>";
taoBangSinhVien(danhSachSinhVienNu($students));

echo "<h3>Danh sách sinh viên có điểm TB >= 8.0:</h3>";
taoBangSinhVien(danhSachSinhVienDiemTB($students));

echo "<h3>Danh sách sinh viên sắp xếp theo điểm TB:</h3>";
taoBangSinhVien(xapXepSinhVien($students));

echo "<h3>Bạn nữ có điểm TB cao nhất:</h3>";
$topFemale = timBanNuDiemTBCaoNhat($students);
taoBangSinhVien([$topFemale]);
?>
