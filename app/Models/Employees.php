<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'employees';
    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name', 'last_name', 'company','email','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function getFullNameAttribute()
    {
       return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function attedance()
    {
        return $this->hasMany(Attendance::class);
    }

}
