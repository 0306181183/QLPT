<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    protected $phongchuathue1='a79b3de8-506d-412d-a5f4-76dcd2679829';
    protected $phongdathue='82ed5fe5-e28f-4dfc-b2c5-92732bc235fc';
    protected $phongdong='ff9d0815-8064-462d-b09d-2d34e8ce323c';
    protected $phongchuathue2='5f1ccd5e-5d42-4896-ab03-8d50debadeb5';
    protected $khach1='f7996832-1029-40e9-979a-203cd68abc9e';
    protected $khach2='99b75892-16bf-4fa5-87bd-44b489a2d010';
    protected $khach3='daee23f3-9d7e-4678-9f64-d30db50aa022';
    protected $khach4='b509d7cd-f61f-4676-8d2f-ca2eeb4c69bf';
    protected $hopdong='5e7b0fc8-0462-4400-a049-0ee261df81e1';
    protected $xe1='a93023c1-8c84-4b6c-99e6-a19be25331a7';
    protected $xe2='4f9e6343-7fb8-4c44-9ce0-574164532ca7';
    protected $dien='2f609ab2-10d4-4716-bf25-20cfa1d4a6e0';
    protected $nuoc='94411015-a157-42b2-846b-45c04c9a939f';
    protected $wifi='a97c7c69-e113-4097-ba3a-2c578841202b';
    protected $quanly='e650ddcc-8523-44e6-ae1c-3207b1b5b824';
    protected $rac='2bd88c5d-f2cc-4a97-943d-491525f03c89';
    protected $xe='b1de661a-7fe4-46de-9c04-2e9a3e13a20f';
    protected $snapshot1='a239e90d-50d7-4a4a-bdd9-973871869c10';
    protected $lognguoi1='66965dfd-1d59-4def-9929-70f31deac3f4';
    protected $lognguoi2='a8cf0878-1dee-414c-9104-319d90a28929';
    protected $logxe='9ad31a6b-e731-42e8-b8df-9fff9a422a1d';
    protected $logdien='a8e7270e-bf3b-4c57-b345-9664307ad579';
    protected $chisodien=345;


    public function run()
    {
//        $tables = app('db')->select('SHOW TABLES');
//        app('db')->statement('SET FOREIGN_KEY_CHECKS=0;');
//        foreach ($tables as $table) {
//            if ($table->Tables_in_QLPT == 'migrations') continue;
//            app('db')->table($table->Tables_in_QLPT)->truncate();
//        }
//        app('db')->statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call(TempSeeder::class);

    }
}
