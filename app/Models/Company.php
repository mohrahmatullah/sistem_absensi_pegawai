<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'logo','website'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $primaryKey = 'id';

    public function employees()
    {
        return $this->hasMany(Employees::class);
    }

}
