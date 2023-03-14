<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use Barryvdh\DomPDF\Facade\Pdf;


class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarioEmail = auth()->user()->email;
        $notas = Nota::where('usuario', $usuarioEmail)->paginate(5);
        return view('notas.lista',compact('notas'));

        // $usuarioEmail = auth()->user()->email;
        // $notas = Nota::where('usuario', $usuarioEmail)->paginate(5);
        // $pdf = PDF::loadView('notas.lista', compact('notas'));
        // return $pdf->download('notas.pdf');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);
        $nota = new Nota();
        $nota->nombre = $request->nombre;
        $nota->descripcion = $request->descripcion;
        $nota->usuario = auth()->user()->email;
        $nota->save();

        // return back()->with('mensaje', 'Nota Agregada!');
        return redirect('/notas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editar = Nota::findOrFail($id);
        return view('notas.editar', compact('editar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nota = Nota::findOrFail($id);
        $nota->nombre = $request->nombre;
        $nota->descripcion = $request->descripcion;
        $nota->save();
        return back()->with('mensaje', 'Detalle editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notadelete = Nota::findOrFail($id);
        $notadelete->delete();
    
        return back()->with('mensaje', 'Nota Eliminada');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pdf (Request $request){
        $notas = Nota::all();
        $pdf = PDF::loadView('notas.lista', $notas);
        $pdf->save(storage_path().'_notas.pdf');
        return $pdf->download('notas.pdf');
    }
}
