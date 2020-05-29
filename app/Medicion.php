<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicion extends Model
{
    protected $table = 'MEDICIONES';      // Atacar tabla 'MEDICIONES'
    
    public $timestamps = false;             // Desactivar timestamps al insertar a la DB
    
    protected $filable = [                  // Dejar que el usuario pueda introducir estos parametros
    
    ];

    // Relaciones

    public function raspberry()
    {
        return $this->belongsTo('App\Raspberry','ID_RASPBERRY','ID_RASPBERRY');
    }

    public function getEstadoCloro()
    {
        if ($this->CLORO < 0.5)
        {
            return 3;
        } elseif ($this->CLORO < 1.5)
        {
            return 2;
        } else 
        {
            return 1;
        }
    }

    public function getEstadoPh()
    {
        if ($this->PH > 10 || $this->PH < 4)
        {
            return 1;
        } elseif ($this->PH > 7.6 || $this->PH < 7.2) 
        {
            return 2;
        } else 
        {
            return 3;
        }
    }
}
