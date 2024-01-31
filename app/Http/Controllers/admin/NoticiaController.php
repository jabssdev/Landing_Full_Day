<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Noticia;
use PhpParser\Node\Stmt\TryCatch;

class NoticiaController extends Controller
{
    public function index() {
        $noticias=Noticia::orderby('created_at', 'desc')->get();
        return view('admin.pages.noticia.index')->with(['noticias'=> $noticias]); //variable que lleva a la vista
    }

    public function create(){
        return view('admin.pages.noticia.create');
    }

    public function store(Request $request){
        
        try{
            $noticia = new Noticia();
            if ($request->file('imagen')) {
                $file=$request->file('imagen');
                $name='noticia_'.time().'.'.$file->getClientOriginalExtension();
                $path=public_path().'/noticia_img/'; //public_path = http:
                $file->move($path,$name);
                $noticia->imagen=$name;
            } 
            $noticia->fecha=$request->fecha;
            $noticia->titulo=$request->titulo;
            $noticia->descripcion=$request->descripcion;
            $noticia->autor=$request->autor;
            $noticia->save();
            return redirect()->route('noticia.index');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function edit($id){
        $noticia=Noticia::find($id);
        return view('admin.pages.noticia.edit')->with(['noticia'=> $noticia]);
    }

    public function update(Request $request, $id){
        try{
            $noticia=Noticia::find($id);
            if ($request->file('imagen')) {
                $file = $request->file('imagen');
                $name='noticia_'.time().'.'.$file->getClientOriginalExtension();
                $path = public_path() . '/noticia_img/';

                $file->move($path, $name);
                if ($noticia->imagen){
                    if(file_exists( $path.$noticia->imagen)){
                        unlink($path.$noticia->imagen);
                    }
                }
                $noticia->imagen = $name;
            }

            $noticia->fecha=$request->fecha;
            $noticia->titulo=$request->titulo;
            $noticia->descripcion=$request->descripcion;
            $noticia->autor=$request->autor;
            $noticia->save();
            return redirect()->route('noticia.index');
        }
        catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function delete($id){
        try {
            $noticia = Noticia::find($id);
            $noticia->delete();
            return response()->json(true);
        } catch (\Exception $e) {
            return response()->json(false);
        }
    }
}
