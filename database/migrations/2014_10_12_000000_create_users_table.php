<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('active')->default(false);
            $table->boolean('banned')->default(false);
            $table->string('register_ip')->default("");
            $table->string('country_code')->default(env('USER_COUNTRY_CODE', 'FR'));
            $table->string('locale')->default(App::getLocale());
            $table->string('activation_key')->default(str_random(32));
            $table->boolean('su')->default(false);
            $table->integer('role')->default(2); // 0: admin, 1: secretariat, 2: professionals      
            $table->integer('has_package')->nullable(); // agenda id
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users');
    }
}
