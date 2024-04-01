<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class SubscriptionFeesModel extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'subscription_fees';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'importe',
        'date_pay',
        'observation',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(ClientsModel::class);
    }
}
