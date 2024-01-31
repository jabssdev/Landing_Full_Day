<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Contador;
use PhpParser\Node\Stmt\TryCatch;

class CursoController extends Controller
{
    public function index() {
        $cursos=Curso::orderby('created_at', 'desc')->get();
        return view('admin.pages.curso.index')->with(['cursos'=> $cursos]); //variable que lleva a la vista
    }

    public function create(){
        return view('admin.pages.curso.create');
    }

    public function store(Request $request){
        
        try{
            $curso = new Curso();
            $curso->nombre=$request->nombre;
            $curso->fecha=$request->fecha;
            $curso->hora=$request->hora;
            $curso->periodo=$request->periodo;
            $curso->expositor=$request->expositor;
            $curso->descripcion=$request->descripcion;
            if ($request->file('pdf')) {
                $file=$request->file('pdf');
                $name='pdf_'.time().'.'.$file->getClientOriginalExtension();
                $path=public_path().'/pdf_img/'; //public_path = http:
                $file->move($path,$name);
                $curso->pdf=$name;
            } 
            if ($request->file('video')) {
                $file=$request->file('video');
                $name='video_'.time().'.'.$file->getClientOriginalExtension();
                $path=public_path().'/video_img/'; //public_path = http:
                $file->move($path,$name);
                $curso->video=$name;
            } 
            // dd($curso);
            $curso->save();
            $contador = new Contador();
            $contador->nombre=$curso->nombre;
            $contador->fecha=$curso->fecha;
            $contador->hora=$curso->hora;
            $contador->estado='DESHABILITADO';
            $contador->id_contador=$curso->id;
            // dd($contador);
            $contador->save();
            return redirect()->route('curso.index');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }



    public function edit($id){
        $curso=Curso::find($id);
        return view('admin.pages.curso.edit')->with(['curso'=> $curso]);
    }

    public function update(Request $request, $id){
        try{
            $curso=Curso::find($id);
            $curso->nombre=$request->nombre;
            $curso->fecha=$request->fecha;
            $curso->hora=$request->hora;
            $curso->periodo=$request->periodo;
            $curso->expositor=$request->expositor;
            $curso->descripcion=$request->descripcion;
            if ($request->file('pdf')) {
                $file=$request->file('pdf');
                $name='pdf_'.time().'.'.$file->getClientOriginalExtension();
                $path=public_path().'/pdf_img/'; //public_path = http:
                $file->move($path, $name);
                if ($curso->pdf){
                    if(file_exists( $path.$curso->pdf)){
                        unlink($path.$curso->pdf);
                    }
                }
                $curso->pdf = $name;
            }
            if ($request->file('video')) {
                $file=$request->file('video');
                $name='video_'.time().'.'.$file->getClientOriginalExtension();
                $path=public_path().'/video_img/'; //public_path = http:
                $file->move($path, $name);
                if ($curso->video){
                    if(file_exists( $path.$curso->video)){
                        unlink($path.$curso->video);
                    }
                }
                $curso->video = $name;
            }
            $curso->save();
            return redirect()->route('curso.index');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function delete($id){
        try {
            $curso = Curso::find($id);
            $curso->delete();
            return response()->json(true);
        } catch (\Exception $e) {
            return response()->json(false);
        }
    }

    public function obtener($id){
        $curso = Curso::find($id);
        return response()->json($curso);
    }    
}
