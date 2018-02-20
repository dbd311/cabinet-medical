<?php

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageTableSeeder extends Seeder {

    public function run() {

        Eloquent::unguard();
        Package::create(array(
            'package_name' => 'Agenda of Carole DINH',
            'package_price' => '55', // 50 euros
            'package_time' => '45', // 45 minutes
            'package_description' => 'Agenda of the osteopathy office in Thionville (Carole DINH, osteopath D.O.)'
        ));

        Package::create(array(
            'package_name' => 'Agenda of Jessica LEVAN',
            'package_price' => '55',
            'package_time' => '30',
            'package_description' => 'Agenda en ligne de Jessica'
        ));
    }

}
