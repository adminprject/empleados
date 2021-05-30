<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Clases\Funciones;
use Illuminate\Support\Str;
use App\Models\Empleado;
use App\Models\EmpleadoRol;
use App\Models\Area;
use App\Models\Rol;
use Validator;
use Session;
use Illuminate\Support\Facades\DB;

class empleadosController extends Controller
{
    public function index(){
        $empleados = Empleado::paginate(5);
        return view('empleados.index',[
            'empleados' => $empleados
        ]);
    }

    public function create(){
        $areas = Area::all();
        $roles = Rol::all();

        return view('empleados.create',[
            'areas' => $areas,
            'roles' => $roles
        ]);
    }

    public function store(Request $request){
        
        $data = $request->all();

        echo "<pre>";
        print_r($data);

        $rules = [
            'nombre'      => 'required|max:255',
            'email'       => 'required|email|unique:empleados',
            'sexo'        => 'required',
            'area_id'     => 'required|exists:App\Models\Area,id',
            'descripcion' => 'required|max:500'
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect('empleados/create')->withErrors($validator)->withInput();
        }

        $eboletin = array_key_exists('boletin', $request->all());

        if (strlen($eboletin) > 0) {
            $boletin = $request->boletin;
        }else{
            $boletin = 0;
        }

        $new_empleado = [
            'nombre'               => $request->nombre,
            'email'               => $request->email,
            'sexo'               => $request->sexo,
            'area_id'               => $request->area_id,
            'descripcion'               => $request->descripcion,
            'boletin'               => $boletin,
        ];

        $empleado_new = Empleado::create($new_empleado);

        foreach ($request->rol_id as $rol) {
            EmpleadoRol::create([
                'empleado_id' => $empleado_new->id,
                'rol_id' => $rol,
            ]);
        }

        if ($empleado_new) {
            Session::flash('success','Registro creado satisfactoriamente');
            return redirect('empleados');
        }
    }

    public function edit($id){
        $areas = Area::all();
        $roles = Rol::all();
        $empleado = Empleado::find($id);

        return view('empleados.edit',[
            'empleado' => $empleado,
            'areas' => $areas,
            'roles' => $roles
        ]);
    }

    public function update(Request $request,$id){
        $data = $request->all();

        echo "<pre>";
        print_r($data);

        $rules = [
            'nombre'      => 'required|max:255',
            'email'       => 'required|email|unique:empleados',
            'sexo'        => 'required',
            'area_id'     => 'required|exists:App\Models\Area,id',
            'descripcion' => 'required|max:500'
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return redirect('empleados/'.$id.'/edit')->withErrors($validator)->withInput();
        }

        $eboletin = array_key_exists('boletin', $request->all());

        if (strlen($eboletin) > 0) {
            $boletin = $request->boletin;
        }else{
            $boletin = 0;
        }

        $empleado_act = Empleado::find($id);
        $empleado_act->nombre = $request->nombre;
        $empleado_act->email = $request->email;
        $empleado_act->sexo = $request->sexo;
        $empleado_act->area_id = $request->area_id;
        $empleado_act->descripcion = $request->descripcion;
        $empleado_act->boletin = $boletin;        
        $empleado_act->save();        

        Session::flash('success','Registro Actualizado satisfactoriamente');
        return redirect('empleados');
        
    }   

    public function delete($id){
        $empleado_del = Empleado::find($id);
        DB::table('empleado_rol')->where('empleado_id', '=', $id)->delete();

        if ($empleado_del->id) {
            $empleado_del->delete();

            $data = (['message' => 'Registro Eliminado satisfactoriamente']);
            return Response()->json($data);
        }else{
            $data = (['message' => 'Registro No se Elimino satisfactoriamente']);
            return Response()->json($data);
        }
    }
}
