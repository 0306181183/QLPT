<?php


namespace App;


class Mes
{
    static string $taophong="Tạo phòng thành công";
    static string $suaphong="Sửa phòng thành công";
    static string $suaphong_fail="Sửa phòng thất bại";
    static string $dongphong="Đóng phòng thành công";
    static string $dongphong_fail="Đóng phòng thất bại do phòng đang được thuê";
    static string $mophong="Mở phòng thành công";
    static string $suagiaphong="Giá phòng được cập nhật thành công";
    static string $taokhach="Tạo khách thành công";
    static string $suakhach="Thay đổi thông tin khách trọ thành công";
    static string $xoakhach="Xóa khách thành công";
    static string $xoakhach_fail="Không thể xóa khách trọ";
    static  string $taohopdong="Tạo hợp đồng thành công";
    static  string $taohopdong_fail="Tạo hợp đồng thất bại";
    static  string $ghidien="Ghi điện thành công";
    static  string $ghidien_fail="Số điện nhỏ hơn số hiên tại";
    static  string $taophieuthu="Phiếu thu đã được khởi tạo";
    static  string $taophieuthu_fail="Chưa tới hạn tạo phiếu";
    static string $thanhtoan="Đã thanh toán thành công";
    static string $themnguoivaoHD="Thêm người vào phòng thành công";
    static string $themnguoivaoHD_fail="Số người đã đạt mức tối đa";
    static string $xoanguoikhoiHD="Xóa người khỏi hợp đồng thành công";
    static string $xoanguoikhoiHD_fail="Xóa người thất bại";
    static string $thaydoiwifi="Thay đổi wifi thành công";
    static string $themxe="Thêm xe thành công";
    static string $xoaxe="Xóa xe thành công";
    static string $suagiadv="Sửa giá dịch vụ";
    static string $xoaHD="Xóa hợp đồng thành công";
    static string $xoaHD_fail="Xóa hợp đồng thất bại do đã tồn tại phiếu thu";
    static string $ketthucHD="Kết thúc hợp đồng thành công, hãy kiểm tra phiếu thu kết thúc";
    public static $conflict="Lỗi hệ thống";
    public static $unexpected="Lỗi không xác định";
}
