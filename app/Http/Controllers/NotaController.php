<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ComentarioFormRequest;
use Auth;
use Validator;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $notas=DB::table('notas')
        ->select('id','titulo',\DB::raw('SUBSTRING(contenido,1,200) as contenido'))
        ->where('titulo','LIKE','%'.$texto.'%')
        ->where('user_id',"=",Auth::user()->id)
        ->orderBy('id','desc')
        ->paginate(10);
        return view('nota.index',compact('notas','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validar datos
        $validator=Validator::make($request->all(),[
            'titulo'=>'required|min:5|max:70',
            'contenido'=>'required|min:5|max:600'
        ]);

        if($validator->fails())
        {
            return redirect()->route('nota.create')->withErrors($validator);
        }
        //INSERTAR
        $nota=new Nota;
        $nota->titulo=$request->input('titulo');
        $nota->contenido=$request->input('contenido');
        $nota->user_id=Auth::user()->id;
        $nota->save();
        return redirect()->route('nota.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        $comentarios=DB::table('comentarios')
        ->join('users','comentarios.user_id','=','users.id')
        ->where('comentarios.nota_id','=',$nota->id)
        ->select('users.email','users.name','comentarios.contenido')
        ->orderBy('comentarios.id','desc')
        ->get();
        return view('nota.show', compact('nota','comentarios'));
    }

    public function comentarioGuardar(ComentarioFormRequest $request)
    {
        $comentario=new Comentario();
        $comentario->contenido=$request->input('contenido');
        $comentario->nota_id=$request->input('nota_id');
        $comentario->user_id=Auth::user()->id;
        $comentario->save();
        return redirect()
        ->route('nota.show',['nota'=>$request->input('nota_id')])
        ->with('mensaje','Comentario Registrado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        return view('nota.edit',compact('nota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        $nota->titulo=$request->input('titulo');
        $nota->contenido=$request->input('contenido');
        $nota->save();
        return redirect()
        ->route('nota.edit',['nota'=>$nota])
        ->with('mensaje','Nota actualizada corectamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        $nota->delete();
        return redirect()->route('nota.index');
    }
}
