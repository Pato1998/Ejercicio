<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Especialidad;

class TipoEspecialidad extends Model
{   
    protected $table = 'tipo_especialidad';
    protected $fillable = ['tipo_empleado_id', 'especialidad_id', 'empleado_id'];

    public function getEspecialidad() {
        return Especialidad::where(['id' => $this->especialidad_id, 'tipo_empleado_id' => $this->tipo_empleado_id])->first();
    }
}
