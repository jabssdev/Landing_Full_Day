<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contador;
use App\Models\Curso;
use PhpParser\Node\Stmt\TryCatch;

class ContadorController extends Controller
{
    public function index() {
        $contadores=Contador::orderby('created_at', 'desc')->get();
        $habilitado=Contador::orderby('created_at', 'desc')->where('estado','HABILITADO')->count();
        return view('admin.pages.curso.contador')->with(['habilitado'=> $habilitado,'contadores'=> $contadores]); //variable que lleva a la vista
    }
    
    public function create(){
        $cursos=Curso::all();
        return view('admin.pages.curso.createcontador')->with(['cursos'=> $cursos]);
    }

    public function store(Request $request){
        
        try{
            $contador = new contador();
            $contador->nombre=$request->nombre;
            $contador->fecha=$request->fecha;
            $contador->hora=$request->hora;
            $contador->estado='DESHABILITADO';
            $contador->save();
            return redirect()->route('contador.index');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function edit($id){
        $contador=Contador::find($id);
        $cursos=Curso::all();
        return view('admin.pages.curso.editcontador')->with(['cursos'=> $cursos,'contador'=> $contador]);
    }

    public function update(Request $request, $id){
        try{
            $contador=Contador::find($id);
            $contador->nombre=$request->nombre;
            $contador->fecha=$request->fecha;
            $contador->hora=$request->hora;
            $contador->estado='DESHABILITADO';
            $contador->save();
            return redirect()->route('contador.index');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function iniciarContador($id){
        $contador=Contador::findOrFail($id);
        $contador->estado='HABILITADO';
        $contador->save();
        return redirect()->route('contador.index');
    }

    public function detenerContador($id){
        $contador=Contador::findOrFail($id);
        $contador->estado='DESHABILITADO';
        $contador->save();
        return redirect()->route('contador.index');
    }

    public function delete($id){
        try {
            $contador = Contador::find($id);
            $contador->delete();
            return response()->json(true);
        } catch (\Exception $e) {
            return response()->json(false);
        }
    }
}
