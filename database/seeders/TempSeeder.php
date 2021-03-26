<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Translation\t;

class TempSeeder extends DatabaseSeeder
{

    public function run()
    {
        $date=Carbon::now();
        DB::table('Phong')->insert([
            ["id"=>$this->phongchuathue1,"tenphong"=>"Phòng chưa thuê 1","songuoimax"=>6,"giaphong"=>4000000,"trangthai"=>true],
            ["id"=>$this->phongchuathue2,"tenphong"=>"Phòng chưa thuê 2","songuoimax"=>1,"giaphong"=>3000000,"trangthai"=>true],
            ["id"=>$this->phongdong,"tenphong"=>"Phòng đóng","songuoimax"=>2,"giaphong"=>2000000,"trangthai"=>false],
            ["id"=>$this->phongdathue1,"tenphong"=>"Phòng đã thuê","songuoimax"=>2,"giaphong"=>2000000,"trangthai"=>true],
            ["id"=>$this->phongdathue2,"tenphong"=>"Phòng đã thuê","songuoimax"=>2,"giaphong"=>2000000,"trangthai"=>true]
        ]);
        DB::table('HopDong')->insert([
            ["id"=>$this->hopdong,"ngaylap"=>$date,"thoihan"=>6,"tiencoc"=>2000000,"trangthai"=>true,"idphong"=>$this->phongdathue],
            ["id"=>$this->hopdong2,"ngaylap"=>$date,"thoihan"=>6,"tiencoc"=>2000000,"trangthai"=>true,"idphong"=>$this->phongdathue2]
        ]);
        DB::table('KhachTro')->insert([
            ["id"=>$this->khach1,"tenkhach"=>"Phạm Như Thuần","cmnd"=>"12345678910","gioitinh"=>true,"ngaysinh"=>"2000/12/23","quequan"=>"Đồng Tháp","idhopdong"=>$this->hopdong,"trangthai"=>true],
            ["id"=>$this->khach2,"tenkhach"=>"Nguyễn Tấn Trung","cmnd"=>"12345678911","gioitinh"=>true,"ngaysinh"=>"2000/12/24","quequan"=>"Long An","idhopdong"=>$this->hopdong,"trangthai"=>true],
            ["id"=>$this->khach3,"tenkhach"=>"Trần Công Minh Trí","cmnd"=>"12345678912","gioitinh"=>true,"ngaysinh"=>"2000/12/25","quequan"=>"Vũng Tàu","idhopdong"=>null,"trangthai"=>true],
            ["id"=>$this->khach4,"tenkhach"=>"Nguyễn Văn Trọng","cmnd"=>"12345678913","gioitinh"=>true,"ngaysinh"=>"2000/12/26","quequan"=>"Tây Ninh","idhopdong"=>null,"trangthai"=>true],
            ["id"=>$this->khach5,"tenkhach"=>"Phạm Ngọc Thuận","cmnd"=>"12345678914","gioitinh"=>true,"ngaysinh"=>"2000/12/26","quequan"=>"Long An","idhopdong"=>$this->hopdong2,"trangthai"=>true]

        ]);
        DB::table('Xe')->insert([
            ["id"=>$this->xe1,"loaixe"=>"wave","bienso"=>"12C-3214","idkhach"=>$this->khach1],
            ["id"=>$this->xe2,"loaixe"=>"wavealpha","bienso"=>"64C-1224","idkhach"=>$this->khach3]
        ]);


        DB::table('Log')->insert([
            ["id"=>$this->lognguoi1,"idloai"=>2,"noidung"=>json_encode(['idnguoi'=>$this->khach1]),"idhopdong"=>$this->hopdong,"ngaylap"=>$date],
            ["id"=>$this->lognguoi2,"idloai"=>2,"noidung"=>json_encode(['idnguoi'=>$this->khach2]),"idhopdong"=>$this->hopdong,"ngaylap"=>$date],
            ["id"=>$this->logxe,"idloai"=>4,"noidung"=>json_encode(['idxe'=>$this->xe1]),"idhopdong"=>$this->hopdong,"ngaylap"=>$date],
            ["id"=>$this->lognguoi3,"idloai"=>2,"noidung"=>json_encode(['idnguoi'=>$this->khach5]),"idhopdong"=>$this->hopdong2,"ngaylap"=>$date],
        ]);
        DB::table('TrangThaiThue')->insert([
            ["id"=>$this->snapshot1,"chisodien"=>$this->chisodien,"idhopdong"=>$this->hopdong,"soxe"=>1,"songuoi"=>2,"giaphong"=>"2000000","ngaylap"=>$date,"wifi"=>true],
            ["id"=>$this->snapshot2,"chisodien"=>$this->chisodien,"idhopdong"=>$this->hopdong2,"soxe"=>0,"songuoi"=>1,"giaphong"=>"2000000","ngaylap"=>$date,"wifi"=>false]
        ]);
        DB::table('GiaDichVu')->insert([
           ["id"=>$this->dien,"idloai"=>1,"giathaydoi"=>3500,"ngaythaydoi"=>$date],
            ["id"=>$this->nuoc,"idloai"=>2,"giathaydoi"=>50000,"ngaythaydoi"=>$date],
            ["id"=>$this->wifi,"idloai"=>3,"giathaydoi"=>70000,"ngaythaydoi"=>$date],
            ["id"=>$this->rac,"idloai"=>4,"giathaydoi"=>10000,"ngaythaydoi"=>$date],
            ["id"=>$this->quanly,"idloai"=>5,"giathaydoi"=>30000,"ngaythaydoi"=>$date],
            ["id"=>$this->xe,"idloai"=>6,"giathaydoi"=>200000,"ngaythaydoi"=>$date]
        ]);
    }
}
