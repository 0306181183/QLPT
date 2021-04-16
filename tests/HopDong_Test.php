<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\WithoutMiddleware;
use app\Mes as mess;

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
            'idkhach'=>[
                'khach1'=>$this->khach3,
                'khach2'=>$this->khach4
            ],
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
            'giaphong'=>4000000
        ];
        $data3=[
            'idloai'=>2,
            'noidung'=>[
                'idkhach'=>$this->khach3
            ]
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
                'idkhach'=>$this->xe2
            ]
        ];
        $this->call('POST','tao-hopdong',$input);
        $this->seeJsonEquals(['success'=>mess::$taohopdong]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('hopdong',$data1);
        $this->seeInDatabase('trangthaithue',$data2);
        $this->seeInDatabase('log',$data3);
        $this->seeInDatabase('log',$data4);
        $this->seeInDatabase('log',$data5);
    }
    public function testCreate2()
    {
        $input=[
            'thoihan'=>6,
            'tiencoc'=>3000000,
            'idphong'=>$this->phongchuathue1,
            'chisodien'=>124,
            'idkhach'=>[
                'khach2'=>$this->khach4
            ],
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
                'giaphong'=>4000000
            ];
        $data3=[     'idloai'=>2,
            'noidung'=>[
                'idkhach'=>$this->khach4
            ]
        ];


        $this->call('POST','tao-hopdong',$input);
        $this->seeJsonEquals(['success'=>mess::$taohopdong]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('hopdong',$data1);
        $this->seeInDatabase('trangthaithue',$data2);
        $this->seeInDatabase('log',$data3);

    }
    public function testCreate_fail()
    {
        $input=[
            'thoihan'=>6,
            'tiencoc'=>3000000,
            'idphong'=>$this->phongchuathue2,
            'chisodien'=>124,
            'idkhach'=>[
                'khach1'=>$this->khach3,
                'khach2'=>$this->khach4
            ],
        ];
        $this->call('POST','tao-hopdong',$input);
        $this->seeJsonEquals(['conflict'=>mess::$taohopdong_fail]);
        $this->seeStatusCode(409);
    }
    public  function  testGhiDien()
    {
        $input=[
            'id'=>$this->hopdong,
            'chisodien'=>349
        ];
        $data=[
            'idloai'=>6,
            'noidung'=>[
                'chisodien'=>$input['chisodien']
            ],
            'idhopdong'=>$input['id']
        ];

        $this->call('POST','ghi-dien',$input);
        $this->seeJsonEquals(['seccess'=>mess::$ghidien]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('log',$data);


    }
    public  function  testGhiDien_fail()
    {
        $input=[
            'id'=>$this->hopdong,
            'chisodien'=>200
        ];

        $this->call('POST','ghi-dien',$input);
        $this->seeJsonEquals(['conflict'=>mess::$ghidien_fail]);
        $this->seeStatusCode(409);


    }
    public  function  testTaoPhieuThu() //chưa sửa
    {
        $input=[
            'id'=>$this->hopdong
        ];
        $this->call('POST','tao-phieuthu',$input);
        $this->seeJsonEquals(['seccess'=>mess::$taophieuthu]);
        $this->seeStatusCode(200);
    }
    public  function  testThanhToan()
    {
        $input=[
            'id'=>$this->hopdong,
        ];
        $this->call('POST','thanh-toan',$input);
        $this->seeJsonEquals(['seccess'=>mess::$thanhtoan]);
        $this->seeStatusCode(200);
    }
    public function testThemNguoi() 
    {
        $input=[
            'id'=>$this->hopdong2,
            'idkhach'=>$this->khach3
        ];
        $data1=[
          'id'=>$input['idkhach'],
            'idhopdong'=>$input['id']
        ];
        $data2=[
            'idloai'=>2,
            'noidung'=>[
                'idkhach'=>$input['idkhach']
                ],
            'idhopdong'=>$input['id']
        ];
        $this->call('POST','them-nguoiHD',$input);
        $this->seeJsonEquals(['seccess'=>mess::$themnguoivaoHD]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('khachtro',$data1);
        $this->seeInDatabase('log',$data2);
    }
    public function testThemNguoi_fail()
    {
        $input=[
            'id'=>$this->hopdong,
            'idkhach'=>$this->khach3
        ];
        $this->call('POST','them-nguoiHD',$input);
        $this->seeJsonEquals(['conflict'=>mess::$themnguoivaoHD_fail]);
        $this->seeStatusCode(409);
    }
    public function testXoaNguoi() //chưa sửa
    {
        $input=[
            'id'=>$this->hopdong,
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
            'idhopdong'=>$input['id']
        ];
        $this->call('POST','xoa-nguoiHD',$input);
        $this->seeJsonEquals(['seccess'=>mess::$xoanguoikhoiHD]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('khachtro',$data1);
        $this->seeInDatabase('log',$data2);
    }
    public function testXoaNguoi_fail()
    {
        $input=[
            'id'=>$this->hopdong2,
            'idkhach'=>$this->khach5
        ];
        $this->call('POST','xoa-nguoiHD',$input);
        $this->seeJsonEquals(['conflict'=>mess::$xoanguoikhoiHD_fail]);
        $this->seeStatusCode(409);
    }
    public function testWifi()
    {
        $input=[
            'idhopdong'=>$this->hopdong,
            'wifi'=>true
        ];
        $data=[
          'idloai'=>7 ,
            'noidung'=>[
                'wifi'=>$input['wifi']
            ],
            'idhopdong'=>$input['idhopdong']
        ];
        $this->call('POST','wifi',$input);
        $this->seeJsonEquals(['seccess'=>mess::$thaydoiwifi]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('log',$data);

    }
}
