<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model {

    protected $table = 'packages';
    protected $guarded = array('id', 'created_at', 'updated_at');

    public static function random() {

        $IDs = Package::all()->pluck('id')->toArray();
        if (sizeof($IDs) > 0) {
            return $IDs[0];
        } else {
            return -1;
        }
    }

}
