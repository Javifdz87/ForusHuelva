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
        'phone',
        'town',
        'postal_code',
        'province',
        'role',
    ];
    public function polizas()
    {
        return $this->hasMany(PolizasModel::class);
    }

}
