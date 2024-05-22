<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class CourtsModel extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'courts';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'sport_id',
    ];

    public function rent()
    {
        return $this->hasMany(RentalFeesModel::class);
    }
    public function sport()
    {
        return $this->belongsTo(SportsModel::class);
    }
}
