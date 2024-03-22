<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class PolizasModel extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'polizas';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'n_poliza',
        'importe',
        'monto',
        'rest',
        'start_date',
        'status',
        'observation',
        'client_id',

    ];
    public function client()
    {
        return $this->belongsTo(ClientsModel::class);
    }
}
