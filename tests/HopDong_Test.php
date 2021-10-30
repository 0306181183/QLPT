<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\WithoutMiddleware;
use App\Mes as mess;

class HopDong_Test extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;
    public function testCreate1()
    {
        $input=[
            'thoihan'=>6,
            'tiencoc'=>3000000,
            'idphong'=>$this->phongchuathue1,
            'chisodien'=>124,
            'khach'=>[
                ['idkhach'=>$this->khach3],
                ['idkhach'=>$this->khach4]
            ],
            'wifi'=>true,
        ];
        $data1=[
            'thoihan'=>$input['thoihan'],
            'tiencoc'=>$input['tiencoc'],
            'trangthai'=>true,
            'idphong'=>$input['idphong']
        ];
        $data2=[
            'chisodien'=>$input['chisodien'],
            'songuoi'=>2,
            'soxe'=>1,
            'giaphong'=>4000000,
            'wifi'=>$input['wifi']
        ];

        $data4=[
            'idloai'=>2,
            'noidung'=>[
                'idkhach'=>$this->khach4
            ]
        ];
        $data5=[
            'idloai'=>4,
            'noidung'=>[
                'idkhach'=>$this->khach3
            ]
        ];
        $data6=[
            'idloai'=>1,
            'noidung'=>[
                'giaphong'=>4000000,
                'idphong'=>$this->phongchuathue1
            ]
        ];
        $data7=[
            'idloai'=>6,
            'noidung'=>[
                'chisodien'=>124
            ]
        ];
        $data8=[
            'idloai'=>7,
            'noidung'=>[
                'wifi'=>true
            ]
        ];
        $this->call('POST','tao-hopdong',$input);
        $this->seeJsonEquals(['success'=>mess::$taohopdong]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('hopdong',$data1);
        $this->seeInDatabase('trangthaithue',$data2);

       $this->assertTrue($this->compareLog($data4));
       $this->assertTrue($this->compareLog($data5));
        $this->assertTrue($this->compareLog($data6));
        $this->assertTrue($this->compareLog($data7));
        $this->assertTrue($this->compareLog($data4));
        $this->assertTrue($this->compareLog($data8));

    }
    public function testCreate2()
    {
        $input=[
            'thoihan'=>6,
            'tiencoc'=>3000000,
            'idphong'=>$this->phongchuathue1,
            'chisodien'=>124,
            'khach'=>[
                ['idkhach'=>$this->khach4],
            ],
            'wifi'=>true,
        ];
        $data1=[
            'thoihan'=>$input['thoihan'],
            'tiencoc'=>$input['tiencoc'],
            'trangthai'=>true,
            'idphong'=>$input['idphong']
        ];

        $data2=[
                'chisodien'=>$input['chisodien'],
                'songuoi'=>1,
                'soxe'=>0,
                'giaphong'=>4000000,
                'wifi'=>$input['wifi']

            ];
        $data3=[
            'idloai'=>2,
            'noidung'=>[
                'idkhach'=>$this->khach4
            ]
        ];
        $data4=[
            'idloai'=>1,
            'noidung'=>[
                'giaphong'=>4000000,
                'idphong'=>$this->phongchuathue1
            ]
        ];
        $data5=[
            'idloai'=>6,
            'noidung'=>[
                'chisodien'=>124
            ]
        ];
        $data6=[
            'idloai'=>7,
            'noidung'=>[
                'wifi'=>true
            ]
        ];


        $this->call('POST','tao-hopdong',$input);
        $this->seeJsonEquals(['success'=>mess::$taohopdong]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('hopdong',$data1);
        $this->seeInDatabase('trangthaithue',$data2);
        $this->assertTrue($this->compareLog($data3));
        $this->assertTrue($this->compareLog($data4));
        $this->assertTrue($this->compareLog($data5));
        $this->assertTrue($this->compareLog($data6));
    }
    public function testCreate_fail()
    {
        $input=[
            'thoihan'=>6,
            'tiencoc'=>3000000,
            'idphong'=>$this->phongchuathue2,
            'chisodien'=>124,
            'khach'=>[
               [ 'idkhach'=>$this->khach3],
                ['idkhach'=>$this->khach4]
            ],
            'wifi'=>true,
        ];
        $this->call('POST','tao-hopdong',$input);
        $this->seeJsonEquals(['conflict'=>mess::$themnguoivaoHD_fail]);
        $this->seeStatusCode(409);
    }
    public  function  testGhiDien()
    {
        $input=[
            'id'=>$this->hopdong,
            'chisodien'=>349
        ];
        $data=[
            'idhopdong'=>$input['id'],
            'chisodien'=>$input['chisodien']
        ];
        $data_log=[
            'idloai'=>6,
            'noidung'=>[
                'chisodien'=>$input['chisodien']
            ],
            'idhopdong'=>$input['id']
        ];

        $this->call('POST','ghi-dien',$data);
        $this->seeJsonEquals(['success'=>mess::$ghidien]);
        $this->seeStatusCode(200);
        $this->assertTrue($this->compareLog($data_log));
    }
    public  function  testGhiDien_fail()
    {
        $input=[
            'id'=>$this->hopdong,
            'chisodien'=>200
        ];
        $data=[
            'idhopdong'=>$input['id'],
            'chisodien'=>$input['chisodien']
        ];

        $this->call('POST','ghi-dien',$data);
        $this->seeJsonEquals(['conflict'=>mess::$ghidien_fail]);
        $this->seeStatusCode(409);


    }
    public  function  testTaoPhieuThu() //chưa sửa
    {
        $input=[
            'idhopdong'=>$this->hopdong //
        ];
        $data1=[
            'chisodien'=>400,
            'idhopdong'=>$input['idhopdong'],
            'soxe'=>1,
            'songuoi'=>2,
            'giaphong'=>2000000,
            'wifi'=>true
        ];
      $data2=[
            'giaphong'=>2000000,
            'tiendien'=>192500,
            'tiennuoc'=>100000,
            'tienwifi'=>70000,
            'tienxe'=>200000,
            'tienrac'=>10000,
            'tienquanly'=>30000,
            'trangthai'=>true
        ];
        $this->call('POST','tao-phieuthu',$input); //
        $this->seeJsonEquals(['success'=>mess::$taophieuthu]); //
        $this->seeStatusCode(200);
        $this->seeInDatabase('trangthaithue',$data1);
        $this->seeInDatabase('phieuthu',$data2);

    }
    public  function  testTaoPhieuThu_fail() //chưa sửa
    {
        $input=[
            'idhopdong'=>$this->hopdong2 //
        ];

        $this->call('POST','tao-phieuthu',$input); //
        $this->seeJsonEquals(['conflict'=>mess::$taophieuthu_fail]);
        $this->seeStatusCode(409);

    }
    public  function  testThanhToan() //chưa sửa
    {
        $input=[
            'idhopdong'=>$this->hopdong,
        ];
        $data=[
            'idhopdong'=>$input['idhopdong'],

        ];
        $this->call('POST','thanh-toan',$input);
        $this->seeJsonEquals(['seccess'=>mess::$thanhtoan]);
        $this->seeStatusCode(200);
    }
    public function testXoaHD()
    {
        $input=[
            'idhopdong'=>$this->hopdong2,
        ];
        $data=[
            'id'=>$input['idhopdong'],
            'trangthai'=>false,
        ];
        $this->call('POST','xoa-hopdong',$input);
        $this->seeJsonEquals(['success'=>mess::$xoaHD]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('hopdong',$data);

    }
    public function testThemNguoi_coxe()
    {
        $input=[
            'idhopdong'=>$this->hopdong2,
            'idkhach'=>$this->khach3
        ];
        $data1=[
            'id'=>$input['idkhach'],
            'idhopdong'=>$input['idhopdong']
        ];
        $data2=[
            'idloai'=>2,
            'noidung'=>[
                'idkhach'=>$input['idkhach']
                ],
            'idhopdong'=>$input['idhopdong']
        ];
        $data3=[
            'idloai'=>4,
            'noidung'=>[
                'idkhach'=>$input['idkhach']
            ],
            'idhopdong'=>$input['idhopdong']
        ];
        $this->call('POST','themnguoi-HD',$input);
        $this->seeJsonEquals(['success'=>mess::$themnguoivaoHD]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('khachtro',$data1);
        $this->assertTrue($this->compareLog($data2));
        $this->assertTrue($this->compareLog($data3));

    }
    public function testThemNguoi_khongxe()
    {
        $input=[
            'idhopdong'=>$this->hopdong2,
            'idkhach'=>$this->khach4
        ];
        $data1=[
            'id'=>$input['idkhach'],
            'idhopdong'=>$input['idhopdong']
        ];
        $data2=[
            'idloai'=>2,
            'noidung'=>[
                'idkhach'=>$input['idkhach']
            ],
            'idhopdong'=>$input['idhopdong']
        ];
        $this->call('POST','themnguoi-HD',$input);
        $this->seeJsonEquals(['success'=>mess::$themnguoivaoHD]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('khachtro',$data1);
        $this->assertTrue($this->compareLog($data2));
    }
    public function testThemNguoi_fail()
    {
        $input=[
            'idhopdong'=>$this->hopdong,
            'idkhach'=>$this->khach3
        ];
        $this->call('POST','themnguoi-HD',$input);
        $this->seeJsonEquals(['conflict'=>mess::$themnguoivaoHD_fail]);
        $this->seeStatusCode(409);
    }
    public function testXoaNguoi_coxe() //chưa sửa
    {
        $input=[
            'idhopdong'=>$this->hopdong,
            'idkhach'=>$this->khach1
        ];
        $data1=[
            'id'=>$input['idkhach'],
            'idhopdong'=>null
        ];
        $data2=[
            'idloai'=>3,
            'noidung'=>[
                'idkhach'=>$input['idkhach']
            ],
            'idhopdong'=>$input['idhopdong']
        ];
        $data3=[
            'idloai'=>5,
            'noidung'=>[
                'idkhach'=>$input['idkhach']
            ],
            'idhopdong'=>$input['idhopdong']
        ];
        $this->call('POST','xoanguoi-HD',$input);
        $this->seeJsonEquals(['success'=>mess::$xoanguoikhoiHD]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('khachtro',$data1);
        $this->assertTrue($this->compareLog($data2));
        $this->assertTrue($this->compareLog($data3));
    }
    public function testXoaNguoi_khongxe()
    {
        $input=[
            'idhopdong'=>$this->hopdong,
            'idkhach'=>$this->khach2
        ];
        $data1=[
            'id'=>$input['idkhach'],
            'idhopdong'=>null
        ];
        $data2=[
            'idloai'=>3,
            'noidung'=>[
                'idkhach'=>$input['idkhach']
            ],
            'idhopdong'=>$input['idhopdong']
        ];
        $this->call('POST','xoanguoi-HD',$input);
        $this->seeJsonEquals(['success'=>mess::$xoanguoikhoiHD]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('khachtro',$data1);
        $this->assertTrue($this->compareLog($data2));
    }
    public function testXoaNguoi_fail()
    {
        $input=[
            'idhopdong'=>$this->hopdong2,
            'idkhach'=>$this->khach5
        ];
        $this->call('POST','xoanguoi-HD',$input);
        $this->seeJsonEquals(['conflict'=>mess::$xoanguoikhoiHD_fail]);
        $this->seeStatusCode(409);
    }
    public function testWifi()
    {
        $input=[
            'id'=>$this->hopdong,
            'wifi'=>true
        ];
        $data=[
            'idhopdong'=>$input['id'],
            'wifi'=>$input['wifi']
        ];
        $data_log=[
          'idloai'=>7,
            'noidung'=>[
                'wifi'=>$input['wifi']
            ],
            'idhopdong'=>$input['id']
        ];

        $this->call('POST','wifi',$data);
        $this->seeJsonEquals(['success'=>mess::$thaydoiwifi]);
        $this->seeStatusCode(200);
        $this->assertTrue($this->compareLog($data_log));

    }
}
