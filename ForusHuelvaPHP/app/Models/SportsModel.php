<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class SportsModel extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'sports';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'sport',
    
    ];

    public function rent()
    {
        return $this->hasMany(RentalFeesModel::class);
    }

    public function court()
    {
        return $this->hasMany(CourtsModel::class);
    }
}
