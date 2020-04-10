<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Empleado;
use App\TipoEmpleado;
use App\TipoEspecialidad;
use Redirect;
use DB;

class EmpleadosController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();

        return view('admin.empleados.index', ['empleados' => $empleados]);
    }

    public function create()
    {
        $empresas = Empresa::all();
        $tipoEmpleados = TipoEmpleado::all();

        return view('admin.empleados.create', ['empresas' => $empresas, 'tipoEmpleados' => $tipoEmpleados]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $empleado = new Empleado();
            $empleado->fill($request->all());
            if ($empleado->save()) {
                $tipoEspecialidad = new TipoEspecialidad();
                $tipoEspecialidad->empleado_id = $empleado->id;
                $tipoEspecialidad->fill($request->all());
                
                if ($tipoEspecialidad->save()) {
                    $empleado->tipo_especialidad_id = $tipoEspecialidad->id;
                    
                    if ($empleado->save()) {
                        DB::commit();
                        return Redirect::route('empleados')->with(['msg' => 'Empleado registrado con exito!']);
                    }
                }
            }
        } catch (\Exception $ex) {
            DB::rollback();
            return Redirect::route('empleados')->with(['msg' => 'Ocurrio un error']);
        }
    }

    public function buscar(Request $request)
    {
        $id = $request->input('empleado_id');
        $empleados = Empleado::where('id', $id)->get();

        return view('admin.empleados.index', ['empleados' => $empleados]);
    }

    public function getPromedioEdad(Request $request)
    {
        if (!$request->ajax()) {
            return redirect()->back();
        }

        $promedioEdad = Empleado::avg('edad');
        
        return response()->json(round($promedioEdad, 1));
    }
}
