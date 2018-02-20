<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model {

    protected $table = 'holidays';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['date', 'note'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public static function add($date, $note) {
        Holiday::create(['date' => $date, 'note' => $note]);
    }

    public static function addHolidays($holidays) {
        foreach ($holidays as $holiday) {
            Holiday::create(['date' => $holiday->date, 'note' => $holiday->note]);
        }
    }

}
