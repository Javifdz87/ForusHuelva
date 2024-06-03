<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class RentalFeesModel extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'rental_fees';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'importe',
        'date_pay',
        'date_day',
        'date_time',
        'client_id',
        'court_id',
        'sport_id',

    ];

    public function client()
    {
        return $this->belongsTo(ClientsModel::class);
    }

    public function court()
    {
        return $this->belongsTo(CourtsModel::class);
    }

    public function sport()
    {
        return $this->belongsTo(SportsModel::class);
    }
}
