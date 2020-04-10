<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidad;
use Redirect;

class EspecialidadesController extends Controller
{
    public function getEspecialidadPorTipoEmpleado(Request $request, $id)
    {
        if (!$request->ajax()) {
            return redirect()->back();
        }

        $especialidades = Especialidad::where('tipo_empleado_id', $id)->get();
        
        return response()->json($especialidades);
    }
}
