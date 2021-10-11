<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    protected $fillable = [
        'nik', 'date_time', 'in_out'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function employess()
    {
        return $this->belongsTo(Employees::class);
    }
}
