<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //Se esta pasando toda la informacion que se recupera de empleados a la vista index.blade
        $datos['empleados']=Empleados::paginate(1);

        return view('empleados.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //Sirve para almacenar un empleado.
    public function store(Request $request)
    {
        //Validamos la informacion para que el usuario no tenga permitido dejar vacios los campos.
        $campos=[
            'Nombre' => 'required|string|max:100',
            'ApellidoPaterno' => 'required|string|max:100',
            'ApellidoMaterno' => 'required|string|max:100',
            'Correo' => 'required|email',
            'Foto' => 'required|max:1000|mimes:jpeg,png,jpg'

        ];

        $Mensaje=["required"=>'El campo :attribute es requerido.'];

        $this->validate($request,$campos,$Mensaje);

        //$datosEmpleado=request()->all();

        //Recepcionar toda la informacion exceptuando el token.

        $datosEmpleado=request()->except('_token');

        if($request->hasFile('Foto')){

            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Empleados::insert($datosEmpleado);

        //return response()->json($datosEmpleado);

        //Cuando se agregue nuevo registro automaticamente redireccione al apartado empleados.
        return redirect('empleados')->with('Mensaje','Empleado agregado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */

     //Recepcionamos la informacion que nos estan enviando atravez de la url
    public function edit($id)
    {
        //Este medoto devuelve toda la informacion que corresponde a ese.
        $empleado= Empleados::findOrFail($id);

        //Se envia la informacion atravez del retorno de la vista
        return view('empleados.edit', compact ('empleado'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validando el campo de foto en modificar empleado.
        $campos=[
            'Nombre' => 'required|string|max:100',
            'ApellidoPaterno' => 'required|string|max:100',
            'ApellidoMaterno' => 'required|string|max:100',
            'Correo' => 'required|email',

        ];

        
        if($request->hasFile('Foto')){
        
            $campos+=['Foto' => 'required|max:10000|mimes:jpeg,png,jpg'];
            
        }

        $Mensaje=["required"=>'El campo :attribute es requerido.'];
        
        $this->validate($request,$campos,$Mensaje);

        //Recepcionar toda la informacion exceptuando el token
        $datosEmpleado=request()->except('_token', '_method');

        if($request->hasFile('Foto')){

            $empleado= Empleados::findOrFail($id);

            //Borrar la fotografia antigua.
            Storage::delete('public/'.$empleado->Foto);

            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }


        //Actualizar de acuerdo al id preguntando si el id es igual al id que se evio.
        Empleados::where('id','=',$id)->update($datosEmpleado);

       //Este medoto devuelve toda la informacion que corresponde a ese id.
        //$empleado= Empleados::findOrFail($id);

        //Se envia la informacion atravez del retorno de la vista
        //return view('empleados.edit', compact ('empleado')); 
        
        return redirect('empleados')->with('Mensaje','Empleado modificado con exito!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */


    //Utilizamos un metodo y enviamos un parametro ID
    public function destroy($id)
    {

        $empleado= Empleados::findOrFail($id);

        //Borrar la fotografia antigua.
        if(Storage::delete('public/'.$empleado->Foto)){
        
        //Destruimos ese parametro ID entre todos los empleados.    
        Empleados::destroy($id);

        } 
        
    //Y nuevamente redireccionamos a lo que es la vista de empleados.
         return redirect('empleados')->with('Mensaje','Empleado eliminado con exito!');    }
}
