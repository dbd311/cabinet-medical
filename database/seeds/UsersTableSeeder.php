<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $a = \Osteo::newUser();
        $a->name = env('USER_NAME', 'admin');
        $a->email = env('USER_EMAIL', 'admin@admin.com');
        $a->password = bcrypt(env('USER_PASSWORD', 'admin123'));
        $a->active = true;
        $a->banned = false;
        $a->register_ip = "";
        $a->country_code = env('USER_COUNTRY_CODE', 'ES');
        $a->locale = "en";
        $a->activation_key = str_random(25);
        $a->su = true;
        $a->role = 0;
        $a->has_package = 1;
        $a->save();
        
        $b = \Osteo::newUser();
        $b->name = 'secretariat';
        $b->email = 'xxx@xxx.com';
        $b->password = bcrypt('Secretariat57100');
        $b->active = true;
        $b->banned = false;
        $b->register_ip = "";
        $b->country_code = env('USER_COUNTRY_CODE', 'ES');
        $b->locale = "en";
        $b->activation_key = str_random(25);
        $b->su = false;
        $b->role = 1;
        $b->has_package = 2;
        $b->save();
        
        $c = \Osteo::newUser();
        $c->name = 'professional';
        $c->email = 'xxx@xxx.com';
        $c->password = bcrypt('Pro57100');
        $c->active = true;
        $c->banned = false;
        $c->register_ip = "";
        $c->country_code = env('USER_COUNTRY_CODE', 'ES');
        $c->locale = "en";
        $c->activation_key = str_random(25);
        $c->su = false;
        $c->role = 2;
        
        $c->save();
    }

}
