<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\asociado;
use Illuminate\Http\Request;

class asociadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $asociados = asociado::where('CodigoAsociado', 'LIKE', "%$keyword%")
                ->orWhere('NombreAsociado', 'LIKE', "%$keyword%")
                ->orWhere('No_TC', 'LIKE', "%$keyword%")
                ->orWhere('FechaEmisionTC', 'LIKE', "%$keyword%")
                ->orWhere('monto', 'LIKE', "%$keyword%")
                ->orWhere('SaldoActual', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $asociados = asociado::latest()->paginate($perPage);
        }

        return view('asociados.index', compact('asociados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('asociados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        asociado::create($requestData);

        return redirect('asociados')->with('flash_message', 'asociado added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $asociado = asociado::findOrFail($id);

        return view('asociados.show', compact('asociado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $asociado = asociado::findOrFail($id);

        return view('asociados.edit', compact('asociado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $asociado = asociado::findOrFail($id);
        $asociado->update($requestData);

        return redirect('asociados')->with('flash_message', 'asociado updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        asociado::destroy($id);

        return redirect('asociados')->with('flash_message', 'asociado deleted!');
    }
}
