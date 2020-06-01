<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raspberry extends Model
{
    protected $table = 'RASPBERRY_PI';      // Atacar tabla 'RASPBERRY_PI' y no 'Raspberrys'

    public $timestamps = false;             // Desactivar timestamps al insertar a la DB

    protected $fillable = [                  // Dejar que el usuario pueda introducir estos parametros
        'id_raspberry','estado',
    ];

    // Relaciones

    public function mediciones()
    {
        return $this->hasMany('App\Medicion', 'ID_RASPBERRY', 'ID_RASPBERRY');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado', 'ESTADO','ESTADO');
    }
}
