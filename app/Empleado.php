<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $fillable = ['nombre', 'apellido', 'edad', 'empresa_id', 'tipo_empleado_id', 'tipo_especialidad_id'];

    public function tipoEmpleado(){
        return $this->belongsTo('App\TipoEmpleado');
    }

    public function TipoEspecialidad(){
        return $this->belongsTo('App\TipoEspecialidad', 'tipo_especialidad_id', 'id');
    }
}
