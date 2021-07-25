<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_companys')->insert([
            'nama_company' => 'PT. SINAR MAS',
            'alamat_company' => 'Jl. Nucifera, RT.004/RW.003, Jatiluhur, Kec. Jatiasih, Kota Bks, Jawa Barat 17415',
            'telp_company' => '021-0938-xxxx',
            'email_company' => 'example@gmail.com',
            'map_company' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31725.459124889487!2d106.93682086816392!3d-6.305394507935422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6992f35b18349b%3A0x90cc543147a3a257!2sCluster%20Jatiasih%20Residence!5e0!3m2!1sen!2sid!4v1627109542430!5m2!1sen!2sid',
        ]);
    }
}
