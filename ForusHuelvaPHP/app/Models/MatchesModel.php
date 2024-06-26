<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class MatchesModel extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'matches';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'team_a',
        'team_b',
        'result',
        'description',
        'rent_id',
    ];

    public function rentalFee()
    {
        return $this->hasMany(RentalFeesModel::class, 'rent_id');
    }
   
}
