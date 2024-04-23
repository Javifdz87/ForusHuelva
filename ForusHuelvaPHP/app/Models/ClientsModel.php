<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class ClientsModel extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'clients';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'last_Name',
        'email',
        'dni',
        'phone',
        'town',
        'postal_code',
        'province',
        'address',
        'bank_account',
        'password',
    ];

    public function sub()
    {
        return $this->hasMany(SubscriptionFeesModel::class);
    }

}
