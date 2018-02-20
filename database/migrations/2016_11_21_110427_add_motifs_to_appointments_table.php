<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMotifsToAppointmentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('motif')->nullable();
            $table->integer('package_id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn('motif');
            $table->dropColumn('package_id');
        });
    }

}
