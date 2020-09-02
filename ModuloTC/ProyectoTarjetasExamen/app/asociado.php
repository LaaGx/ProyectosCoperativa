<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asociado extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'asociados';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['CodigoAsociado', 'NombreAsociado', 'No_TC', 'FechaEmisionTC', 'monto', 'SaldoActual'];

    
}
