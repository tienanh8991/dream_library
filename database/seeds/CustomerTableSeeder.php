<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer();
        $customer->name = 'Nhật Anh';
        $customer->code_id = 'NA2020';
        $customer->status = 2;
        $customer->class = 'BK-1209';
        $customer->address = 'Thanh Xuân';
        $customer->save();

        $customer = new Customer();
        $customer->name = 'Quang Duy';
        $customer->code_id = 'QD2020';
        $customer->status = 2;
        $customer->class = 'KTQD-1102';
        $customer->address = 'Hoàng Mai';
        $customer->save();

        $customer = new Customer();
        $customer->name = 'Hoàng Quyên';
        $customer->code_id = 'HQ2020';
        $customer->status = 2;
        $customer->class = 'BC-6671';
        $customer->address = 'Long Biên';
        $customer->save();

        $customer = new Customer();
        $customer->name = 'Minh Tú';
        $customer->code_id = 'MT2020';
        $customer->status = 2;
        $customer->class = 'MDC-0086';
        $customer->address = 'Cầu Giấy';
        $customer->save();

        $customer = new Customer();
        $customer->name = 'Thanh Hà';
        $customer->code_id = 'TH2020';
        $customer->status = 2;
        $customer->class = 'DL-2563';
        $customer->address = 'Ba Đình';
        $customer->save();

    }
}
